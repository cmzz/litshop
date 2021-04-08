<?php
namespace Util\FormField;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Util\Support\Traits\FluentlyGetsAndSets;

abstract class AbstractField implements FieldInterface
{
    protected ?bool $showAsterisk = null;
    protected string $label = '';
    protected string $name = '';
    protected array $rule = [];
    protected bool $shouOnUI = false;
    protected bool $focus = false;
    protected string|array $value = '';
    protected string $helper = '';
    protected string $autocomplete = '';
    protected string $icon = '';

    protected $optionLoader;

    use FluentlyGetsAndSets;

    public function name($name = null): mixed
    {
        return $this->getOrSet('name')->value($name);
    }

    public function rule(?array $rule = null): mixed
    {
        return $this->getOrSet('rule')->value($rule);
    }

    public function shouOnUI(?bool $shouOnUI = true): mixed
    {
        return $this->getOrSet('shouOnUI')->value($shouOnUI);
    }

    public function value($value = null): mixed
    {
        return $this->getOrSet('value')->value($value);
    }

    public function focus(?bool $focus = false): mixed
    {
        return $this->getOrSet('focus')->value($focus);
    }

    public function helper(?string $helperText = null): mixed
    {
        return $this->getOrSet('helper')->value($helperText);
    }

    public function autocomplete(?string $autocomplete = null): mixed
    {
        return $this->getOrSet('autocomplete')->value($autocomplete);
    }

    public function icon(?string $icon = null): mixed
    {
        return $this->getOrSet('icon')->value($icon);
    }

    public function options(?array $options = null): mixed
    {
        return $this->getOrSet('options')->value($options);
    }

    public function optionsLoader(callable $optionLoader): mixed
    {
        return $this->options($optionLoader());
    }

    public function label($label): mixed
    {
        return $this->getOrSet('label')->value($label);
    }

    public function showAsterisk(?bool $showAsterisk = null): mixed
    {
        return $this->getOrSet('showAsterisk')->value($showAsterisk);
    }

    /**
     * @return View|Factory|string|Application
     */
    abstract public function render(): View|Factory|string|Application;
}
