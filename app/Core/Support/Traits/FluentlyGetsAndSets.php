<?php

namespace LitShop\Core\Support\Traits;

use LitShop\Core\Support\FluentGetterSetter;

trait FluentlyGetsAndSets
{
    /**
     * @param string $property
     * @return FluentGetterSetter
     */
    public function getOrSet($property): FluentGetterSetter
    {
        return new FluentGetterSetter($this, $property);
    }
}
