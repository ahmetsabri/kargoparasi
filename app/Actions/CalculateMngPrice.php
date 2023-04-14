<?php

namespace App\Actions;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class CalculateMngPrice
{
    public function execute($fromCity, $toCity, $isEnvelope)
    {
        $url = config('cargoproviders.mng.calculation_url');
        $method = config('cargoproviders.mng.calculation_method');

        // $fromDistrictId = $fromCity->district->provider_id['mng'];
        // $toDistrict = $toCity->district->provider_id['mng'];

        $price = Http::asForm()->$method($url, [
            "WhereFromCityId" => $fromCity->plate,
            "WhereCityId" => $toCity->plate,
            "EnvelopeFile" => $isEnvelope ? 1 : 0,
        ])->throw()->json();

       return Arr::get($price, 'TotalPrice');
    }
}
