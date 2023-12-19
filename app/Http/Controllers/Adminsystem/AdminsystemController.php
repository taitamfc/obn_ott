<?php

namespace App\Http\Controllers\Adminsystem;


use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\AdminResource;
use Carbon\Carbon;
use DB;
use App\Http\Controllers\Admin\AdminController;


class AdminsystemController extends AdminController
{
    function index(Request $request){
        if ($request->ajax()) {
            $items = Admin::paginate(3);
            return view('adminsystems.admins.ajax-index',compact('items'));
        }
        return view('adminsystems.admins.index');
    }
    function store(Request $request){
        $item = new Admin();
        $item->name = $request->name;
        $item->code = $request->code;
        $item->email = $request->email;
        $item->phone = $request->phone;
        $item->status = $request->status;
        $item->password = $request->password;
        $item->address = $request->address;
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
        $item = Admin::find($id);
        return new AdminResource($item);
    }

    public function update(Request $request, string $id)
    {
        $item = Admin::find($id);
        $item->name = $request->name;
        $item->code = $request->code;
        $item->email = $request->email;
        $item->phone = $request->phone;
        $item->status = $request->status;
        $item->password = $request->password;
        $item->address = $request->address;
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
            $item =  Admin::find($id);
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