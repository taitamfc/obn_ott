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

class SettingController extends Controller
{
    use UploadFileTrait;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->user_id = Auth::id();
            return $next($request);
        });
    }

    public function index(){ return view('settings.logo.index'); }
    
    public function update(Request $request){
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
    
    // Handle Logo
    public function logo(Request $request){
        if ($request->ajax()) {
            $item = Setting::where('setting_name', 'LIKE', 'logo')->where('user_id',$this->user_id)->first();
            return view('settings.logo.ajax-index',compact('item'));
        }
        return view('settings.logo.index');
    }
    function updateLogo(StoreLogoRequest $request){
        if ($request->hasFile('logo')) {
            $imagePath = $this->uploadFile($request->file('logo'), $this->user_id.'/banners/logo');
            $item =  Setting::where('setting_name', 'LIKE', 'logo')->where('user_id', $this->user_id)->first();
            if(empty($item)){
                $this->deleteFile([$item->setting_value]);
                $data = [
                    'setting_name' => 'logo',
                    'setting_value' => $imagePath,
                    'user_id' => $this->user_id,
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

    // public function pageTerm(){ return view('settings.pages.terms'); }
    // public function pagePrivacyPolicy(){ return view('settings.pages.privacy-policy'); }
    // public function pageRefundPolicy(){ return view('settings.pages.refund-policy'); }
    // public function pageFaq(){ return view('settings.pages.faq'); }
    // public function popup(){ return view('settings.popup'); }
    // public function notice(){ return view('settings.notice'); }
    // public function customerInquiry(){ return view('settings.customer-inquiry'); }
}