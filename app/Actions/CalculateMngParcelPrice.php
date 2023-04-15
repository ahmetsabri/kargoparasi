<?php

namespace App\Actions;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class CalculateMngParcelPrice
{
    public function execute($fromCity, $toCity, $width, $height, $length, $weight)
    {
        $url = config('cargoproviders.mng.calculation_url');
        $method = config('cargoproviders.mng.calculation_method');

        $price = Http::asForm()->$method($url, [
            "WhereFromCityId" => $fromCity->plate,
            "WhereCityId" => $toCity->plate,
            "PackageParcel" => 3,
            "LengthRange"=> $length,
            "WidthRange"=> $width,
            "HeightRange"=> $height,
            "WeightRange"=> $weight,

        ])->throw()->json();

       return Arr::get($price, 'TotalPrice');
    }
}
