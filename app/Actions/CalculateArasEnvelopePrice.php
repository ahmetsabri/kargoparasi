<?php

namespace App\Actions;

use App\Models\City;
use Illuminate\Support\Arr;
use App\Models\CargoProvider;
use Illuminate\Support\Facades\Http;
use App\Helpers\CalculationPayloadMapper;

class CalculateArasEnvelopePrice
{
    public function execute(City $fromCity, City $toCity)
    {
        $settings = CargoProvider::where('name', 'ARAS')->first()->load('settings')->settings->settings;

        $url = $settings['urls']['calculation'];
        $method = $settings['methods']['calculation'];
        $payload = (new CalculationPayloadMapper)->map($settings, $fromCity, $toCity, true);
        $payload = array_merge($payload, $settings['defined_payload']);

        $extraPayload = [
            "ReceiverAddress" => ['CityId' => $fromCity->plate, 'TownId' => $fromCity->district->provider_id['aras']],
            "SenderAddress" => ['CityId' => $toCity->plate, 'TownId' => $toCity->district->provider_id['aras']],
        ];

        $payload = array_merge($payload, $extraPayload);

        $response = Http::$method($url, $payload)->json();

        $price = Arr::get($response, 'Responses.0.TotalPrice'). ' TL';

        return $price;
    }
}
