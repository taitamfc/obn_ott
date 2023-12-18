<?php

namespace App\Http\Controllers\Adminsystem;


use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\PlanOrder;
use App\Models\PlanSite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use DB;
use App\Http\Controllers\Admin\AdminController;


class PlanController extends AdminController
{
    function plan(Request $request){
        if ($request->ajax()) {
            $items = Plan::paginate(3);
            $next_plan = PlanSite::where('site_id',$this->site_id)->where('is_current',0)->get();
            $next_plan_data = $next_plan->pluck('plan_id', 'created_at')->toArray();
            $current_plan = PlanSite::where('site_id',$this->site_id)->where('is_current',1)->first();
            return view('admin.accountmanagements.plans.ajax.ajax-index',compact('items','current_plan','next_plan_data'));
        }
        return view('admin.accountmanagements.plans.index');
    }
    function addPlan(Request $request, String $id){
        if ($request->ajax()) {
            $item = Plan::findOrfail($id);
            $current_plan = PlanSite::where('site_id',$this->site_id)->where('is_current',1)->value('expiration_date');
            $date = Carbon::now()->addDays(intval($item->duration->number_days));
            $param = [
                'item' => $item,
                'current_plan' => $current_plan,
                'date' => $date,
            ];
            return view('admin.accountmanagements.plans.ajax.ajax-buyPlan',$param);
        }
        return view('admin.accountmanagements.plans.buyPlan');
    }
    function storePlans(Request $request){
        try {
            DB::beginTransaction();
            $data = $_REQUEST['data'];
            $plan_id = intval($data[0]);
            $pay = $data[1];
            $price = intval($data[2]);
            $order = new PlanOrder();
            $order->plan_id = $plan_id;
            $order->site_id = $this->site_id;
            $order->user_id = Auth::id();
            $order->price = $price;
            $order->payment_method = $pay;
            // return response([
            //     'data' => $order,
            // ]);
            $order->save();
            DB::commit();
            if ($order->payment_method == 'paypal') {
                return response([
                    'success' => true,
                    'redirect' => route('admin.make.payment',['order_id' => $order->id, 'price' => $order->price])
                ]);
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