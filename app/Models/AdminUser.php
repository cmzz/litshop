<?php

namespace LitShop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AdminUser extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $connection = 'cp';

    public const STATUS_NORMAL = 1;

    public const ID = 'id';
    public const NAME = 'name';
    public const NICKNAME = 'nickname';
    public const STATUS = 'status';
    public const EMAIL = 'email';
    public const PHONE = 'phone';
    public const EMAIL_VERIFIED_AT = 'email_verified_at';
    public const PHONE_VERIFIED_AT = 'phone_verified_at';
    public const PASSWORD = 'password';
    public const REMEMBER_TOKEN = 'remember_token';
    public const AVATAR = 'avatar';
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::ID,
        self::NAME,
        self::NICKNAME,
        self::STATUS,
        self::EMAIL,
        self::PHONE,
        self::EMAIL_VERIFIED_AT,
        self::PHONE_VERIFIED_AT,
        self::PASSWORD,
        self::REMEMBER_TOKEN,
        self::AVATAR,
        self::CREATED_AT,
        self::UPDATED_AT,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'avatar',
    ];

    public function getAvatarAttribute($key): string
    {
        return '';
    }
}
