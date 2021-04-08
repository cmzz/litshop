<?php

namespace LitCore;

use Illuminate\Auth\AuthManager;

class AdminAuthManager extends AuthManager
{
    public function getDefaultDriver(): string
    {
        return $this->app['config']['auth.defaults.admin_guard'];
    }

    public function setDefaultDriver($name)
    {
        $this->app['config']['auth.defaults.admin_guard'] = $name;
    }
}
