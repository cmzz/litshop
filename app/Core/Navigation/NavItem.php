<?php

namespace LitShop\Core\Navigation;

use LitShop\Core\Support\Traits\FluentlyGetsAndSets;

class NavItem
{
    use FluentlyGetsAndSets;

    protected $name;
    protected $section;
    protected $url;
    protected $svgIcon;
    protected $iconfont;
    protected $children;
    protected $authorization;
    protected $active;
    protected $view;


    public function name($name = null)
    {

    }

    public function section($section = null)
    {

    }

    public function route($name, $params = [])
    {

    }

    public function url($url = null)
    {

    }

    public function icon($icon = null)
    {

    }

    public function iconfont($iconfont = null)
    {

    }

    public function children($items = null)
    {

    }

    public function can($ability = null, $arguments = [])
    {

    }

    public function active($pattern = null)
    {

    }

    public function isActive()
    {

    }

}
