<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $this->app->bind('PagesSelector', function ($app) {
            // return new PagesSelector;
        // });
        // app()->bind('Hello', function(){
            // $categories = Category::where('display', '=', 1)->orderBy('order', 'asc')->get();
            // $pages = [];
            // foreach($categories as $key => $value) {
                // $pages[$key] = $value['name'];
            // }

            // return $pages; 
        // });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        view()->share('pages', Category::where('display', '=', 1)->orderBy('order', 'asc')->get());
    }
}
