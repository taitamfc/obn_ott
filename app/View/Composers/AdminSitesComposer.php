<?php
 
namespace App\View\Composers;
 
use App\Repositories\UserRepository;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Site;

 
class AdminSitesComposer
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
            $user_id = Auth::user()->id;
            $sites = Site::where('user_id',$user_id)->get();
            $view->with('cr_admin_sites', $sites);
        }
    }
}