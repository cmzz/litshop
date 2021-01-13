<?php

namespace LitShop\Core\Support;

use Closure;
use ReflectionException;
use ReflectionObject;
use ReflectionProperty;

class FluentGetterSetter
{
    protected $object;
    protected $property;
    protected $getter;
    protected $setter;
    protected $afterSetter;

    /**
     * @param mixed $object
     * @param string $property
     */
    public function __construct($object, $property)
    {
        $this->object = $object;
        $this->property = $property;
    }

    /**
     * @param Closure $callback
     * @return $this
     */
    public function getter(Closure $callback)
    {
        $this->getter = $callback;

        return $this;
    }

    /**
     * @param Closure $callback
     * @return $this
     */
    public function setter($callback)
    {
        $this->setter = $callback;

        return $this;
    }

    /**
     * @param Closure $callback
     * @return $this
     */
    public function afterSetter($callback)
    {
        $this->afterSetter = $callback;

        return $this;
    }

    /**
     * @param mixed $value
     * @return mixed
     */
    public function value($value)
    {
        if (is_null($value)) {
            return $this->runGetterLogic();
        }

        $this->runSetterLogic($value);

        return $this->object;
    }

    /**
     * @param mixed $args
     * @return mixed
     */
    public function args($args)
    {
        if (count($args) === 0) {
            return $this->runGetterLogic();
        }

        $this->runSetterLogic($args[0]);

        return $this->object;
    }

    /**
     * @return mixed
     */
    protected function runGetterLogic()
    {
        try {
            $value = $this->reflectedProperty()->getValue($this->object);
        } catch (ReflectionException $exception) {
            $value = $this->object->{$this->property} ?? null;
        }

        if ($getter = $this->getter) {
            $value = $getter($value);
        }

        return $value;
    }

    /**
     * @param mixed $value
     */
    protected function runSetterLogic($value)
    {
        if ($setter = $this->setter) {
            $value = $setter($value);
        }

        try {
            $this->reflectedProperty()->setValue($this->object, $value);
        } catch (ReflectionException $exception) {
            $this->object->{$this->property} = $value;
        }

        if ($afterSetter = $this->afterSetter) {
            $afterSetter($value);
        }
    }

    /**
     * @return ReflectionProperty
     * @throws ReflectionException
     */
    protected function reflectedProperty()
    {
        $property = (new ReflectionObject($this->object))->getProperty($this->property);
        $property->setAccessible(true);

        return $property;
    }
}
