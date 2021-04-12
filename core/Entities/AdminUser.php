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
        AdminUserColumns::ID,
        AdminUserColumns::NAME,
        AdminUserColumns::NICKNAME,
        AdminUserColumns::STATUS,
        AdminUserColumns::EMAIL,
        AdminUserColumns::PHONE,
        AdminUserColumns::EMAIL_VERIFIED_AT,
        AdminUserColumns::PHONE_VERIFIED_AT,
        AdminUserColumns::PASSWORD,
        AdminUserColumns::REMEMBER_TOKEN,
        AdminUserColumns::AVATAR,
        AdminUserColumns::CREATED_AT,
        AdminUserColumns::UPDATED_AT,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        AdminUserColumns::PASSWORD,
        AdminUserColumns::REMEMBER_TOKEN,
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        AdminUserColumns::EMAIL_VERIFIED_AT => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        AdminUserColumns::AVATAR,
    ];

    public function getAvatarAttribute($key): string
    {
        return '';
    }
}
