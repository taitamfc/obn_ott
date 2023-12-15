<?php
 
namespace App\View\Composers;
 
use App\Repositories\UserRepository;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
 
class AdminNotificationComposer
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
        if( Auth::user() ){
            $site_id = session()->get('site_id');
            $items = Notification::where('site_id', $site_id)
            ->whereIn('action',['student_to_site','system_to_site'])
            ->where('is_read',0)
            ->orderBy('id','desc')->get();
            $view->with('cr_notifications', $items);
        }
        
    }
}