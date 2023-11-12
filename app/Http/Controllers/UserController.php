<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreBankUserRequest;
use App\Models\User;
use App\Models\PlanUser;
use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function index(Request $request){
        $this->authorize('User',User::class);
        $groups = Group::all();
        $items = User::get();
        return view('accountmanagements.users.index',compact('items','groups'));
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
        $item = new User();
        $item->name = $request->name;
        $item->email = $request->email;
        $item->password = $request->password;
        $item->group_id = $request->group_id;
        $item->parent_id = $request->parent_id;
        try {
            if ($request->hasFile('image')) {
                $item->img = $this->uploadFile($request->file('image'), 'users/images');
            } 
            if ($request->hasFile('video')) {
                $item->video_url = $this->uploadFile($request->file('video'), 'users/videos');
            }
            $item->save();
            return response()->json([
                'success'=>true,
                'message'=> 'Saved ' . $item->id,
                'data'=> $item
            ],200);
        } catch (QueryException  $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return response()->json([
                'success'=>false,
                'message'=> 'Save not success'
            ],200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = User::find($id);
       
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
    public function update(UpdateUserRequest $request, string $id)
    {
  
        $item = User::find($id);
        $item->name = $request->name;
        $item->email = $request->email;
        $item->password = isset($request->password)?$request->password:$item->password;
        $item->phone = isset($request->phone)?$request->phone:$item->phone;
        $item->group_id = isset($request->group_id)?$request->group_id:$item->group_id;
        $item->parent_id = isset($request->parent_id)?$request->parent_id:$item->parent_id;
        try {
            if ($request->hasFile('image')) {
                $item->img = $this->uploadFile($request->file('image'), 'users/images');
            } 
            if ($request->hasFile('video')) {
                $item->video_url = $this->uploadFile($request->file('video'), 'banners/videos');
            }
            $item->save();
            return response()->json([
                'success'=>true,
                'message'=> 'Updated ' . $id,
                'data'=> $item
            ],200);
        } catch (QueryException  $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return response()->json([
                'success'=>false,
                'message'=> 'Update not success ' . $id
            ],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            User::destroy($id);
            return response()->json([
                'success'=>true,
                'message'=> 'Deleted ' . $id
            ],200);
        } catch (QueryException $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return response()->json([
                'success'=>false,
                'message'=> 'Deleted not success ' . $id
            ],200);
        }
    }

    function account(Request $request){
        $item = User::findOrfail(auth::user()->id);
        return view('accountmanagements.accountmanage.index',compact('item'));
    }
    function plan(){
        $items = Plan::paginate(3);
        $current_plan = PlanUser::where('user_id',Auth::user()->id)->where('is_current',1)->first();
        $next_plan = PlanUser::where('user_id',Auth::user()->id)->where('is_current',0)->first();
        return view('accountmanagements.plans.plan',compact('items','current_plan','next_plan'));
    }
    function addPlan(String $id){
        $item = Plan::findOrfail($id);
        $current_plan = PlanUser::where('user_id',Auth::user()->id)->where('is_current',1)->value('expiration_date');
        return view('accountmanagements.plans.buyPlan',compact('item','current_plan'));
    }
    function storePlans(Request $request){
        $count = PlanUser::where('user_id', Auth::user()->id)->count();
        if ($count<=1) {
        try {
            $id = $_REQUEST['data'];
            $currentDateTime = Carbon::now();
            $plan = Plan::findOrfail($id);
            $item = new PlanUser();
            $item->plan_id = $id;
            $item->user_id = Auth::user()->id;
            $current_plan_date = PlanUser::where('user_id',Auth::user()->id)->where('is_current',1)->value('expiration_date');
            if (!empty($current_plan_date)) {
                $current_plan_date = Carbon::parse($current_plan_date);
                $item->is_current = 0;
                $item->created_at = $current_plan_date;
                $item->expiration_date = $current_plan_date->addMonths($plan->duration);
            }else {
                $item->is_current = 1;
                $item->created_at = $currentDateTime;
                $item->expiration_date = $currentDateTime->addMonths($plan->duration);
            }
            $item->save();
            return response([
                'success' => true,
                'message' => 'Buy plan success',
                'redirect' => route('users.plans')
            ],200);
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return response([
                'success' => false,
                'message' => 'Buy plan fail',
            ],200);
        }
        }
        return response([
            'success' => false,
            'message' => 'Buy plan fail',
        ],200);
    }
}