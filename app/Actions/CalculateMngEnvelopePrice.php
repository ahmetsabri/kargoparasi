<?php

namespace App\Actions;

use App\Helpers\CalculationPayloadMapper;
use App\Models\CargoProvider;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class CalculateMngEnvelopePrice
{
    public function execute($fromCity, $toCity)
    {

        $settings = CargoProvider::where('name', 'MNG')->first()->load('settings')->settings->settings;

        $url = $settings['urls']['calculation'];

        $method = $settings['methods']['calculation'];

        $payload = (new CalculationPayloadMapper())->map($settings, $fromCity, $toCity, true);

        $payload = array_merge($payload, $settings['defined_payload']);

        $price = Http::asForm()->$method($url, $payload)->json();

        $price = (new GetFinalValueAction())->execute(Arr::get($price, 'TotalPrice', 0));

       return $price ? $price : null;
    }
}
