<?php


namespace Util\FormBuilder;


use Illuminate\Support\Str;

class FormBuilder
{
    public static function build(array $conf): array
    {
        $form = [];
        foreach ($conf as $item) {
            $section = [];
            $section['section'] = $item['section'];
            $section['fields'] = [];

            if (isValidityArrayField($item, 'fields')) {
                foreach ($item['fields'] as $subItem) {
                    $field = app('Util\\FormField\\Field'.Str::ucfirst(Str::camel($subItem['type'])));
                    $field->name(data_get($subItem, 'name'));
                    $field->label(data_get($subItem, 'label'));
                    $field->showAsterisk(data_get($subItem, 'show_asterisk'));
                    $field->rule(data_get($subItem, 'rule'));
                    $field->value(data_get($subItem, 'value'));
                    $field->helper(data_get($subItem, 'helper_text'));
                    $field->focus(data_get($subItem, 'focus', false));
                    $field->placeholder(data_get($subItem, 'placeholder', sprintf('请前写 %s', data_get($subItem, 'label'))));
                    $field->options(data_get($subItem, 'options', []));

                    array_push($section['fields'], $field);
                }
            }

            array_push($form, $section);
        }

        return $form;
    }
}
