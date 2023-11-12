<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreBankUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;
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
}
