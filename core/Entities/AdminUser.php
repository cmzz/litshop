<?php

namespace LitCore\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AdminUser extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $connection = 'cp';

    public const STATUS_NORMAL = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        AdminUserFields::ID,
        AdminUserFields::NAME,
        AdminUserFields::NICKNAME,
        AdminUserFields::STATUS,
        AdminUserFields::EMAIL,
        AdminUserFields::PHONE,
        AdminUserFields::EMAIL_VERIFIED_AT,
        AdminUserFields::PHONE_VERIFIED_AT,
        AdminUserFields::PASSWORD,
        AdminUserFields::REMEMBER_TOKEN,
        AdminUserFields::AVATAR,
        AdminUserFields::CREATED_AT,
        AdminUserFields::UPDATED_AT,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        AdminUserFields::PASSWORD,
        AdminUserFields::REMEMBER_TOKEN,
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        AdminUserFields::EMAIL_VERIFIED_AT => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        AdminUserFields::AVATAR,
    ];

    public function getAvatarAttribute($key): string
    {
        return '';
    }
}
