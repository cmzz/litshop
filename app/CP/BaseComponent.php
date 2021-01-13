<?php


namespace LitShop\CP;


use Livewire\Component;

class BaseComponent extends Component
{
    protected $listeners = ['cpUserLogout' => 'userLogout'];

    public function userLogout()
    {
        $this->notify(__('您已安全登出'));

        \Admin::logout();
        session()->flush();

        return redirect(route('cp.auth.login'));
    }
}
