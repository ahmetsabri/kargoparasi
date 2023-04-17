<?php

namespace App\Actions;

use App\Helpers\CalculationPayloadMapper;
use App\Models\CargoProvider;
use Illuminate\Support\Facades\Http;
class CalculateUpsEnvelopePrice
{
    public function execute($fromCity, $toCity)
    {
    $settings = CargoProvider::where('name', 'UPS')->first()->load('settings')->settings->settings;

    $url = $settings['urls']['calculation'];

    $method = $settings['methods']['calculation'];

    $payload = (new CalculationPayloadMapper())->map($settings, $fromCity, $toCity, true);

    $payload = array_merge($payload, $settings['defined_payload']);

    $extraPayload = [
        'ctl00$MainContent$TextBoxYurticiGercekAgirlik2' => '5',
    ];

    $payload = array_merge($payload, $extraPayload);

    $price = Http::asForm()->$method($url, $payload)->throw()->body();

    $pos = mb_strpos($price, 'Toplam Ücret :');

    $price = mb_substr($price, $pos+mb_strlen('Toplam Ücret :'), 5);

    return $price .' TL';
}
}
