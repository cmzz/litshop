<?php

namespace LitShop\CP\Goods;

use LitShop\Core\Ext\ExtType;
use LitShop\CP\BaseCpComponent as Component;

class Create extends Component
{
    protected $formConf = [

    ];

    public function render()
    {
        ExtType::build();

        ExtType::getNames();
        return view('cp.goods.create')->layout('layouts.cp');
    }
}
