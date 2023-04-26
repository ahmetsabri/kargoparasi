<?php

namespace App\Actions;

use App\Models\City;
use App\Models\District;
use Illuminate\Support\Facades\Http;

class GetYurticinLocationsAction
{

    public function execute(): void
    {
        $districts = District::all();

        foreach ($districts as $district) {
            $providerId = $district->provider_id;
            if ($district->city_id == 1) {
                $providerId = array_merge($providerId, ['yurtici' => $district->city_id . "02"]);
            } elseif ($district->city_id == 14) {
                $providerId = array_merge($providerId, ['yurtici' => $district->city_id . "13"]);
            } else {
                $providerId = array_merge($providerId, ['yurtici' => $district->city_id . "01"]);
            }

            $district->update([
                'provider_id' => $providerId
            ]);
        }
    }
}
