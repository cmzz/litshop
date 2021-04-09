<?php


namespace LitCore\Module\Goods;


use LitCore\Repositories\Goods\GoodsInterface;

class GoodsService
{
    protected GoodsInterface $goodsDI;

    public function __construct(GoodsInterface $goodsDI)
    {
        $this->goodsDI = $goodsDI;
    }

    public function getGoodsById($id): \Illuminate\Database\Eloquent\Model
    {
        return $this->goodsDI->getGoodsById($id);
    }
}
