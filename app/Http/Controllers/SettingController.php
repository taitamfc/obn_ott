<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Traits\UploadFileTrait;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    use UploadFileTrait;
    public function update(Request $request)
    {
        // dd($request);
        $items = $request->except(['_token', '_method']);
        foreach ($items as $setting_name => $setting_value){
            Setting::where('setting_name',$setting_name)
            ->where('user_id',Auth::id())
            ->update([
                'setting_value'=> $setting_value
            ]);
        }

        if ($request->hasFile('auth_page_background_image')) {
            $imagePath = $this->uploadFile($request->file('auth_page_background_image'), Auth::id().'/banners/images');
            Setting::where('setting_name', 'auth_page_background_image')->where('user_id',Auth::id())->update([ 'setting_value' => $imagePath ]);
        }
        if ($request->hasFile('plan_page_background_image')) {
            $imagePath = $this->uploadFile($request->file('plan_page_background_image'), Auth::id().'/banners/images');
            Setting::where('setting_name', 'plan_page_background_image')->where('user_id',Auth::id())->update([ 'setting_value' => $imagePath ]);
        }


        return redirect()->route('banners.index')->with('success', 'Cập Nhật thành công!');
    }

    public function index(){ return view('settings.logo'); }
    public function logo(){ 
        return view('settings.logo'); 
    }
    public function pageTerm(){ return view('settings.pages.terms'); }
    public function pagePrivacyPolicy(){ return view('settings.pages.privacyPolicy'); }
    public function pageRefundPolicy(){ return view('settings.pages.refundPolicy'); }
    public function pageFaq(){ return view('settings.pages.faq'); }
    public function popup(){ return view('settings.popup'); }
    public function notice(){ return view('settings.notice'); }
    public function customerInquiry(){ return view('settings.customer-inquiry'); }
}
