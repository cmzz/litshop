<?php

namespace LitShop\Core\Support;

use Closure;
use ReflectionException;
use ReflectionObject;
use ReflectionProperty;

class FluentGetterSetter
{
    protected mixed $object;
    protected string $property;
    protected Closure $getter;
    protected Closure $setter;
    protected Closure $afterSetter;

    /**
     * @param mixed $object
     * @param string $property
     */
    public function __construct(mixed $object, string $property)
    {
        $this->object = $object;
        $this->property = $property;
    }

    /**
     * @param Closure $callback
     * @return $this
     */
    public function getter(Closure $callback): self
    {
        $this->getter = $callback;

        return $this;
    }

    /**
     * @param Closure $callback
     * @return $this
     */
    public function setter(Closure $callback): self
    {
        $this->setter = $callback;

        return $this;
    }

    /**
     * @param Closure $callback
     * @return $this
     */
    public function afterSetter(Closure $callback): self
    {
        $this->afterSetter = $callback;

        return $this;
    }

    /**
     * @param mixed $value
     * @return mixed
     */
    public function value(mixed $value)
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
    public function args(mixed $args)
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
    protected function runGetterLogic(): mixed
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
    protected function runSetterLogic(mixed $value)
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
    protected function reflectedProperty(): ReflectionProperty
    {
        $property = (new ReflectionObject($this->object))->getProperty($this->property);
        $property->setAccessible(true);

        return $property;
    }
}
