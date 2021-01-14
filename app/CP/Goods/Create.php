<?php

namespace LitShop\CP\Goods;

use LitShop\CP\BaseCpComponent as Component;

class Create extends Component
{
    public function render()
    {
        return view('cp.goods.create')->layout('layouts.cp');
    }
}
