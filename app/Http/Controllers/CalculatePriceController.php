<?php

namespace App\Http\Controllers;

use App\Actions\CalculateYurticiPrice;
use Illuminate\Http\Request;

class CalculatePriceController extends Controller
{
    public function __invoke()
    {
        $yurticiPrice = (new CalculateYurticiPrice())->execute(34, 35, true);
    }
}
