<?php

namespace LitShop\CP;

use Admin;
use LitShop\Models\AdminUser;

class Dashboard extends BaseCpComponent
{
    public AdminUser $user;

    public function render()
    {
        return view('cp.dashboard')->layout('layouts.cp');
    }
}
