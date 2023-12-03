<?php
 
namespace App\View\Composers;
 
use App\Repositories\UserRepository;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Grade;

 
class MenuComposer
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
        $items = Grade::where('site_id',$site_id)->where('status',1)->get();
        $view->with('site_menus', $items);
    }
}