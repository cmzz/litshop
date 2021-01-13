<?php

namespace LitShop\CP;

use Admin;
use Livewire\Component;

class BaseCpComponent extends Component
{
    protected $listeners = ['cpUserLogout' => 'userLogout'];

    public function mount()
    {
        $this->user = Admin::user();
    }

    public function userLogout()
    {
        $this->notify(__('您已安全登出'));

        Admin::logout();
        session()->flush();

        return redirect(route('cp.auth.login'));
    }
}
