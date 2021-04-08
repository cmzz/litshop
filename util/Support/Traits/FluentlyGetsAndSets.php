<?php

namespace Util\Support\Traits;

use Util\Support\FluentGetterSetter;

trait FluentlyGetsAndSets
{
    /**
     * @param $property
     * @return FluentGetterSetter
     */
    public function getOrSet($property): FluentGetterSetter
    {
        return new FluentGetterSetter($this, $property);
    }
}
