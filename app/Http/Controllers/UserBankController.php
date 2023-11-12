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
    /**
     * Display a listing of the resource.
     */
    function index(Request $request){
        $items = UserBank::get();
        return view('accountmanagements.billings.index',compact('items'));
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
