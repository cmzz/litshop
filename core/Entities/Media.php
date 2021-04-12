<?php


namespace LitCore\Entities;


class Media extends BaseEntity
{
    protected $table = 'medias';
    protected $connection = 'mysql';

    protected $fillable = [
        MediaColumns::ID,
        MediaColumns::CREATED_AT,
        MediaColumns::UPDATED_AT,
        MediaColumns::DELETED_AT,
        MediaColumns::TYPE,
        MediaColumns::FILENAME,
        MediaColumns::FULL_PATH,
        MediaColumns::EXT,
        MediaColumns::SIZE,
        MediaColumns::MIME,
        MediaColumns::DURATION,
    ];
}
