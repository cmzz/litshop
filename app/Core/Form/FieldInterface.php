<?php


namespace LitShop\Core\Form;


interface FieldInterface
{
    public function showAsterisk(?bool $showAsterisk = null): ?bool;
    public function label($label):string;
    public function name($name):string;
    public function rule(?array $rule = null):?array;
    public function shouOnUI(?bool $shouOnUI = true):?bool;
    public function value($value = null);
    public function focus(?bool $focus = false): ?bool;
    public function helper(?string $helperText = null): ?string;
    public function autocomplete(?string $autocomplete = null): ?string;
    public function icon(?string $icon = null): ?string;

    public function options(?array $options = null): ?array;
    public function optionsLoader(callable $optionLoader);
}
