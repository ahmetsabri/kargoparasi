<?php

namespace App\Actions;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class CalculateMngEnvelopePrice
{
    public function execute($fromCity, $toCity, $isEnvelope)
    {
        $url = config('cargoproviders.mng.calculation_url');
        $method = config('cargoproviders.mng.calculation_method');

        $price = Http::asForm()->$method($url, [
            "WhereFromCityId" => $fromCity->plate,
            "WhereCityId" => $toCity->plate,
            "EnvelopeFile" => 1,
        ])->throw()->json();

       return Arr::get($price, 'TotalPrice');
    }
}
