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
                    $field->showAsterisk(data_get($subItem, 'showAsterisk'));
                    $field->rule(data_get($subItem, 'rule'));

                    array_push($section['fields'], $field);
                }
            }

            array_push($form, $section);
        }

        return $form;
    }
}
