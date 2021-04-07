<?php


namespace LitShop\Core\Support;


class Enum {
    private string $name;
    private string $value;
    private string $displayTitle;

    public function __construct($displayTitle) {
        $this->displayTitle = $displayTitle;
    }
}
