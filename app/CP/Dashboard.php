<?php

namespace LitShop\CP;

use Admin;
use LitShop\Models\AdminUser;

class Dashboard extends BaseComponent
{
    public AdminUser $user;

    public function mount()
    {
        $this->user = Admin::user();
    }

    public function render()
    {
        return view('cp.dashboard')->layout('layouts.cp');
    }
}
