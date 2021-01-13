<?php


namespace LitShop\CP\Services;


use App\Events\CP\AdminUserCreated;
use App\Models\AdminUser;
use App\Exceptions\InvalidArgumentException;
use Throwable;
use Validator;

class AdminUserService
{
    public function __construct()
    {
    }

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
            'name' => 'required'
        ];

        $validator = Validator::make($data, $rules);
        throw_if($validator->fails(), new InvalidArgumentException());

        $adminUser = AdminUser::create($data);
        event(new AdminUserCreated($adminUser));

        return $adminUser;
    }
}
