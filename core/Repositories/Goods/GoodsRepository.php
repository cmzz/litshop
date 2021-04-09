<?php

namespace LitCore\Repositories\Goods;


use Illuminate\Database\Eloquent\Model;

class GoodsRepository  implements GoodsInterface
{
    protected Model $goodsModelDI;

    public function __construct(Model $goodsModelDI)
    {
        $this->goodsModelDI = $goodsModelDI;
    }

    public function getGoodsById($id): Model
    {
        return $this->goodsModelDI->findOrFail($id);
    }
}
