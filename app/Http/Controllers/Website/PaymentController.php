<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Course;
use App\Models\Order;
use App\Models\Lesson;
use App\Models\Subscription;
use App\Models\SubscriptionCourse;
use App\Models\StudentCourse;
use App\Models\StudentSubscription;
use App\Models\LessonStudent;
use App\Models\Transactions;
use App\Models\OrderGrade;
use Illuminate\Support\Facades\Log;
use DB;
use Illuminate\Support\Facades\Auth;

class PaymentController extends MainController
{

    // function index(){
    //     return view('website.accountmanagements.billings.paypal');       
    // }

    public function handlePayment(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('website.success.payment',['site_name'=> $this->site_name, 'order_id' => $request->order_id]),
                "cancel_url" => route('website.cancel.payment',['site_name'=> $this->site_name]),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->price
                    ]
                ]
            ]
        ]);
        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            return redirect()
                ->route('website.cancel.payment',['site_name'=> $this->site_name])
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('website.courses.index',['site_name'=>$this->site_name])
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function paymentCancel()
    {
        return redirect()
            ->route('website.courses.index',['site_name'=>$this->site_name])
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }

    public function paymentSuccess(Request $request)
    {
        $order_id = $request->order_id;
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $handle = Order::handlePaymentSuccess($order_id,$this->site_id,$response);
            if($handle){
                return redirect()
                ->route('website.orders.success',['site_name'=>$this->site_name,'order_id'=>$request->order_id])
                ->with('success', 'Transaction complete.');
            }else{
                return redirect()
                ->route('website.orders.fail',['site_name'=>$this->site_name,'order_id'=>$request->order_id])
                ->with('success', 'Transaction incomplete.');
            }
        } else {
            Log::error('Payment error: ' . json_encode($response));
            return redirect()
                ->route('website.orders.fail',['site_name'=>$this->site_name,'order_id'=>$request->order_id])
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
}