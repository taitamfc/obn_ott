<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Traits\UploadFileTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreLogoRequest;
use App\Http\Resources\SettingResource;

class SettingController extends Controller
{
    use UploadFileTrait;
    // Handle Banner & Setting Banner
    public function index()
    { 
        return view('admin.settings.logo.index'); 
    }
    public function update(Request $request)
    {
        $items = $request->except(['_token', '_method']);
        foreach ($items as $setting_name => $setting_value){
            Setting::where('setting_name',$setting_name)
            ->where('site_id',$this->site_id)
            ->update([
                'setting_value'=> $setting_value
            ]);
        }
        if ($request->hasFile('auth_page_background_image')) {
            $imagePath = $this->uploadFile($request->file('auth_page_background_image'), $this->site_id.'/banners/images');
            Setting::where('setting_name', 'auth_page_background_image')->where('site_id',$this->site_id)->update([ 'setting_value' => $imagePath ]);
        }
        if ($request->hasFile('plan_page_background_image')) {
            $imagePath = $this->uploadFile($request->file('plan_page_background_image'), $this->site_id.'/banners/images');
            Setting::where('setting_name', 'plan_page_background_image')->where('site_id',$this->site_id)->update([ 'setting_value' => $imagePath ]);
        }


        return redirect()->route('banners.index')->with('success', 'Cập Nhật thành công!');
    }
    
    // Handle Update Logo
    public function logo(Request $request)
    {
        if ($request->ajax()) {
            $item = Setting::where('setting_name', 'LIKE', 'logo')->where('site_idg',$this->site_id)->first();
            return view('admin.settings.logo.ajax-index',compact('item'));
        }
        return view('admin.settings.logo.index');
    }
    function updateLogo(StoreLogoRequest $request)
    {
        if ($request->hasFile('logo')) {
            $imagePath = $this->uploadFile($request->file('logo'), $this->site_id.'/banners/logo');
            $item =  Setting::where('setting_name', 'LIKE', 'logo')->where('site_id', $this->site_id)->first();
            if(empty($item)){
                $this->deleteFile([$item->setting_value]);
                $data = [
                    'setting_name' => 'logo',
                    'setting_value' => $imagePath,
                    'site_id' => $this->site_id,
                ];
                $item = Setting::create($data);
            }else {
                $item->setting_value = $imagePath;
                $item->save();
            }
            return response([
                'success' => true,
                'message' => 'Update Logo Success',
            ]); 
        }
        return response([
            'success' => false,
            'message' => 'Update Logo Fail',
        ]);
    }

    // Handle Update Popup
    public function popup(Request $request)
    { 
        if ($request->ajax()) {
            $item = Setting::where('setting_name', 'LIKE', 'popup')->where('site_id',$this->site_id)->first();
            return view('admin.settings.popup.ajax-index',compact('item'));
        }
        return view('admin.settings.popup.index'); 
    }
    function showPopup(Request $request)
    {
        $item = Setting::where('site_id',$this->site_id)->where('setting_name','LIKE','popup')->first();
        return new SettingResource($item);
    }
    function updatePopup(Request $request)
    {
        try {
            $item =  Setting::where('setting_name', 'LIKE', 'popup')->where('site_id', $this->site_id)->first();
            if(empty($item)){
                $data = [
                    'setting_name' => 'popup',
                    'setting_value' => $request->popup,
                    'site_id' => $this->site_id,
                ];
                $item = Setting::create($data);
            }else {
                $item->setting_value = $request->popup;
                $item->save();
            }
            return response([
                'success' => true,
                'message' => 'Update Popup Success',
            ]); 
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response([
                'success' => false,
                'message' => 'Update Popup Fail',
            ]);
        }
    }
}