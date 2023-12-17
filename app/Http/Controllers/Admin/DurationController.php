<?php

namespace App\Http\Controllers\Admin;

use App\Models\Duration;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\DurationResource;
use App\Http\Requests\StoreDurationRequest;
use App\Http\Requests\UpdateDurationRequest;
use Illuminate\Database\QueryException;

class DurationController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $items = Duration::where('site_id',$this->site_id)->withCount('subscriptions')->paginate(5);
        if ($request->ajax()) {
            return view('admin.duration.ajax-index',compact('items'));
        }
        return view('admin.duration.index');
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
    public function store(StoreDurationRequest $request)
    {
        try {
            $item = new Duration();
            $item->name = $request->name;
            $item->number_days = $request->number_days;
            $item->site_id = $this->site_id;
            $item->save();
            return response([
                'success' => true,
                'message' => __('sys.store_item_success')
            ]);
        } catch (\Exception $e) {
            Log::error('Bug error :'. $e->getMessage());
            return response([
                'success' => true,
                'message' => __('sys.store_item_error')
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Duration::where('site_id',$this->site_id)->findOrfail($id);
        return new DurationResource($item);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Duration $duration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDurationRequest $request, String $id)
    {
        try {
            $item = Duration::findOrfail($id);
            $item->name = $request->name;
            $item->number_days = $request->number_days;
            $item->site_id = $this->site_id;
            $item->save();
            return response([
                'success' => true,
                'message' => __('sys.store_item_success')
            ]);
        } catch (\Exception $e) {
            Log::error('Bug error :'. $e->getMessage());
            return response([
                'success' => true,
                'message' => __('sys.store_item_error')
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $sub = Subscription::where('duration_id',$id)->get();
            if ($sub) {
                return response()->json([
                    'success'=>false,
                    'message'=> __('sys.change_item_before_delete'),
                    'data'=> $sub,
                ],200);
            }else{
                $item =  Duration::where('site_id',$this->site_id)->find($id);
                // Delete old file
                $item->delete();
                
                return response()->json([
                    'success'=>true,
                    'message'=> __('sys.destroy_item_success'),
                ],200);
            }
        } catch (QueryException $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return response()->json([
                'success'=>false,
                'message'=> __('sys.destroy_item_error'),
            ],200);
        }
    }
}