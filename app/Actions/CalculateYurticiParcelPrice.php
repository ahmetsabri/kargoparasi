<?php

namespace App\Actions;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class CalculateYurticiParcelPrice
{
    public function execute($fromCity, $toCity, $width, $height, $length, $weight)
    {
        $url = config('cargoproviders.yurtici.calculation_url');
        $method = config('cargoproviders.yurtici.calculation_method');

        $response = Http::$method($url, [
            "SourceCityId" => $fromCity->plate,
            "SourceCountyId" => $fromCity->district->provider_id['yurtici'],
            "DestinationCityId" => $toCity->plate,
            "DestinationCountyId" => $toCity->district->provider_id['yurtici'],
            "ShipmentType" => 2,
            "TotalKgds" => $weight,

            "TotalCount" => 1,
            "CampaignPackageRequest" => [
                [
                    "Width" => $width,
                    "Height" => $height,
                    "Length" => $length,
                    "Weight" => $weight,
                    "Kg" => $weight,
                ]
            ]
        ])->json();

        $price =  Arr::get($response[0], 'TotalCampaignPrice');
        $taxRate =  Arr::get($response[0], 'TaxRate');

        return str_replace('.', ',', number_format($price + ($price * $taxRate), 2)) . ' TL';
    }
}
