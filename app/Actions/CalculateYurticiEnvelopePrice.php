<?php

namespace App\Actions;

use App\Models\City;
use Illuminate\Support\Arr;
use App\Models\CargoProvider;
use Illuminate\Support\Facades\Http;
use App\Helpers\CalculationPayloadMapper;

class CalculateYurticiEnvelopePrice
{
    public function execute(City $fromCity, City $toCity)
    {
        $settings = CargoProvider::where('name', 'YURTICI')->first()->load('settings')->settings->settings;

        $url = $settings['urls']['calculation'];

        $method = $settings['methods']['calculation'];

        $payload = (new CalculationPayloadMapper)->map($settings, $fromCity, $toCity, true);

        $payload = array_merge($payload, $settings['defined_payload']);

        $extraPayload = [
            "SourceCountyId" => $fromCity->district->provider_id['yurtici'],
            "DestinationCountyId" => $toCity->district->provider_id['yurtici'],
            "TotalCount" => 1
        ];

        $payload = array_merge($payload, $extraPayload);
        $response = Http::$method($url, $payload)->json()[0];

        $price =  Arr::get($response, 'TotalCampaignPrice');
        $taxRate =  Arr::get($response, 'TaxRate');

        return str_replace('.', ',', number_format($price + ($price * $taxRate), 2)) . ' TL';
    }
}
