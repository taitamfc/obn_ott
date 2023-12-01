<?php

namespace App\Http\Controllers;
use App\Http\Resources\BannerResource;
use App\Models\Banner;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Traits\UploadFileTrait;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use UploadFileTrait;
    
    function index(Request $request){
        // $this->authorize('Banner',Banner::class);
        $settings = Setting::all()->pluck('setting_value','setting_name')->toArray();
        if ($request->ajax()) {
            $items = Banner::get();
            return view('admin.themes.banners.ajax-index',compact('items'));
        }
        return view('admin.themes.banners.index',compact('settings'));
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
    function store(StoreBannerRequest $request){
        $item = new Banner();
        $item->status = $request->status;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->link = $request->link;
        $item->site_id = $this->site_id;
        try {
            if ($request->hasFile('image')) {
                $item->img = $this->uploadFile($request->file('image'), 'banners/images');
            } 
            if ($request->hasFile('video')) {
                $item->video_url = $this->uploadFile($request->file('video'), 'banners/videos');
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
    public function show(string $id)
    {
        $item = Banner::find($id);
        return new BannerResource($item);
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
    public function update(UpdateBannerRequest $request, string $id)
    {
        $item = Banner::find($id);
        $item->name = $request->name;
        $item->description = $request->description;
        $item->status = $request->status;
        $item->link = $request->link;
        $item->site_id = $this->site_id;
        try {
            if ($request->hasFile('image')) {
                $item->img = $this->uploadFile($request->file('image'), 'banners/images');
            } 
            if ($request->hasFile('video')) {
                $item->video_url = $this->uploadFile($request->file('video'), 'banners/videos');
            }
            $item->save();
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
            Banner::destroy($id);
            return response()->json([
                'success'=>true,
                'message'=> 'Deleted success'
            ],200);
        } catch (QueryException $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return response()->json([
                'success'=>false,
                'message'=> 'Deleted not success '
            ],200);
        }
    }
}