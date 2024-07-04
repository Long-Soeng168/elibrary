<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\WebsiteInfo;
use App\Models\Database;
use App\Models\Footer;
use App\Models\Link;

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
        $websiteInfo = WebsiteInfo::first() ?? new WebsiteInfo;
        View::share('websiteInfo', $websiteInfo);

        $menu_databases = Database::where('status', 1)->orderBy('order_index', 'ASC')->get() ?? new Database;
        View::share('menu_databases', $menu_databases);

        $footer = Footer::first() ?? new Footer;
        View::share('footer', $footer);

        $links = Link::latest()->get() ?? new Link;
        View::share('links', $links);
    }
}
