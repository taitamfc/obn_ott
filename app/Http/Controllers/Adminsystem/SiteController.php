<?php

namespace App\Http\Controllers\Adminsystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Site;
use App\Models\Plan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use App\Http\Resources\SiteResource;
use App\Http\Requests\UpdateSiteRequest;
use App\Http\Requests\StoreSiteRequest;
use App\Models\PlanSite;
use Carbon\Carbon;
use DB;


class SiteController extends Controller
{

    function index(Request $request){
        if( $request->ajax() ){
            $items = Site::paginate(5);
            return view('adminsystems.sites.ajax-index',compact('items'));
        } 
        return view('adminsystems.sites.index');
    }
    public function show(string $id)
    {
        $item = Site::find($id);
        $SiteResource = new SiteResource($item);
        $current_Plan = PlanSite::where('site_id', $id)->value('plan_id');
        $plans = Plan::all();
        $planName = [];
        foreach ($plans as $plan) {
            $planName[] = [
                'id' => $plan->id,
                'name' => $plan->name
                ];
        }

        return view('adminsystems.sites.show',compact(['SiteResource','planName','current_Plan'])); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSiteRequest $request, string $id)
    {
        $item = Site::where('user_id', auth()->user()->id)->find($id);
        
        $request->slug = $request->slug ? $request->slug : $request->name;
        $slug = $maybe_slug = Str::slug($request->slug);
        $next = 2;
        while (Site::where('slug', $slug)->where('id','!=',$this->site_id)->first()) {
            $slug = "{$maybe_slug}-{$next}";
            $next++;
        }

        $item->name = $request->name;
        $item->slug = $slug;
        $item->status = $request->status;
        try {
            if ($request->hasFile('image')) {
                // Delete old file
                $this->deleteFile([$item->img]);

                // Upload new file
                $item->img = $this->uploadFile($request->file('image'), 'uploads/'.$this->site_id.'/subjects');
            }
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

    function store(StoreSiteRequest $request){
        $item = new Site();
        $request->slug = $request->slug ? $request->slug : $request->name;
        $slug = $maybe_slug = Str::slug($request->slug);
        $next = 2;
        while (Site::where('slug', $slug)->first()) {
            $slug = "{$maybe_slug}-{$next}";
            $next++;
        }

        $item->name = $request->name;
        $item->slug = $slug;
        $item->status = $request->status;
        $item->user_id = auth()->user()->id;
        try {
            if ($request->hasFile('image')) {
                // Delete old file
                $this->deleteFile([$item->img]);

                // Upload new file
                $item->img = $this->uploadFile($request->file('image'), 'uploads/'.$this->site_id.'/subjects');
            }
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
    public function changeSite($site_id){
        session()->put('site_id',$site_id);
        return redirect()->back();
    }

    public function updateSitePlan(Request $request){

        DB::beginTransaction();
        try {
            $currentDateTime = Carbon::now();

            $site_id = $request->site_id;
            $plan_id = $request->plan_id;
            $status = $request->status;
            $plan = Plan::findOrfail($plan_id);
            $currentPlanId = PlanSite::where('site_id',$site_id)->where('is_current',1)->value('plan_id');
            $currentStatusSite = Site::where('id',$site_id)->value('status');
            if($currentStatusSite != $status){
                $item = Site::find($site_id);
                $item->status = $status;
                $item->save();
                DB::commit();
            }
            if ($plan_id != $currentPlanId) {
                 // Relationship Plan and Site
                $plan_site = new PlanSite();
                $plan_site->plan_id = $plan->id;
                $plan_site->site_id = $site_id;
                $current_plan_date = PlanSite::where('site_id',$site_id)->latest('created_at')->value('expiration_date');
                // if user has current plan
                if (!empty($current_plan_date)) {
                    $current_plan_date = Carbon::parse($current_plan_date);
                    $plan_site->is_current = 0;
                    $plan_site->created_at = $current_plan_date;
                    $plan_site->expiration_date = $current_plan_date->addDays($plan->number_days);
                // if user don't have plan
                }else {
                    $plan_site->is_current = 1;
                    $plan_site->created_at = $currentDateTime;
                    $plan_site->expiration_date = $currentDateTime->addDays($plan->number_days);
                }
                $plan_site->save();
                DB::commit();
                return redirect()->route('adminsystem.sites.index')->with('success', __('sys.update_item_success'));
            }else{
                return redirect()->route('adminsystem.sites.index');
            }
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Bug occurred: ' . $e->getMessage());
            return response([
                'success' => false,
                'message' => __('sys.update_item_error'),
            ]);
        }
    }
}