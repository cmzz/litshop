<?php


namespace Util\FormField;


use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

interface FieldInterface
{
    public function showAsterisk(?bool $showAsterisk = null): mixed;
    public function label($label):mixed;
    public function name($name):mixed;
    public function rule(?array $rule = null):mixed;
    public function showOnUI(?bool $showOnUI = true):mixed;
    public function value($value = null):mixed;
    public function focus(?bool $focus = false): mixed;
    public function helper(?string $helperText = null): mixed;
    public function placeholder(?string $placeholder = null): mixed;
    public function autocomplete(?string $autocomplete = null): mixed;
    public function icon(?string $icon = null): mixed;
    public function options(?array $options = null): mixed;

    public function optionsLoader(callable $optionLoader);
    public function render(): View|Factory|string|Application;
}