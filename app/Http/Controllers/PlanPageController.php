<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\PlanOrder;
use App\Models\PlanSite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use DB;

class PlanPageController extends Controller
{
    public function index(Request $request){
        $plans = Plan::all();
        return view('page.plans.PlanPage',compact('plans'));
    }

    public function addPlan(Request $request, String $id){
            $item = Plan::findOrfail($id);
            $date = Carbon::now()->addDays(intval($item->number_days));
            return view('page.plans.BuyPlan',compact(['item','date']));
    }
    public function storePlans(Request $request){
        try {
            DB::beginTransaction();
            $order = new PlanOrder();
            $order->plan_id = $request->plan_id;
            $order->price = $request->price;
            $order->name = $request->nameuser;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->payment_method = $request->pay;
            $order->save();
            DB::commit();
            if ($order->payment_method == 'paypal') {
                return redirect()->route('make.payment',['order_id' => $order->id, 'price' => $order->price]);
            }
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Bug occurred: ' . $e->getMessage());
            return response([
                'success' => false,
                'message' => __('sys.store_item_error'),
            ]);
        }
    }
}
