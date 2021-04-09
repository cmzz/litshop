<?php

namespace Foundation\Providers;

use Illuminate\Support\ServiceProvider;
use Util\Navigation\Nav;
use LitCore\Entities\AdminUser;
use LitCore\Entities\User;

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
