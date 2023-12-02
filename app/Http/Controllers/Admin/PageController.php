<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Traits\UploadFileTrait;
use App\Models\Page;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PageController extends AdminController
{
    use UploadFileTrait;
    function index(Request $request){
        if ($request->ajax()) {
            $items = Page::where('site_id',$this->site_id)->get();
            return view('admin.settings.pages.ajax-index',compact('items'));
        }
        return view('admin.settings.pages.index');
    }
    
    function create(){
        return view('admin.settings.pages.create');
    }

    function store(Request $request){
        try {
            $data = $request->except(['_method','_token']);
            $data['slug'] = Str::slug($request->title);
            $data['site_id'] = $this->site_id;
            $item = Page::create($data);
            return response([
                'success' => true,
                'message' => 'Store Page Success'
            ]);
        } catch (\Excrption $e) {
            Log::error($e->getMessage());
            return response([
                'success' => false,
                'message' => 'Store Page Fail'
            ]);
        }
    }
    
    function edit(String $id){
        $item = Page::findOrfail($id);
        return view('admin.settings.pages.edit',compact('item'));
    }

    function update(Request $request,String $id){
        try {
            $item = Page::findOrfail($id);
            $data = $request->except(['_method','_token']);
            $data['slug'] = Str::slug($request->title);
            $data['site_id'] = $this->user_id;
            $item->update($data);
            return response([
                'success' => true,
                'message' => 'Update Page Success'
            ]);
        } catch (\Excrption $e) {
            Log::error($e->getMessage());
            return response([
                'success' => false,
                'message' => 'Update Page Fail'
            ]);
        }
    }

    function destroy(String $id){
        try {
            $item  = Page::destroy($id);
            return response([
                'success' => true,
                'message' => 'Delete '.$item.' Success',
            ]);
        } catch (Exception $e) {
            return response([
                'success' => false,
                'message' => 'Delete '.$item.' Fail',
            ]);
        }
    }

    function show(String $id){
        $item = Page::findOrfail($id);
        return view('admin.settings.pages.show',compact('item'));
    }
}