<?php
 
namespace App\View\Composers;
 
use App\Repositories\UserRepository;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

 
class LanguageComposer
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
        $lang = session()->get('cr_lang',env('DEFAULT_LANG','en'));
        $languages = [
            'en' => 'English',
            'kr' => 'Korean',
        ];
        $view->with('cr_lang', $lang);
        $view->with('app_languages', $languages);
    }
}