<?php

namespace LitShop\CP\Brand;

use Nav;
use LitShop\CP\BaseCpComponent as Component;

class Create extends Component
{
    public function render()
    {
        return view('cp.brand.create')->layout('layouts.cp');
    }
}
