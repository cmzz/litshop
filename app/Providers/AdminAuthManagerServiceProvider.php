<?php

namespace LitShop\Providers;

use LitShop\Core\AdminAuthManager;
use Illuminate\Support\ServiceProvider;

class AdminAuthManagerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind('admin',function(){
            return new AdminAuthManager(app());
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
