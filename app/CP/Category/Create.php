<?php

namespace LitShop\CP\Category;

use LitShop\CP\BaseCpComponent as Component;

class Create extends Component
{
    public function render()
    {
        return view('cp.category.create')->layout('layouts.cp');
    }
}
