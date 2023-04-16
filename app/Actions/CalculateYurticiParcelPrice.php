<?php

namespace App\Actions;

use App\Helpers\CalculationPayloadMapper;
use App\Models\CargoProvider;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class CalculateYurticiParcelPrice
{
    public function execute($fromCity, $toCity, $width, $height, $length, $weight)
    {
        $settings = CargoProvider::where('name', 'YURTICI')->first()->load('settings')->settings->settings;

        $url = $settings['urls']['calculation'];

        $method = $settings['methods']['calculation'];

        $payload = (new CalculationPayloadMapper())->map($settings, $fromCity, $toCity, false, $width, $height, $length, $weight);

        $payload = array_merge($payload, $settings['defined_payload']);

        $extraPayload = [
            "SourceCountyId" => $fromCity->district->provider_id['yurtici'],
            "DestinationCountyId" => $toCity->district->provider_id['yurtici'],
            "TotalCount" => 1,
            "TotalKgds" => $weight,
            "CampaignPackageRequest" => [array_merge(['Kg'=>$weight],$payload['dimensions'])],

        ];
        $payload = array_merge($payload, $extraPayload);
        Arr::forget($payload, 'dimensions');

        $response = Http::$method($url, $payload)->json();


        $price =  Arr::get($response[0], 'TotalCampaignPrice');
        $taxRate =  Arr::get($response[0], 'TaxRate');

        return str_replace('.', ',', number_format($price + ($price * $taxRate), 2)) . ' TL';
    }
}
