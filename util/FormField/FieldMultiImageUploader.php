<?php


namespace Util\FormField;


use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class FieldMultiImageUploader extends AbstractField
{
    public function render(): View|Factory|string|Application
    {
        return view('components.fields.multi-image-uploader', ['field' => $this]);
    }
}
