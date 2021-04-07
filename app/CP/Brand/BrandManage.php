<?php

namespace LitShop\CP\Brand;

use Nav;
use LitShop\CP\BaseCpComponent as Component;

class BrandManage extends Component
{
    public bool $isVisible = false;

    public function render()
    {
        return view('cp.brand.brand')->layout('layouts.cp');
    }
}
