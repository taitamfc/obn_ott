<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserBankRequest;
use App\Models\UserBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreBannerRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use App\Traits\UploadFileTrait;

class UserBankController extends Controller
{
    use UploadFileTrait;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->user_id = Auth::id();
            return $next($request);
        });
    }
    
    function index(Request $request){
        if($request->ajax()){
            $items = UserBank::get();
            return view('accountmanagements.billings.ajax-index',compact('items'));
        }
        return view('accountmanagements.billings.index');
    }

    function store(StoreUserBankRequest $request){
        $item = UserBank::where('user_id', '=', $this->user_id)->first();
        if (empty($item)) {
            $item = new UserBank();
        }
        $item->user_id = $this->user_id;
        $item->bank_number = $request->bank_number;
        $item->bank_owner = $request->bank_owner;
        $item->bank_name = $request->bank_name;
        $item->address = $request->address;
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
    function destroy(String $id){
        try {
            $this->authorize('User',User::class);
            $item = UserBank::where('user_id',$this->user_id)->findOrfail($id);
            $item->delete();
            return response()->json([
                'success'=> true,
                'message'=> 'Destroy success'
            ],200);
        } catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return response()->json([
                'success'=>false,
                'message'=> 'Destroy fail'
            ],200);
        }

    }
}