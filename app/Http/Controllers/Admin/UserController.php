<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreBankUserRequest;
use App\Models\User;
use App\Models\PlanSite;
use App\Models\Plan;
use App\Models\UserBank;
use App\Models\GroupSite;
use App\Traits\UploadFileTrait;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UpdateAvatarRequest;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use DB;

class UserController extends AdminController
{
    use UploadFileTrait;
    /**
     * Display a listing of the resource.
     */

    function index(Request $request){
        // $this->authorize('User',User::class);
        $groups = Group::all();
        $user_site = GroupSite::where('site_id',$this->site_id)->get('user_id');
        $query = User::query()->where('id',$this->user_id);
        foreach ($user_site as $item) {
            $query->orWhere('id',$item->user_id);
        }
        $items = $query->with('groups')->get();
        if( $request->ajax() ){
            
            return view('admin.accountmanagements.users.ajax-index',compact('items','groups'));
        }
        return view('admin.accountmanagements.users.index',compact('groups'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    function store(StoreUserRequest $request){
        try {
            // $this->authorize('User',User::class);
            DB::beginTransaction();
            $item = new User();
            $item->name = $request->name;
            $item->email = $request->email;
            $item->password = $request->password;
            $item->parent_id = $this->user_id;
            if ($request->hasFile('image')) {
                $item->image_url = $this->uploadFile($request->file('image'), 'uploads/'.$this->user_id.'/users');
            }else {
                $item->image_url = 'assets/images/default.png';
            }
                if($item->save()){
                    $user_site = new GroupSite();
                    $user_site->group_id = $request->group_id;
                    $user_site->user_id = $item->id;
                    $user_site->site_id = $this->site_id;
                    $user_site->save();
                }
            DB::commit();
            return response()->json([
                'success'=>true,
                'message'=> __('sys.store_item_success'),
                'data'=> $item
            ],200);
        } catch (QueryException  $e) {
            DB::rollback();
            Log::error('Bug occurred: ' . $e->getMessage());
            return response()->json([
                'success'=>false,
                'message'=> __('sys.store_item_error'),
            ],200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $this->authorize('User',User::class);
        $item = User::findOrfail($id);
        return new UserResource($item);
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
    public function update(UpdateUserRequest $request, string $id){
        // $this->authorize('User',User::class);
        $item = User::findOrfail($id);
        $item->name = $request->name;
        $item->email = $request->email;
        $item->password = isset($request->password)?bcrypt($request->password):$item->password;
        $item->phone = isset($request->phone)?$request->phone:$item->phone;
        $item->group_id = isset($request->group_id)?$request->group_id:$item->group_id;
        try {
            if ($request->hasFile('image')) {
                // Delete old file
                $this->deleteFile([$item->image_url]);

                // Upload new file
                $item->image_url = $this->uploadFile($request->file('image'), 'uploads/'.$this->user_id.'/users');
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
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        try {
            // $this->authorize('User',User::class);
            $item =  User::findOrfail($id);
            // Delete old file
            $this->deleteFile([$item->image_url]);
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
    function account(Request $request){
        try {
            // $this->authorize('User',User::class);
            if ($request->ajax()) {
                $item = User::findOrfail($this->user_id);
                $bankOwner = UserBank::where('user_id',$this->user_id)->first();
                $current_plan = PlanSite::where('site_id',$this->site_id)->where('is_current',1)->with('site','plan')->first();
                return view('admin.accountmanagements.accountmanage.ajax-index',compact('item','bankOwner','current_plan'));
            }
            return view('admin.accountmanagements.accountmanage.index');
        } catch (QueryException $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return response()->json([
                'success'=>false,
                'message'=> __('sys.destroy_item_error'),
            ],200);
        }
    }
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
            return view('admin.accountmanagements.plans.ajax.ajax-buyPlan',compact('item','current_plan'));
        }
        return view('admin.accountmanagements.plans.buyPlan');
    }
    function storePlans(Request $request){
        $count = PlanSite::where('site_id', $this->site_id)->count();
        try {
            $id = $_REQUEST['data'];
            $currentDateTime = Carbon::now();
            $plan = Plan::findOrfail($id);
            $item = new PlanSite();
            $item->plan_id = $id;
            $item->site_id = $this->site_id;
            $current_plan_date = PlanSite::where('site_id',$this->site_id)->latest('created_at')->value('expiration_date');
            // if user has current plan
            if (!empty($current_plan_date)) {
                $current_plan_date = Carbon::parse($current_plan_date);
                $item->is_current = 0;
                $item->created_at = $current_plan_date;
                $item->expiration_date = $current_plan_date->addMonths($plan->duration);
            // if user don't have plan
            }else {
                $item->is_current = 1;
                $item->created_at = $currentDateTime;
                $item->expiration_date = $currentDateTime->addMonths($plan->duration);
            }
            $item->save();
            return response([
                'success' => true,
                'message' => __('sys.store_item_success'),
                'redirect' => route('users.plans')
            ],200);
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return response([
                'success' => false,
                'message' => __('sys.store_item_error'),
            ],200);
        }
    }
    function avatar(UpdateAvatarRequest $request){
        try {
            $item = User::findOrfail($this->user_id);
            $item->image_url = $this->uploadFile($request->file('image'), 'uploads/'.$this->user_id.'/users');
            $item->save();
            return response([
                'success' => true,
                'message' => __('sys.store_item_success'),
                'data' => $item
            ],200);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response([
                'success' => false,
                'message' => __('sys.store_item_error'),
            ],200);
        }
    }
}