<?php


namespace Foundation\Facades;


use Illuminate\Support\Facades\Facade;

class AdminAuthManagerFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'admin';
    }
}
