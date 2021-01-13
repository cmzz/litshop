<?php

namespace LitShop\Console\Commands;

use Illuminate\Console\Command;
use LitShop\Console\ValidatesInput;
use LitShop\CP\Services\AdminUserService;
use LitShop\Rules\CpUserEmailAvailable;
use Symfony\Component\Console\Input\InputArgument;

class MakeCpUser extends Command
{
    use ValidatesInput;

    protected $name = 'cp:make:user';
    protected $description = '创建一个后台用户.';
    protected $email;
    protected $data = [];
    protected AdminUserService $adminUserService;

    public function __construct(AdminUserService $adminUserService)
    {
        parent::__construct();
        $this->adminUserService = $adminUserService;
    }

    public function handle()
    {
        $this->info(__('您正在创建一个可用于登陆管理后台的用户.'));

        if ($this->email = $this->argument('email')) {
            return $this->createUser();
        }

        $this
            ->promptEmail()
            ->promptName()
            ->promptPassword()
            ->createUser();
    }

    protected function promptEmail()
    {
        $this->email = $this->ask('Email');

        if ($this->emailValidationFails()) {
            return $this->promptEmail();
        }

        return $this;
    }

    protected function promptName()
    {
        $this->data['name'] = $this->ask('姓名', false);

        return $this;
    }

    protected function promptPassword()
    {
        $this->data['password'] = $this->secret(__('密码').' '. __('（你的输入不会显示）'));
        return $this;
    }

    protected function createUser()
    {
        if ($this->emailValidationFails()) {
            return;
        }

        try {
            $this->adminUserService->createUser(array_merge(['email' => $this->email], $this->data));
        } catch (\Throwable $e) {
            $this->error(__('创建用户失败'));
            $this->error($e->getMessage());
            return;
        }

        $this->info(__('后台用户创建成功'));
    }

    protected function emailValidationFails()
    {
        return $this->validationFails($this->email, ['required', new CpUserEmailAvailable(), 'email']);
    }

    protected function getArguments()
    {
        return [
            ['email', InputArgument::OPTIONAL, 'Non-interactively create a user with only an email address'],
        ];
    }
}
