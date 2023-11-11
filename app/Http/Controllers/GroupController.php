<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\GroupResource;
class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function index(Request $request){
        $this->authorize('Group',Group::class);
        $items = Group::get();
        $roles = Role::get();
        $selected_roles = [];
        return view('accountmanagements.groups.index',compact('items','roles','selected_roles'));

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
        return view('accountmanagements.groups.edit',compact('items','roles','item','selected_roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroupRequest $request, string $id)
    {
  
        $item = Group::find($id);
        $item->name = $request->name;
        try {
            $item->save();
            $item->roles()->sync($request->role_ids);
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
            Group::destroy($id);
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
}
