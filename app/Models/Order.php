<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use DB;
use Illuminate\Support\Facades\Auth;
class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    function site()
    {
        return $this->belongsTo(Site::class);
    }
    function course()
    {
        return $this->belongsTo(Course::class,'item_id','id');
    }
    function subscription()
    {
        return $this->belongsTo(Subscription::class,'item_id','id');
    }
    function Transaction(){
        $this->hasMany(Transactions::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function getItemNameAttribute()
    {
        $name = null;
        switch ($this->type) {
            case 'course':
                $name = $this->course ? $this->course->name : '';
                break;
            case 'subscription':
                $name = $this->subscription ? $this->subscription->name : '';
                break;
        }
        return $name;
    }
    function order_grades(){
        return $this->hasMany(OrderGrade::class);
    }

    static function handlePaymentSuccess($order_id, $site_id, $response = []){
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
                    $student_lesson->site_id = $site_id;
                    $student_lesson->is_complete = 0;
                    $student_lesson->grade_id = $lesson->grade_id;
                    $student_lesson->save();
                }
                $student_course = new StudentCourse();
                $student_course->student_id = Auth::guard('students')->id();
                $student_course->course_id = $item->id;
                $student_course->site_id = $site_id;
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
                        $student_lesson->site_id = $site_id;
                        $student_lesson->is_complete = 0;
                        $student_lesson->save();
                    }
                }
                $student_subcription = new StudentSubscription();
                $student_subcription->student_id =  Auth::guard('students')->id();
                $student_subcription->subscription_id = $subscription->id;
                $student_subcription->expired_day = now()->addDays($subscription->duration->number_days);
                $student_subcription->site_id = $site_id;
                $student_subcription->save();
            }
            
            if(!empty($response['id'])){
                // Transaction
                $bill = new Transactions();
                $bill->payment_id = $response['id'];
                $bill->status = 'COMPLETED';
                $bill->order_id = $order_id;
                $bill->site_id = $site_id;
                $bill->is_plan = 0;
                $bill->save();
            }
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Order error: ' . $e->getMessage());
            return false;
        }
    }
}