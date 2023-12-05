<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Order;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use DB; 

class OrderController extends MainController
{
    public function create($site_id,$course_id){
        $course = Course::find($course_id);
        $student = Student::find(Auth::guard('students')->id());
        $params = [
            'item' => $course,
            'student' => $student
        ];
        return view('website.orders.create',$params);
    }

    function store(Request $request){
        try {
            $order = new Order();
            $order->item_id = $request->course_id;
            $order->site_id = $this->site_id;
            $order->price = $request->price;
            $order->payment_method = $request->pay;
            $order->type = 'course';
            $order->save();

            if ($order->payment_method == 'paypal') {
                return redirect()->route('website.make.payment',['site_name' => $this->site_name,'item_id' => $order->item_id,'order_id' => $order->id]);
            }
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return redirect()
            ->route('website.courses.index',['site_name'=>$this->site_name])
            ->with('error', 'Transaction complete.');

        }
    }
}