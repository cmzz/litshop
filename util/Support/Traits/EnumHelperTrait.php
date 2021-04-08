<?php


namespace Util\Support\Traits;


use JetBrains\PhpStorm\NoReturn;
use Util\Support\Attributes;
use ReflectionFunction;

trait EnumHelperTrait
{

    #[NoReturn] public static function build()
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
