<?php


namespace LitShop\Core\Support\Traits;


use LitShop\Core\Support\Attributes;
use ReflectionFunction;

trait EnumHelperTrait
{

    public static function build()
    {
        $reflector = new \ReflectionClass(__CLASS__);
        $attrs = $reflector->getAttributes();

        dd($attrs);
    }

    public static function getNames()
    {


    }

    public static function getValues()
    {

    }

    public static function getValueByName()
    {

    }

    public static function getNameByValue()
    {

    }

}
