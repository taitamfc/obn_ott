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
            DB::beginTransaction();
            try {
                //Update Order 
                $order = Order::findOrfail($order_id);
                $order->status = 'COMPLETED';
                $order->save();

                // Contact student and Subscription/Course
                if($order->type == 'course'){
                    $item = Course::findOrfail($order->item_id);
                    $lessons = Lesson::where('course_id',$item->id)->get();
                    // Student And Course
                    foreach ($lessons as $lesson) {
                        $order_grade = new OrderGrade();
                        $order_grade->order_id = $order->id;
                        $order_grade->grade_id = $lesson->grade_id;
                        $order_grade->save();

                        $student_lesson = new LessonStudent();
                        $student_lesson->lesson_id = $lesson->id;
                        $student_lesson->course_id = $lesson->course_id;
                        $student_lesson->student_id = Auth::guard('students')->id();
                        $student_lesson->site_id = $this->site_id;
                        $student_lesson->is_complete = 0;
                        $student_lesson->grade_id = $lesson->grade_id;
                        $student_lesson->save();
                    }
                    $student_course = new StudentCourse();
                    $student_course->student_id = Auth::guard('students')->id();
                    $student_course->course_id = $item->id;
                    $student_course->site_id = $this->site_id;
                    $student_course->save();
                }else {
                    $items = SubscriptionCourse::where('subscription_id', $order->item_id)->get();
                    $subscription = Subscription::findOrfail($order->item_id);
                    foreach ($items as $item) {
                        $lessons = Lesson::where('course_id',$item->course_id)->get();
                        // Student And Course
                        foreach ($lessons as $lesson) {
                            $order_grade = new OrderGrade();
                            $order_grade->order_id = $order->id;
                            $order_grade->grade_id = $lesson->grade_id;
                            $order_grade->save();

                            $student_lesson = new LessonStudent();
                            $student_lesson->lesson_id = $lesson->id;
                            $student_lesson->grade_id = $lesson->grade_id;
                            $student_lesson->student_id = Auth::guard('students')->id();
                            $student_lesson->course_id = $item->course_id;
                            $student_lesson->site_id = $this->site_id;
                            $student_lesson->is_complete = 0;
                            $student_lesson->save();
                        }
                    }
                    $student_subcription = new StudentSubscription();
                    $student_subcription->student_id =  Auth::guard('students')->id();
                    $student_subcription->subscription_id = $subscription->id;
                    $student_subcription->expired_day = now()->addDays($subscription->duration->number_days);
                    $student_subcription->site_id = $this->site_id;
                    $student_subcription->save();
                }
                

                // Transaction
                $bill = new Transactions();
                $bill->payment_id = $response['id'];
                $bill->status = 'COMPLETED';
                $bill->order_id = $order_id;
                $bill->site_id = $this->site_id;
                $bill->is_plan = 0;
                $bill->save();
    
                DB::commit();

                return redirect()
                ->route('website.orders.success',['site_name'=>$this->site_name,'order_id'=>$request->order_id])
                ->with('success', 'Transaction complete.');

            } catch (\Exception $e) {
                DB::rollback();
                Log::error('Payment error: ' . $e->getMessage());

                return redirect()
                ->route('website.orders.fail',['site_name'=>$this->site_name,'order_id'=>$request->order_id])
                ->with('success', 'Transaction incomplete.');
            }
           
        } else {
            return redirect()
                ->route('website.orders.fail',['site_name'=>$this->site_name,'order_id'=>$request->order_id])
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
}