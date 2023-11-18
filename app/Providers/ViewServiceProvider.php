<?php
 
namespace App\Providers;
 
use App\View\Composers\NavigationComposer;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
 
class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // ...
    }
 
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Using class based composers...
        // dd(app()->make('Hello'));
        Facades\View::composer('partials._ds_nav', NavigationComposer::class);

        // Blade::component('category-dropdown', Dropdown::class);

        // Using closure based composers...
        // Facades\View::composer('partials._ds_nav', function (View $view) {
            // ...
        // });
    }
}