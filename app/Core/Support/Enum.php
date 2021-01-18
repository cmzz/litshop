<?php


namespace LitShop\Core\Support;

#[Attribute]
class Enum {
    private $name;
    private $value;
    private $displayTitle;

    public function __construct($displayTitle) {
        $this->displayTitle = $displayTitle;
    }
}
