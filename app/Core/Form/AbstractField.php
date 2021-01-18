<?php


namespace LitShop\Core\Form;


use LitShop\Core\Support\Traits\FluentlyGetsAndSets;

class AbstractField implements FieldInterface
{

    protected string $name;
    protected array $rule;
    protected bool $shouOnUI;
    protected bool $focus;
    protected string|array $value;
    protected string $helper;
    protected string $autocomplete;
    protected string $icon;

    use FluentlyGetsAndSets;

    public function name($name): string
    {
        return $this->getOrSet('name')->value($name);
    }

    public function rule(?array $rule = null): ?array
    {
        return $this->getOrSet('rule')->value($rule);
    }

    public function shouOnUI(?bool $shouOnUI = true): ?bool
    {
        return $this->getOrSet('shouOnUI')->value($shouOnUI);
    }

    public function value($value = null)
    {
        return $this->getOrSet('value')->value($value);
    }

    public function focus(?bool $focus = false): ?bool
    {
        return $this->getOrSet('focus')->value($focus);
    }

    public function helper(?string $helperText = null): ?string
    {
        return $this->getOrSet('helper')->value($helperText);
    }

    public function autocomplete(?string $autocomplete = null): ?string
    {
        return $this->getOrSet('autocomplete')->value($autocomplete);
    }

    public function icon(?string $icon = null): ?string
    {
        return $this->getOrSet('icon')->value($icon);
    }
}
