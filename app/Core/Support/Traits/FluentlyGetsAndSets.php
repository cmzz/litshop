<?php

namespace LitShop\Core\Support\Traits;

use LitShop\Core\Support\FluentGetterSetter;

trait FluentlyGetsAndSets
{
    /**
     * @param string $property
     * @return FluentGetterSetter
     */
    public function fluentlyGetOrSet($property)
    {
        return new FluentGetterSetter($this, $property);
    }
}
