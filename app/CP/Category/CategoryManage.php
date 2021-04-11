<?php

namespace LitShop\CP\Category;

use LitShop\CP\BaseCpComponent as Component;

class CategoryManage extends Component
{
    public function mount()
    {
        parent::mount();
    }

    public function render()
    {
        return view('cp.category.category-manage')->layout('layouts.cp');
    }
}
