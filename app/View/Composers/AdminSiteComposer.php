<?php
 
namespace App\View\Composers;
 
use App\Repositories\UserRepository;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Site;
 
class AdminSiteComposer
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
        $site_id = $site_id ? $site_id : Auth::user()->site_id;
        $site    = Site::find($site_id);
        $view->with('cr_site_id', $site_id);
        $view->with('cr_site', $site);
    }
}