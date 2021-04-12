<?php

namespace LitCore\Entities;

class Brand extends BaseEntity
{
    protected $connection = 'mysql';
    protected $table = 'brands';

    /**
     * @var array
     */
    protected $fillable = [
        BrandColumns::ID,
        BrandColumns::CREATED_AT,
        BrandColumns::UPDATED_AT,
        BrandColumns::DELETED_AT,
        BrandColumns::NAME,
        BrandColumns::DESC,
        BrandColumns::LOGO_MEDIA_ID,
        BrandColumns::STATUS,
    ];

}
