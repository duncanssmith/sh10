<?php 

namespace Acme\View\Composer;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class NavServiceProvider extends ServiceProvider
{

    public function register()
    {
        \View::composer('partials._ds_nav', 'Acme\View\Composer\NavigationComposer');
    }

    public function boot() {}

}

