<?php

namespace LitShop\CP\Auth;

use App\Models\AdminUser;
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
            return $this->addError('email', '用户未注册或密码错误');
        }

        if (\Hash::check($adminUser->password, $loginData['password'])) {
            return $this->addError('email', '用户未注册或密码错误');
        }

        Admin::login($adminUser);

        $this->notify('登陆成功!');

        return route('cp.index');
    }

    public function render()
    {
        return view('cp.auth.login')->layout('layouts.cp');
    }
}
