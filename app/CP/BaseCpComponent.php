<?php

namespace LitShop\CP;

use Admin;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use LitShop\Models\AdminUser;
use Livewire\Component;
use Nav;

class BaseCpComponent extends Component
{
    /**
     * @var string[] $listeners
     */
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

    /**
     * @return Redirector|Application|RedirectResponse
     */
    public function userLogout(): Redirector|Application|RedirectResponse
    {
        $this->notify(__('您已安全登出'));

        Admin::logout();
        session()->flush();

        return redirect(route('cp.auth.login'));
    }
}
