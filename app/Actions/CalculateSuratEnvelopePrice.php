<?php

namespace App\Actions;

use App\Models\City;
use Illuminate\Support\Arr;
use App\Models\CargoProvider;
use Illuminate\Support\Facades\Http;
use App\Helpers\CalculationPayloadMapper;

class CalculateSuratEnvelopePrice
{
    public function execute(City $fromCity, City $toCity)
    {
        $settings = CargoProvider::where('name', 'SURAT')->first()->load('settings')->settings->settings;

        $url = $settings['urls']['calculation'];

        $method = $settings['methods']['calculation'];

        $payload = (new CalculationPayloadMapper)->map($settings, $fromCity, $toCity, true);

        $payload = array_merge($payload, $settings['defined_payload'],['Desi' => 0]);

        $price = Http::$method($url, $payload)->json();

        $price =  (new GetFinalValueAction)->execute($price['message']);

        return $price ? $price . ' TL' : null;
    }
}
