<?php

namespace App\Http\Controllers\Adminsystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Site;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use App\Http\Resources\SiteResource;
use App\Http\Requests\UpdateSiteRequest;
use App\Http\Requests\StoreSiteRequest;
use App\Http\Controllers\Admin\AdminController;

class SiteController extends AdminController
{

    function index(Request $request){
        if( $request->ajax() ){
            $items = Site::where('user_id',$this->user_id)->paginate(20);
            return view('adminsystems.sites.ajax-index',compact('items'));
        } 
        return view('adminsystems.sites.index');
    }
    public function show(string $id)
    {
        $item = Site::where('user_id', auth()->user()->id)->find($id);

        return new SiteResource($item);
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
    public function update(UpdateSiteRequest $request, string $id)
    {
        $item = Site::where('user_id', auth()->user()->id)->find($id);
        
        $request->slug = $request->slug ? $request->slug : $request->name;
        $slug = $maybe_slug = Str::slug($request->slug);
        $next = 2;
        while (Site::where('slug', $slug)->where('id','!=',$this->site_id)->first()) {
            $slug = "{$maybe_slug}-{$next}";
            $next++;
        }

        $item->name = $request->name;
        $item->slug = $slug;
        $item->status = $request->status;
        try {
            if ($request->hasFile('image')) {
                // Delete old file
                $this->deleteFile([$item->img]);

                // Upload new file
                $item->img = $this->uploadFile($request->file('image'), 'uploads/'.$this->site_id.'/subjects');
            }
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

    function store(StoreSiteRequest $request){
        $item = new Site();
        $request->slug = $request->slug ? $request->slug : $request->name;
        $slug = $maybe_slug = Str::slug($request->slug);
        $next = 2;
        while (Site::where('slug', $slug)->first()) {
            $slug = "{$maybe_slug}-{$next}";
            $next++;
        }

        $item->name = $request->name;
        $item->slug = $slug;
        $item->status = $request->status;
        $item->user_id = auth()->user()->id;
        try {
            if ($request->hasFile('image')) {
                // Delete old file
                $this->deleteFile([$item->img]);

                // Upload new file
                $item->img = $this->uploadFile($request->file('image'), 'uploads/'.$this->site_id.'/subjects');
            }
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
    public function changeSite($site_id){
        session()->put('site_id',$site_id);
        return redirect()->back();
    }
}
