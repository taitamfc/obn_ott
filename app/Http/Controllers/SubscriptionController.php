<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Course;
use App\Http\Requests\StoreSubscriptionRequest;
use App\Http\Requests\UpdateSubscriptionRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\SubscriptionResource;
class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function index(Request $request){
        $items = Subscription::get();
        $courses = Course::pluck('name', 'id');
        $form = 'create';
        return view('stores.subscriptions.index',compact('items','courses','form'));
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
    function store(StoreSubscriptionRequest $request){
        $item = new Subscription();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->duration = $request->duration;
        $item->status = $request->status;

       
        try {
            $item->save();
            $item->courses()->attach($request->course);
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
        $item = Subscription::find($id);
       
        return new SubscriptionResource($item);
        // return view('stores.subscriptions.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $items  = Subscription::get();
        $item   = Subscription::find($id);
        $selected_courses = $item->courses ? $item->courses->pluck('id')->toArray() : [];
        $courses = Course::get();
        $form = 'edit';
        return view('stores.subscriptions.index',compact('items','courses','item','selected_courses','form'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubscriptionRequest $request, string $id)
    {
        // dd($request);
        $item = Subscription::find($id);
        $item->name = $request->name;
        $item->price = $request->price;
        $item->duration = $request->duration;
        $item->status = $request->status;
        try {
            $item->save();
            $item->courses()->sync($request->course);
            return response()->json([
                'success'=> true,
                'redirect' => route('subscriptions.index'),
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Subscription::destroy($id);
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