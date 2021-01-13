<?php

namespace LitShop\CP\Auth;

use LitShop\Models\AdminUser;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Admin;
use Livewire\Component;

class Login extends Component
{
    public string $email = '';
    public string $password = '';

    public function login()
    {
        $loginData = $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        try {
            $adminUser = AdminUser::whereEmail($loginData['email'])->firstOrFail();
        } catch (ModelNotFoundException $exception) {
            return $this->addError('email', __('用户不存在或密码错误'));
        }

        if (\Hash::check($adminUser->password, $loginData['password'])) {
            return $this->addError('email', __('用户不存在或密码错误'));
        }

        Admin::login($adminUser);

        $this->notify(__('登陆成功!'));

        return redirect(route('cp.index'));
    }

    public function render()
    {
        return view('cp.auth.login')->layout('layouts.cpauth');
    }
}
