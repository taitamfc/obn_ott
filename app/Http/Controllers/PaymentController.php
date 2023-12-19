<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Course;
use App\Models\Order;
use App\Models\User;
use App\Models\Lesson;
use App\Models\PlanOrder;
use App\Models\PlanSite;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\SubscriptionCourse;
use App\Models\StudentCourse;
use App\Models\StudentSubscription;
use App\Models\LessonStudent;
use App\Models\Transactions;
use Illuminate\Support\Facades\Log;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;     
use App\Models\Site;




class PaymentController extends Controller
{
    public function handlePayment(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('success.payment',['order_id' => $request->order_id]),
                "cancel_url" => route('cancel.payment'),
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
                ->route('cancel.payment')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('admin.courses.index')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function paymentCancel()
    {
        return response([
            'success' => false,
            'message' => __('sys.store_item_error'),
            'redirect' => route('admin.users.plans')
        ],200);
    }

    public function paymentSuccess(Request $request)
    {
        $order_id = $request->order_id;
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        $order = PlanOrder::findOrfail($order_id);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            try {
                DB::beginTransaction();
                $currentDateTime = Carbon::now();
                // create account
                
                    //Prepare slug
                    $slug = $maybe_slug = $maybe_slug = Str::slug($order->name);
                    $next = 2;
                    while (Site::where('slug', $slug)->first()) {
                        $slug = "{$maybe_slug}-{$next}";
                        $next++;
                    }
                    // Register user
                    $user = new User();
                    $user->name = $order->name;
                    $user->email = $order->email;
                    $user->password = bcrypt(123456);
                    // Register sites
                    if($user->save()){
                        $site = new Site();
                        $site->name = $order->name;
                        $site->slug = $slug;
                        $site->user_id = $user->id;
                        $site->status = Site::ACTIVE;
                        $site->save();
        
                        // Set default site id for user
                        if($site->save()){
                            $user->site_id = $site->id;
                            $user->save();
                        }
                    }
                    DB::commit();
                   
                
                // Update status order
                
                $order->status = 'COMPLETED';
                $order->save();
                // Plan
                $plan = Plan::findOrfail($order->plan_id);

                // Relationship Plan and Site
                $plan_site = new PlanSite();
                $plan_site->plan_id = $plan->id;
                $plan_site->site_id = $this->site_id;
                $current_plan_date = PlanSite::where('site_id',$this->site_id)->latest('created_at')->value('expiration_date');
                // if user has current plan
                if (!empty($current_plan_date)) {
                    $current_plan_date = Carbon::parse($current_plan_date);
                    $plan_site->is_current = 0;
                    $plan_site->created_at = $current_plan_date;
                    $plan_site->expiration_date = $current_plan_date->addDays($plan->number_days);
                // if user don't have plan
                }else {
                    $plan_site->is_current = 1;
                    $plan_site->created_at = $currentDateTime;
                    $plan_site->expiration_date = $currentDateTime->addDays($plan->number_days);
                }
                $plan_site->save();

                // Transaction
                $bill = new Transactions();
                $bill->payment_id = $response['id'];
                $bill->status = 'COMPLETED';
                $bill->order_id = $order_id;
                $bill->is_plan = 1;
                $bill->save();

                DB::commit();
                return view('page.homepage.HomePage',compact('order'));
            } catch (\Exception $e) {
                DB::rollback();
                Log::error('Bug occurred: ' . $e->getMessage());

                return view('page.homepage.HomePage',compact('order'));
            }
           
        } else {
            return view('page.homepage.HomePage',compact('order'));
        }
    }
}
