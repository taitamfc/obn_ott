<?php
 
namespace App\View\Composers;
 
use App\Repositories\UserRepository;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
 
class NotificationComposer
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
        if( Auth::guard('students') ){
            $student_id = Auth::guard('students')->id();
            $site_id = session()->get('site_id');
            $items = Notification::where('site_id', $site_id)
            ->whereIn('action',['site_to_student'])
            ->where('is_read',0)
            ->where('student_id',$student_id)
            ->orderBy('id','desc')->get();
            $view->with('cr_notifications', $items);
        }
        
    }
}