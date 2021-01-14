<?php


namespace LitShop\Facades;


use Illuminate\Support\Facades\Facade;

class NavFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'nav';
    }
}
