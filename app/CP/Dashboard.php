<?php

namespace LitShop\CP;

use LitCore\Models\AdminUser;
use Nav;

class Dashboard extends BaseCpComponent
{
    public AdminUser $user;

    public function render()
    {
        return view('cp.dashboard')->layout('layouts.cp');
    }
}
