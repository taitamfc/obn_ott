<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\GroupRole;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\GroupResource;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function index(Request $request){
        if ($request->ajax()) {
            $this->authorize('Group',Group::class);
            $items = Group::orderBy('position','ASC')->get();
            $roles = Role::get();
            $selected_roles = [];
            return view('admin.accountmanagements.groups.ajax-index',compact('items','roles','selected_roles'));
        }
        return view('admin.accountmanagements.groups.index');
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
    function store(StoreGroupRequest $request){
        $this->authorize('Group',Group::class);
        $item = new Group();
        $item->name = $request->name;
        try {
            $item->save();
            $item->roles()->attach($request->role_ids);
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
    public function show(string $id)
    {
        $this->authorize('Group',Group::class);
        $item = Group::find($id);
        return new GroupResource($item);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $items = Group::get();
        $item = Group::find($id);
        $selected_roles = $item->roles->pluck('id')->toArray();
        $roles = Role::get();
        return view('admin.accountmanagements.groups.edit',compact('items','roles','item','selected_roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroupRequest $request, string $id)
    {
        $this->authorize('Group',Group::class);
        $item = Group::find($id);
        $item->name = $request->name;
        try {
            $item->save();
            $item->roles()->sync($request->role_ids);
            return response()->json([
                'success'=>true,
                'message'=> 'Updated success',
                'data'=> $item
            ],200);
        } catch (QueryException  $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return response()->json([
                'success'=>false,
                'message'=> 'Update not success '
            ],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->authorize('Group',Group::class);
            Group::destroy($id);
            GroupRole::where('group_id',$id)->delete();
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
    function position(Request $request){
        try {
            foreach ($_REQUEST['item'] as $key => $value) {
                $item = Group::findOrfail($value);
                $item->position = $key;
                $item->save();
            }
            return response()->json([
                'success'=> true,
                'message'=> 'Updated position success',
                'data' => $_REQUEST['item']
            ],200);
        } catch (QueryException $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
        }
    }
}