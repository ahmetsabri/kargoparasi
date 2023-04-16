<?php

namespace App\Actions;

use App\Models\City;
use Illuminate\Support\Arr;
use App\Models\CargoProvider;
use Illuminate\Support\Facades\Http;
use App\Helpers\CalculationPayloadMapper;

class CalculateArasParcelPrice
{
    public function execute(City $fromCity, City $toCity, $weight)
    {
        $settings = CargoProvider::where('name', 'ARAS')->first()->load('settings')->settings->settings;

        $url = $settings['urls']['calculation'];
        $method = $settings['methods']['calculation'];
        $payload = (new CalculationPayloadMapper)->map($settings, $fromCity, $toCity, false, weight:$weight);
        $payload = array_merge($payload, $settings['defined_payload']);

        $extraPayload = [
            "ReceiverAddress" => ['CityId' => $fromCity->plate, 'TownId' => $fromCity->district->provider_id['aras']],
            "SenderAddress" => ['CityId' => $toCity->plate, 'TownId' => $toCity->district->provider_id['aras']],
        ];

        $payload = array_merge($payload, $settings['defined_payload'], $payload['dimensions'], $extraPayload);

        Arr::forget($payload,['dimensions','Length','Width','Height']);

        data_set($payload, 'ServiceList.0.Id', config('cargoproviders.aras.parcel_service_id'));

        $response = Http::$method($url, $payload)->json();

        $price = Arr::get($response, 'Responses.0.TotalPrice'). ' TL';

        return $price;
    }
}
