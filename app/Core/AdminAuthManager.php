<?php
namespace LitShop\Core;

use Illuminate\Auth\AuthManager;

class AdminAuthManager extends AuthManager
{

    public function getDefaultDriver()
    {
        return $this->app['config']['auth.defaults.admin_guard'];
    }

    public function setDefaultDriver($name)
    {
        $this->app['config']['auth.defaults.admin_guard'] = $name;
    }
}
