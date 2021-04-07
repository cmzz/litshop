<?php

namespace LitShop\View\Components\Layouts;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class App extends Component
{

    /**
     * @return Factory|View|Application
     */
    public function render(): Factory|View|Application
    {
        return view('layouts.app');
    }
}
