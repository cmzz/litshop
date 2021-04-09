<?php


namespace Util\FormField;


use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class FieldImageUploader extends AbstractField
{
    public function render(): View|Factory|string|Application
    {
        return view('components.fields.image-uploader', ['field' => $this]);
    }
}