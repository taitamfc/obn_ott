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
