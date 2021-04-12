<?php

namespace LitCore\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

class Customer extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = 'customers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        CustomerColumns::ID,
        CustomerColumns::CREATED_AT,
        CustomerColumns::UPDATED_AT,
        CustomerColumns::DELETED_AT,
        CustomerColumns::NAME,
        CustomerColumns::AVATAR,
        CustomerColumns::STATUS,
        CustomerColumns::PHONE,
        CustomerColumns::EMAIL,
        CustomerColumns::AGE,
        CustomerColumns::BIRTH,
        CustomerColumns::GENDER,
        CustomerColumns::COUNTRY,
        CustomerColumns::PROVINCE,
        CustomerColumns::CITY,
        CustomerColumns::PASSWORD,
        CustomerColumns::EMAIL_VERIFIED_AT,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        CustomerColumns::PASSWORD,
        CustomerColumns::REMEMBER_TOKEN,
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        CustomerColumns::EMAIL_VERIFIED_AT => 'datetime',
    ];
}
