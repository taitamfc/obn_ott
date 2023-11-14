<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserBankRequest;
use App\Models\UserBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreBannerRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class UserBankController extends Controller
{
    function index(Request $request){
        $items = UserBank::get();
        return view('accountmanagements.billings.index',compact('items'));
    }

    function store(StoreUserBankRequest $request){
        $item = new UserBank();
        $item->user_id = Auth::id();
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
}