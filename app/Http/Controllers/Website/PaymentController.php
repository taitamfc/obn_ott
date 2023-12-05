<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Course;
use App\Models\StudentCourse;
use App\Models\Transactions;
use Illuminate\Support\Facades\Log;
use DB;
class PaymentController extends MainController
{

    // function index(){
    //     return view('website.accountmanagements.billings.paypal');       
    // }

    public function handlePayment(Request $request)
    {
        $course = Course::findOrfail($request->course);
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('website.success.payment',['site_name'=> $this->site_name, 'course' => $request->course]),
                "cancel_url" => route('website.cancel.payment',['site_name'=> $this->site_name]),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $course->price
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
        $course = Course::findOrfail($request->course);
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            try {
                DB::beginTransaction();
            
                // Student And Course
                $student_course = new StudentCourse();
                $student_course->student_id = $this->user_id;
                $student_course->course_id = $request->course;
                $student_course->site_id = $this->site_id;
                $student_course->is_complete = 0;
                $student_course->save();

                // Transaction
                $bill = new Transactions();
                $bill->student_id = $this->user_id;
                $bill->course_id =isset($request->course)?$request->course:0;
                $bill->subscription_id = isset($request->subscription)?$request->subscription:0;
                $bill->site_id = $this->site_id;
                $bill->price = $course->price;
                $bill->save();
    
                DB::commit();

                return redirect()
                ->route('website.courses.index',['site_name'=>$this->site_name])
                ->with('success', 'Transaction complete.');

            } catch (\Exception $e) {
                DB::rollback();
                Log::error('Bug occurred: ' . $e->getMessage());

                return redirect()
                ->route('website.courses.index',['site_name'=>$this->site_name])
                ->with('success', 'Transaction incomplete.');
            }
           
        } else {
            return redirect()
                ->route('website.courses.index',['site_name'=>$this->site_name])
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
}