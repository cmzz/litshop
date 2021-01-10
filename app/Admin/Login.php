<?php

namespace App\Admin;

use App\Models\AdminUser;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\MessageBag;
use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';

    public function submit()
    {
        $loginData = $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        try {
            $adminUser = AdminUser::whereEmail($loginData['email'])->first();
        } catch (ModelNotFoundException $exception) {
            $this->emitSelf('');
            return;
        }



        Log::info('$loginData', $loginData);
    }

    public function render()
    {
        return view('admin.login');
    }
}
