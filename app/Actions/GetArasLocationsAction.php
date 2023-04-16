<?php

namespace App\Actions;

use App\Models\City;
use App\Models\District;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GetArasLocationsAction
{

    public function execute(): void
    {
        $districts = District::with('city')->get();

        $url = config('cargoproviders.aras.location_url');
        $method = config('cargoproviders.aras.location_method');

        $address = [];

        foreach ($districts as $district) {
            $city  = $district->city;

            $response = Http::$method($url, [
                'search' => $city->name,
            ])->throw()->json();

            $address = collect($response)->where('cityId', $city->id)->first();
            if (!$address) {
                continue;
            }

            $district->update(
                [
                    'provider_id' => array_merge(['aras' => $address['townId']], $district->provider_id)
                ]
            );
        }
    }
}
