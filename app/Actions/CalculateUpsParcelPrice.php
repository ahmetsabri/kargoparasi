<?php

namespace App\Actions;

use App\Helpers\CalculationPayloadMapper;
use App\Models\CargoProvider;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class CalculateUpsParcelPrice
{
    public function execute($fromCity, $toCity, $width, $height, $length, $weight)
    {

        $settings = CargoProvider::where('name', 'UPS')->first()->load('settings')->settings->settings;

        $url = $settings['urls']['calculation'];

        $method = $settings['methods']['calculation'];

        $payload = (new CalculationPayloadMapper())->map($settings, $fromCity, $toCity, false, $width, $height, $length, $weight);

        $payload = array_merge($payload, $settings['defined_payload'], $payload['dimensions']);

        $payload = array_merge($payload, ['ctl00$MainContent$RadioButtonYurticiFiyatHesaplaDosya'=>'U']);

        Arr::forget($payload, 'dimensions');

        $price = Http::asForm()->$method($url, $payload)->throw()->body();

        $pos = mb_strpos($price, 'Toplam Ücret :');

        $price = mb_substr($price, $pos + mb_strlen('Toplam Ücret :'), 5);

        return $price . ' TL';
    }
}
