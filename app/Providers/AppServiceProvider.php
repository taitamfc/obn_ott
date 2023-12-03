<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\Paginator;
use App\View\Composers\AdminProfileComposer;
use App\View\Composers\AdminSiteComposer;
use App\View\Composers\AdminSitesComposer;
use App\View\Composers\SiteComposer;
use App\View\Composers\LanguageComposer;
use App\View\Composers\MenuComposer;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();

        // Passdata to all views in admin
        View::composer('admin.*', AdminProfileComposer::class);
        View::composer('admin.*', AdminSiteComposer::class);
        View::composer('admin.*', AdminSitesComposer::class);
        View::composer('*', LanguageComposer::class);
        View::composer('website.*', SiteComposer::class);
        View::composer('website.*', MenuComposer::class);
    }
}
