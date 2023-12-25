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
use App\Http\Requests\UpdateAdminRequest;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Controllers\Controller;



class AdminsystemController extends Controller
{
    function index(Request $request){
        if ($request->ajax()) {
            $items = Admin::paginate(3);
            return view('adminsystems.admins.ajax-index',compact('items'));
        }
        return view('adminsystems.admins.index');
    }
    function store(StoreAdminRequest $request){
        $item = new Admin();
        $item->name = $request->name;
        $item->email = $request->email;
        $item->phone = $request->phone;
        $item->status = $request->status;
        $item->password = bcrypt($request->password);
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

    public function update(UpdateAdminRequest $request, string $id)
    {
        $item = Admin::find($id);
        $item->name = $request->name;
        $item->email = $request->email;
        $item->phone = $request->phone;
        $item->status = $request->status;
        if($request->input('password')){
            $item->password = bcrypt($request->input('password'));
        }
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

        // Kiểm tra xem tài khoản cần xóa có phải là tài khoản đăng nhập hiện tại không
        if ($item->id === Auth::guard('admins')->user()->id) {
            return response()->json([
                'success' => false,
                'message' => 'You cannot delete the current user account.',
            ], 200);
        }

        $item->delete();

        return response()->json([
            'success' => true,
            'message' => __('sys.destroy_item_success'),
        ], 200);
    } catch (QueryException $e) {
        Log::error('Bug occurred: ' . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => __('sys.destroy_item_error'),
        ], 200);
    }
}
    
}