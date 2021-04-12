<?php


namespace LitCore\Entities;


use Illuminate\Database\Eloquent\Model;

class BaseEntity extends Model
{
    public const STATUS_DISABLED = 0;
    public const STATUS_NORMAL = 1;
}
