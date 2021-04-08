<?php


namespace LitShop\CP\Services;


use Foundation\Events\CP\AdminUserCreated;
use LitCore\Models\AdminUser;
use Foundation\Exceptions\InvalidArgumentException;
use Throwable;
use Validator;

class AdminUserService
{
    /**
     * @param array $data
     * @return AdminUser
     * @throws Throwable
     */
    public function createUser(array $data): AdminUser
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:6',
            'name' => 'required',
            'nickname' => 'string'
        ];

        if (!data_get($data, 'nickname') && data_get($data, 'name'))
            $data['nickname'] = $data['name'];

        if (!isset($data[AdminUser::STATUS]))
            $data[AdminUser::STATUS] = AdminUser::STATUS_NORMAL;

        $data[AdminUser::PASSWORD] = \Hash::make($data[AdminUser::PASSWORD]);

        $validator = Validator::make($data, $rules);
        throw_if($validator->fails(), new InvalidArgumentException());

        $adminUser = AdminUser::create($data);
        event(new AdminUserCreated($adminUser));

        return $adminUser;
    }
}
