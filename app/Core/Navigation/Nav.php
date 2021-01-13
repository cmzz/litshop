<?php


namespace LitShop\Core\Navigation;


class Nav
{
    protected array $items = [];

    public function items()
    {
        return $this->items;
    }

    public function setGroup($group = null)
    {
        return $this;
    }

    public function build()
    {

        return $this;
    }

    public function authorizeItems()
    {

    }
}
