<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\MainController;
use App\Http\Requests\StoreOrderRequest;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Order;
use App\Models\Notification;
use App\Models\Subscription;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use DB; 
use Illuminate\Support\Facades\Log;

class OrderController extends MainController
{

   
public function order_history()
{
    $student = Auth::guard('students')->user();

    $orders = Order::where('student_id', $student->id)
        ->where('site_id', $this->site_id)
        ->orderBy('created_at', 'desc')
        ->get();

    $params = [
        'orders' => $orders,
    ];

    return view('website.orders.index', $params);
}
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

    function store(StoreOrderRequest $request){
        DB::beginTransaction();
        try {
           
            $student_id = Auth::guard('students')->id();
            $order = new Order();
            $order->item_id = $request->item_id;
            $order->site_id = $this->site_id;
            $order->student_id = $student_id;
            $order->price = $request->price;
            $order->payment_method = $request->pay;
            $order->type = $request->type;
            if($order->save()){
                $notice = new Notification();
                $notice->student_id = $student_id;
                $notice->site_id = $this->site_id;
                $notice->type = 'new_order';
                $notice->action = 'system_to_site';
                $notice->is_read = 0;
                $notice->item_id = $order->id;
                $notice->save();
            }
            DB::commit();
            if ($order->price > 0 && $order->payment_method == 'paypal') {
                return redirect()->route('website.make.payment',['site_name' => $this->site_name,'order_id' => $order->id, 'price' => $order->price]);
            }else{
                $handle = Order::handlePaymentSuccess($order->id,$this->site_id);
                if($handle){
                    return redirect()
                    ->route('website.orders.success',['site_name'=>$this->site_name,'order_id'=> $order->id])
                    ->with('success', 'Transaction complete.');
                }else{
                    return redirect()
                    ->route('website.orders.fail',['site_name'=>$this->site_name,'order_id'=> $order->id])
                    ->with('success', 'Transaction incomplete.');
                }
            }
            
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return redirect()
            ->route('website.courses.index',['site_name'=>$this->site_name])
            ->with('error', 'Transaction incomplete.');

        }
    }
}