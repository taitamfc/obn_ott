<?php

namespace App\Http\Controllers\Adminsystem;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserBank;
use App\Models\PlanSite;
use App\Http\Resources\UserResource;
use App\Http\Requests\StoreBankUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UpdateAvatarRequest;
use App\Http\Controllers\Controller;

use App\Models\Group;
use App\Models\GroupRole;
use App\Models\GroupSite;
use App\Models\Role;
use App\Models\Site;
use App\Models\Plan;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Http\Resources\GroupResource;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use DB;
use App\Traits\UploadFileTrait;

class UserController extends Controller
{
    use UploadFileTrait;
    /**
     * Display a listing of the resource.
     */
    
    function index(Request $request){
        
        $users = User::with(['plansite','activePlan'])->where('role','site_owner')->paginate(5);
        $plans = Plan::all();
        $param = [
            'users' => $users,
            'plans' => $plans,
        ];
        if( $request->ajax() ){
            return view('adminsystems.users.ajax-index',$param);
        }
        return view('adminsystems.users.index',$param);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function getPlanSite(Request $request){
        if($request->ajax() || true){
            $user_id            = $request->input('user_id');
            $plan_id            = $request->input('plan_id');
            $plan               = Plan::findOrFail($plan_id);
            $user               = User::findOrFail($user_id);
            $currentDateTime    = Carbon::now();

            $plan_name          = '';
            $plan_expiration    = '';
            // If plan id not equal current plan
            if($user->activePlan && $user->activePlan->plan_id == $plan_id){
                //No change
            }else{
                $current_plan = PlanSite::where('user_id',$user_id)->where('is_current',1)->first();

                // Handle add plan for user
                $plan_site = PlanSite::where('plan_id',$plan_id)->where('user_id',$user_id)->first();
                if(!$plan_site){
                    $plan_site = new PlanSite();
                }
                if (!empty($current_plan)) {
                    $current_plan_date = Carbon::createFromFormat('Y-m-d', $current_plan->expiration_date);
                    $plan_site->expiration_date = $current_plan_date->addDays($plan->number_days);
                }else {
                    $plan_site->expiration_date = $currentDateTime->addDays($plan->number_days);
                }
                $plan_site->plan_id = $plan_id;
                $plan_site->site_id = $user->site_id;
                $plan_site->user_id = $user->id;
                $plan_site->is_current = 1;

                // Remove current plan
                if (!empty($current_plan)) {
                    $current_plan->is_current = 0;
                    $current_plan->save();
                }
                $plan_site->save();

                $plan_name          = $plan->name;
                $plan_expiration    = date('d-m-Y',strtotime($plan_site->expiration_date));
            }

            
            $data = [
                'plan_name' => $plan_name,
                'plan_expiration' => $plan_expiration,
            ];
            return response()->json(['data' => $data]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    function store(StoreUserRequest $request){
        DB::beginTransaction();
        try {
            // $this->authorize('User',User::class);
            $item = new User();
            $item->name = $request->name;
            $item->email = $request->email;
            $item->group_id = $request->group_id;
            $item->password = $request->password;
            $item->parent_id = $this->user_id;
            $item->site_id = $this->site_id;
            $item->role = 'site_manager';
            if ($request->hasFile('image')) {
                $item->image_url = $this->uploadFile($request->file('image'), 'uploads/'.$this->user_id.'/users');
            }else {
                $item->image_url = 'assets/images/favicon.png';
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