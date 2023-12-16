<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserBank;
use App\Models\PlanSite;
use App\Http\Resources\UserResource;
use App\Http\Requests\StoreBankUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UpdateAvatarRequest;

use App\Models\Group;
use App\Models\GroupRole;
use App\Models\GroupSite;
use App\Models\Role;
use App\Models\Site;
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
use App\Jobs\SendEmail;

class UserController extends AdminController
{
    use UploadFileTrait;
    /**
     * Display a listing of the resource.
     */

    function index(Request $request){
        // $this->authorize('User',User::class);
        $groups = Group::where('site_id',$this->site_id)->orderBy('position','ASC')->get();
        $users = User::where('site_id',$this->site_id)->get();
        $roles = Role::get();
        $selected_roles = [];
        $param = [
            'groups' => $groups,
            'users' => $users,
            'roles' => $roles,
            'selected_roles' => $selected_roles,
        ];
        if( $request->ajax() ){
            return view('admin.accountmanagements.users.ajax-index',$param);
        }
        return view('admin.accountmanagements.users.index',$param);
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
                    $data = [
                        'name' => $item->name,
                        'email' => $item->email,
                        'password' => $request->password
                    ];
                    SendEmail::dispatch($item,$data,'store_member');
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