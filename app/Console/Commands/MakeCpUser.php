<?php

namespace LitShop\Console\Commands;

use Illuminate\Console\Command;
use LitShop\Console\ValidatesInput;
use LitShop\Rules\EmailAvailable;
use Symfony\Component\Console\Input\InputArgument;

class MakeCpUser extends Command
{
    use ValidatesInput;

    protected $name = 'cp:make:user';

    protected $description = 'Create a new cp user';

    protected $email;

    protected $data = [];

    public function handle()
    {
        if ($this->email = $this->argument('email')) {
            return $this->createUser();
        }

        // Otherwise, interactively prompt for data and create user..
        $this
            ->promptEmail()
            ->promptName()
            ->promptPassword()
            ->promptSuper()
            ->createUser();
    }

    /**
     * Prompt for an email address.
     *
     * @return $this
     */
    protected function promptEmail()
    {
        $this->email = $this->ask('Email');

        if ($this->emailValidationFails()) {
            return $this->promptEmail();
        }

        return $this;
    }

    /**
     * Prompt for a name.
     *
     * @return $this
     */
    protected function promptName()
    {
        if ($this->hasSeparateNameFields()) {
            return $this->promptSeparateNameFields();
        }

        $this->data['name'] = $this->ask('Name', false);

        return $this;
    }

    /**
     * Prompt for first name and last name separately.
     *
     * @return $this
     */
    protected function promptSeparateNameFields()
    {
        $this->data['first_name'] = $this->ask('First Name', false);
        $this->data['last_name'] = $this->ask('Last Name', false);

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

        User::make()
            ->email($this->email)
            ->data($this->data)
            ->save();

        $this->info('User created successfully.');
    }

    protected function emailValidationFails()
    {
        return $this->validationFails($this->email, ['required', new EmailAvailable, 'email']);
    }

    protected function hasSeparateNameFields()
    {
        $fields = User::blueprint()->fields()->all();

        return $fields->has('first_name') && $fields->has('last_name');
    }

    protected function getArguments()
    {
        return [
            ['email', InputArgument::OPTIONAL, 'Non-interactively create a user with only an email address'],
        ];
    }
}
