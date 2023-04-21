<?php

namespace App\Actions;

use App\Models\City;
use App\Models\CargoProvider;
use Illuminate\Support\Facades\Http;
use App\Helpers\CalculationPayloadMapper;

class CalculateSuratParcelPrice
{
    public function execute(City $fromCity, City $toCity, $width, $height, $length, $weight)
    {
        $settings = CargoProvider::where('name', 'SURAT')->first()->load('settings')->settings->settings;

        $url = $settings['urls']['calculation'];

        $method = $settings['methods']['calculation'];

        $payload = (new CalculationPayloadMapper)->map($settings, $fromCity, $toCity, false, $width, $height, $length, $weight);
        $desi = ceil($width * $height * $length / 3000);
        $payload = array_merge($payload, $settings['defined_payload'],['Desi' => $desi,'Kg' => $weight]);

        $price = Http::$method($url, $payload)->json();

        $price =  (new GetFinalValueAction)->execute($price['message']);

        return $price ? $price . ' TL' : null;
    }
}
