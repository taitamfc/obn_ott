<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Traits\UploadFileTrait;

class SettingController extends Controller
{
    use UploadFileTrait;
    public function update(Request $request)
    {
        // dd($request);
        $items = $request->except(['_token', '_method']);
        foreach ($items as $setting_name => $setting_value){
            Setting::where('setting_name',$setting_name)->update([
                'setting_value'=> $setting_value
            ]);
        }

        if ($request->hasFile('auth_page_background_image')) {
            $imagePath = $this->uploadFile($request->file('auth_page_background_image'), 'banners/images');
            Setting::where('setting_name', 'auth_page_background_image')->update([ 'setting_value' => $imagePath ]);
        }
        if ($request->hasFile('plan_page_background_image')) {
            $imagePath = $this->uploadFile($request->file('plan_page_background_image'), 'banners/images');
            Setting::where('setting_name', 'plan_page_background_image')->update([ 'setting_value' => $imagePath ]);
        }


        return redirect()->route('banners.index')->with('success', 'Cập Nhật thành công!');
    }
}
