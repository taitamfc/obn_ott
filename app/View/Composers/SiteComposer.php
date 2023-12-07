<?php
 
namespace App\View\Composers;
 
use App\Repositories\UserRepository;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Site;
use App\Models\Course;
use App\Models\Page;
use App\Models\Subscription;
use App\Models\Setting;
 
class SiteComposer
{
    /**
     * Create a new profile composer.
     */
    public function __construct() {}
 
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $site_id = session()->get('site_id');
        $site    = Site::find($site_id);
        if($site){
            $setting = Setting::where('site_id',$site_id)->pluck('setting_value','setting_name')->toArray();
            if(!count($setting)){
                $setting = [
                    "auth_page_background_image" => null,
                    "auth_page_body_background_color" => null,
                    "auth_page_footer_background_color" => null,
                    "plan_page_background_image" => null,
                    "plan_page_header_background_color" => null,
                    "plan_page_event_section_background_color" => null,
                    "logo" => asset('assets/images/no-logo.png')
                ];
            }
            $view->with('cr_site_id', $site_id);
            $view->with('cr_site', $site);
            $view->with('site_name', $site->slug);
            $view->with('site_setting', $setting);

            $site_pages = Page::where('site_id',$site->id)->get();
            $site_courses = Course::where('site_id',$site->id)->get();
            $site_subscriptions = Subscription::where('site_id',$site->id)->get();
            
            $view->with('site_pages', $site_pages);
            $view->with('site_courses', $site_courses);
            $view->with('site_subscriptions', $site_subscriptions);
        }
        

    }
}