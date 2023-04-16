<?php

namespace App\Actions;

use App\Helpers\CalculationPayloadMapper;
use App\Models\CargoProvider;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class CalculateMngParcelPrice
{
    public function execute($fromCity, $toCity, $width, $height, $length, $weight)
    {
        $settings = CargoProvider::where('name', 'MNG')->first()->load('settings')->settings->settings;

        $url = $settings['urls']['calculation'];

        $method = $settings['methods']['calculation'];

        $payload = (new CalculationPayloadMapper())->map($settings, $fromCity, $toCity, false, $width, $height, $length, $weight);

        $payload = array_merge($payload, $settings['defined_payload'], $payload['dimensions']);
        Arr::forget($payload, 'dimensions');

        $price = Http::asForm()->$method($url, $payload)->throw()->json();

       return Arr::get($price, 'TotalPrice');
    }
}
