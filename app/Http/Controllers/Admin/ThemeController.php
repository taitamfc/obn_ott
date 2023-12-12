<?php

namespace App\Http\Controllers\Admin;

use App\Traits\UploadFileTrait;
use App\Models\Setting;
use Illuminate\Http\Request;

class ThemeController extends AdminController
{
    use UploadFileTrait;

    public function homepageBanner(){
        return view('admin.themes.homepage-banner');
    }
    public function homepageSections(){
        return view('admin.themes.homepage-sections');
    }
    public function footerSections()
    {
        $footer_settings = Setting::whereIn('setting_name',[
            'footer_about','footer_copyright'
        ])->get();
        if($footer_settings){
            $footer_settings = $footer_settings->pluck('setting_value','setting_name')->toArray();
            $footer_settings['footer_about'] = !empty($footer_settings['footer_about']) ? $footer_settings['footer_about'] : '';
            $footer_settings['footer_copyright'] = !empty($footer_settings['footer_copyright']) ? $footer_settings['footer_copyright'] : '';
        }else{
            $footer_settings = [
                'footer_about' => '',
                'footer_copyright' => ''
            ];
        }
        
        return view('admin.themes.footer-sections', compact('footer_settings'));
    }
 
    public function updateFooter(Request $request)
    {
        try {
            $item =  Setting::where('setting_name', 'footer_about')->where('site_id', $this->site_id)->first();
            if(empty($item)){
                $data = [
                    'setting_name' => 'footer_about',
                    'setting_value' => $request->about,
                    'site_id' => $this->site_id,
                ];
                $item = Setting::create($data);
            }else {
                $item->setting_value = $request->about;
                $item->save();
            }

            $item =  Setting::where('setting_name', 'footer_copyright')->where('site_id', $this->site_id)->first();
            if(empty($item)){
                $data = [
                    'setting_name' => 'footer_copyright',
                    'setting_value' => $request->copyright,
                    'site_id' => $this->site_id,
                ];
                $item = Setting::create($data);
            }else {
                $item->setting_value = $request->copyright;
                $item->save();
            }

            return redirect()->back()->with('success', 'Footer updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating footer.');
        }
    }

}