<?php

namespace App\Actions;

use App\Models\City;
use App\Models\District;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GetMngLocationsAction
{

    public function execute(): void
    {
        $cities = City::all();
        $url = config('cargoproviders.mng.location_url');
        $method = config('cargoproviders.mng.location_method');
        $address = [];
        foreach ($cities as $city) {
            $cityName  = $city->name;
            if ($city->plate == 3){
                $cityName = 'Afyon';
            }
            // http request with encoded form data
            $response = Http::asForm()->$method($url, [
                'CityDistrictName' => $cityName,
            ])->throw()->json();

            $address = collect($response)->where('cityId', $city->id)->first();
            if(!$address){
                Log::info('MNG: City not found: ' . $city->name);
                continue;
            }
            District::updateOrCreate(
                ['city_id' => $city->id],
                [
                    'name' => $address['districtName'],
                    'city_id' => $city->plate,
                    'provider_id' => json_encode([
                        'mng' => $address['districtId']
                    ])
                ]
            );
        }
    }
}
