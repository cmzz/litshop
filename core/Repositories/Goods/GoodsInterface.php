<?php


namespace LitCore\Repositories\Goods;


use Illuminate\Database\Eloquent\Model;

interface GoodsInterface
{
    public function getGoodsById($id): Model;
}
