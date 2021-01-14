<?php

namespace LitShop\Providers;

use Illuminate\Support\ServiceProvider;
use LitShop\Core\Navigation\Nav;
use LitShop\Models\AdminUser;
use LitShop\Models\User;

class NavServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('nav',function(){
            return new Nav();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
