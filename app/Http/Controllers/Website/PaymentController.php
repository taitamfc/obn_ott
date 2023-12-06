<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Course;
use App\Models\Order;
use App\Models\Lesson;
use App\Models\LessonStudent;
use App\Models\Transactions;
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
        $course = Course::findOrfail($request->item_id);
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('website.success.payment',['site_name'=> $this->site_name, 'course' => $request->item_id, 'order_id' => $request->order_id]),
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
        $order_id = $request->order_id;
        $course = Course::findOrfail($request->course);
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            try {
                DB::beginTransaction();

                //Update Order 
                $order = Order::findOrfail($order_id);
                $order->status = 'COMPLETED';
                $order->save();
                
                // Get All Lesson
                $lessons = Lesson::where('course_id',$course->id)->get();
                // Student And Course
                foreach ($lessons as $lesson) {
                    $student_lesson = new LessonStudent();
                    $student_lesson->lesson_id = $lesson->id;
                    $student_lesson->grade_id = $lesson->grade_id;
                    $student_lesson->student_id = Auth::guard('students')->id();
                    $student_lesson->course_id = $request->course;
                    $student_lesson->site_id = $this->site_id;
                    $student_lesson->is_complete = 0;
                    $student_lesson->save();
                }

                // Transaction
                $bill = new Transactions();
                $bill->payment_id = $response['id'];
                $bill->status = 'COMPLETED';
                $bill->order_id = $order_id;
                $bill->save();
    
                DB::commit();

                return redirect()
                ->route('website.orders.create',['site_name'=>$this->site_name,'course_id'=>$request->course])
                ->with('success', 'Transaction complete.');

            } catch (\Exception $e) {
                DB::rollback();
                Log::error('Bug occurred: ' . $e->getMessage());

                return redirect()
                ->route('website.orders.create',['site_name'=>$this->site_name,'course_id'=>$request->course])
                ->with('success', 'Transaction incomplete.');
            }
           
        } else {
            return redirect()
                ->route('website.orders.create',['site_name'=>$this->site_name,'course_id'=>$request->course])
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
}