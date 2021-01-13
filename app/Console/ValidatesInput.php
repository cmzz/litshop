<?php

namespace LitShop\Console;

use Illuminate\Support\Facades\Validator;

trait ValidatesInput
{

    private function validationFails($input, $rules)
    {
        $validator = Validator::make(['input' => $input], ['input' => $rules]);

        if ($validator->passes()) {
            return false;
        }

        $this->error($validator->errors()->first());

        return true;
    }
}
