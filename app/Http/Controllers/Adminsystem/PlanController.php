<?php

namespace App\Http\Controllers\Adminsystem;


use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\PlanOrder;
use App\Models\PlanSite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\PlanResource;
use Carbon\Carbon;
use DB;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\UpdatePlanRequest;
use App\Http\Requests\StorePlanRequest;

class PlanController extends AdminController
{
    function index(Request $request){
        if ($request->ajax()) {
            $items = Plan::paginate(3);
            return view('adminsystems.plans.ajax-index',compact('items'));
        }
        return view('adminsystems.plans.index');
    }
    function store(StorePlanRequest $request){
        $item = new Plan();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->duration = $request->duration;
        $item->number_days = $request->number_days;
        try {
            $item->save();
            return response()->json([
                'success'=>true,
                'message'=> __('sys.store_item_success'),
                'data'=> $item
            ],200);
        } catch (QueryException  $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return response()->json([
                'success'=>false,
                'message'=> __('sys.store_item_error'),
            ],200);
        }
    }

    public function show(string $id)
    {
        $item = Plan::find($id);
        return new PlanResource($item);
    }

    public function update(UpdatePlanRequest $request, string $id)
    {
        $item = Plan::find($id);
        $item->name = $request->name;
        $item->price = $request->price;
        $item->duration = $request->duration;
        $item->number_days = $request->number_days;
        try {
            $item->save();
            return response()->json([
                'success'=>true,
                'message'=> __('sys.update_item_success'),
                'data'=> $item
            ],200);
        } catch (QueryException  $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return response()->json([
                'success'=>false,
                'message'=> __('sys.update_item_error'),
            ],200);
        }
    }

    public function destroy(string $id)
    {
        try {
            $item =  Plan::find($id);
            $item->delete();

            return response()->json([
                'success'=>true,
                'message'=> __('sys.destroy_item_success'),
            ],200);
        } catch (QueryException $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return response()->json([
                'success'=>false,
                'message'=> __('sys.destroy_item_error'),
            ],200);
        }
    }
    
}