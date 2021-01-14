<?php

namespace LitShop\CP;

use Admin;
use LitShop\Core\Navigation\NavItem;
use LitShop\Models\AdminUser;
use Livewire\Component;
use Nav;

class BaseCpComponent extends Component
{
    protected $listeners = ['cpUserLogout' => 'userLogout'];

    public array $menus;
    public AdminUser $user;
    protected NavItem $currentLeafMenu;

    public function mount()
    {
        $this->user = Admin::user();
        $this->menus = Nav::buildFromConfig(config('menus.cp'))->sort()->items();
        $this->currentLeafMenu = Nav::current();

        \View::share('menus', $this->menus);
        \View::share('currentLeafMenu', $this->currentLeafMenu);
    }

    public function userLogout()
    {
        $this->notify(__('您已安全登出'));

        Admin::logout();
        session()->flush();

        return redirect(route('cp.auth.login'));
    }
}
