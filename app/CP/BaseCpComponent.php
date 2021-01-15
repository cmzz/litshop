<?php

namespace LitShop\CP;

use Admin;
use LitShop\Models\AdminUser;
use Livewire\Component;
use Nav;

class BaseCpComponent extends Component
{
    protected $listeners = ['cpUserLogout' => 'userLogout'];
    public AdminUser $user;

    public function mount()
    {
        $this->user = Admin::user();

        # init menus
        Nav::buildFromConfig(config('menus.cp'))
            ->sort()
            ->format();

        \View::share('menus', Nav::authorizeItems());
        \View::share('leafMenu', Nav::activeLeafMenu());
        \View::share('topMenu', Nav::activeTopMenu());
    }

    public function userLogout()
    {
        $this->notify(__('您已安全登出'));

        Admin::logout();
        session()->flush();

        return redirect(route('cp.auth.login'));
    }
}
