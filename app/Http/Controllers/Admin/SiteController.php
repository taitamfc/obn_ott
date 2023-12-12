<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Site;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class SiteController extends Controller
{

    public function index(){
        $items = Site::all();
        // dd($items);
        $params = [
            'items' => $items,
        ];
        return view('admin.settings.sites.index',$params);
    }

    function edit(String $id){
        $item = Site::findOrfail($id);
        return view('admin.settings.sites.edit',compact('item'));
    }

    function update(Request $request,String $id){
        try {
            $item = Site::findOrfail($id);
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

    public function changeSite($site_id){
        session()->put('site_id',$site_id);
        return redirect()->back();
    }
}
