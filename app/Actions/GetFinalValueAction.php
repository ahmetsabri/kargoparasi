<?php

namespace App\Actions;

use Illuminate\Support\Arr;

class GetFinalValueAction
{
    public function execute($value)
    {
        $price = explode(',', $value);

        return floatval(Arr::get($price, 0,0)) + floatval(Arr::get($price, 1,0)) != 0 ? $value : null;
    }
}
