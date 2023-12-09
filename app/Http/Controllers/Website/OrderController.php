<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Order;
use App\Models\Subscription;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use DB; 
use Illuminate\Support\Facades\Log;

class OrderController extends MainController
{
    public function success($site_id,$order_id){
        $item = Order::find($order_id);
        if($item->type == 'course'){
            $item->name = Course::find($item->item_id)->name;
        }else{
            $item->name = Subscription::find($item->item_id)->name;
        }
        $params = [
            'item' => $item
        ];
        return view('website.orders.success',$params);
    }
    public function fail($site_id,$order_id){
        $item = Order::find($order_id);
        $params = [
            'item' => $item
        ];
        return view('website.orders.fail',$params);
    }
    public function create($site_id,$item_id,$type){
        if($type == 'course'){
            $item = Course::find($item_id);
        }else{
            $item = Subscription::find($item_id);
        }
        $student = Student::find(Auth::guard('students')->id());
        $params = [
            'type' => $type,
            'item' => $item,
            'student' => $student
        ];
        return view('website.orders.create',$params);
    }

    function store(Request $request){
        try {
            $order = new Order();
            $order->item_id = $request->item_id;
            $order->site_id = $this->site_id;
            $order->price = $request->price;
            $order->payment_method = $request->pay;
            $order->type = $request->type;
            $order->save();

            if ($order->payment_method == 'paypal') {
                return redirect()->route('website.make.payment',['site_name' => $this->site_name,'order_id' => $order->id, 'price' => $order->price]);
            }
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return redirect()
            ->route('website.courses.index',['site_name'=>$this->site_name])
            ->with('error', 'Transaction complete.');

        }
    }
}