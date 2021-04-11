<?php

namespace LitCore\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        UserFields::ID,
        UserFields::CREATED_AT,
        UserFields::UPDATED_AT,
        UserFields::DELETED_AT,
        UserFields::NICK_NAME,
        UserFields::AVATAR,
        UserFields::STATUS,
        UserFields::PHONE,
        UserFields::EMAIL,
        UserFields::AGE,
        UserFields::BIRTH,
        UserFields::GENDER,
        UserFields::COUNTRY,
        UserFields::PROVINCE,
        UserFields::CITY,
        UserFields::PASSWORD,
        UserFields::EMAIL_VERIFIED_AT,
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

}
