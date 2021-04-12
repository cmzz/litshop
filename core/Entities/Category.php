<?php


namespace LitCore\Entities;


class Category extends BaseEntity
{
    protected $table = 'categories';
    protected $connection = 'mysql';

    protected $fillable = [
        CategoryColumns::ID,
        CategoryColumns::CREATED_AT,
        CategoryColumns::UPDATED_AT,
        CategoryColumns::DELETED_AT,
        CategoryColumns::PID,
        CategoryColumns::NAME,
        CategoryColumns::DESC,
        CategoryColumns::STATUS,
        CategoryColumns::PATH,
    ];
}
