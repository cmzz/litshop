<?php

namespace LitShop\CP\Goods;

use LitShop\CP\BaseCpComponent as Component;

class GoodsManage extends Component
{
    public function render()
    {
        return view('cp.goods.goods-manage')->layout('layouts.cp');
    }
}
