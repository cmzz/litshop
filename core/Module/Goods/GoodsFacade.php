<?php


namespace LitCore\Module\Goods;


use Illuminate\Support\Facades\Facade;

class GoodsFacade extends Facade
{

    /**
     * Returning service name
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return GoodsService::class;
    }
}
