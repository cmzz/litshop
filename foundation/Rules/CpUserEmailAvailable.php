<?php

namespace Foundation\Rules;

use LitCore\Models\AdminUser;
use Illuminate\Contracts\Validation\Rule;


class CpUserEmailAvailable implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return AdminUser::query()->where('email', trim($value))->count() === 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('该邮箱已被占用.');
    }
}
