<?php

namespace LitShop\CP;

use Nav;
use LitShop\CP\BaseCpComponent as Component;

class SecondarySidebar extends Component
{
    public function render()
    {
        $topMenu = Nav::activeTopMenu();
        return view('cp.secondary-sidebar', compact('topMenu'));
    }
}
