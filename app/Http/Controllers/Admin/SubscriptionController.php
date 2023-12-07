<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Course;
use App\Models\Duration;
use App\Models\SubscriptionCourse;
use App\Http\Requests\StoreSubscriptionRequest;
use App\Http\Requests\UpdateSubscriptionRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\SubscriptionResource;
class SubscriptionController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    function index(Request $request){
        $form = 'create';
        $courses = Course::where('site_id',$this->site_id)->where('status',Course::ACTIVE)->pluck('name', 'id');
        $durations = Duration::where('site_id',$this->site_id)->pluck('name', 'id');
        if($request->ajax()){
            $items = Subscription::with('duration')->get();
            return view('admin.stores.subscriptions.ajax-index',compact('items'));
        }
        return view('admin.stores.subscriptions.index',compact('courses','form','durations'));
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
        $item->duration_id = $request->duration;
        $item->site_id = $this->site_id;
        try {
            $item->save();
            foreach($request->course as $course){
                $sub_cou = new SubscriptionCourse();
                $sub_cou->course_id = $course;
                $sub_cou->subscription_id = $item->id;
                $sub_cou->site_id = $this->site_id;
                $sub_cou->save();
            }
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
        // return view('admin.stores.subscriptions.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $items  = Subscription::get();
        $item   = Subscription::find($id);
        $selected_courses = $item->courses ? $item->courses->pluck('id')->toArray() : [];
        $durations = Duration::get();
        $courses = Course::get();
        $form = 'edit';
        return view('admin.stores.subscriptions.index',compact('items','courses','item','selected_courses','form','durations'));
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
        $item->duration_id = $request->duration;
        $item->site_id = $this->site_id;
        try {
            $item->save();
            $item->courses()->sync($request->course);
            return response()->json([
                'success'=> true,
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