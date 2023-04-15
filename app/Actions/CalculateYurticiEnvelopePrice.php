<?php

namespace App\Actions;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class CalculateYurticiEnvelopePrice
{
    public function execute($fromCity, $toCity, $isEnvelope)
    {
        $url = config('cargoproviders.yurtici.calculation_url');
        $method = config('cargoproviders.yurtici.calculation_method');

        $response = Http::$method($url, [
            "SourceCityId" => $fromCity->plate,
            "SourceCountyId" => $fromCity->district->provider_id['yurtici'],
            "DestinationCityId" => $toCity->plate,
            "DestinationCountyId" => $toCity->district->provider_id['yurtici'],
            "ShipmentType" => 0,
            "TotalCount" => 1
        ])->json()[0];


        $price =  Arr::get($response, 'TotalCampaignPrice');
        $taxRate =  Arr::get($response, 'TaxRate');

        return str_replace('.', ',', number_format($price + ($price * $taxRate), 2)) . ' TL';
    }
}
