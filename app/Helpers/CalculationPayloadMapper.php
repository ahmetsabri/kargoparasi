<?php
namespace App\Helpers;

use App\Models\City;

class CalculationPayloadMapper
{
    public static function map(array $settings, City $from, City $to, bool $isEnvelope = false, $width = null, $height = null, $length = null, $weight = null):array
    {
        $data = [];

        $data[$settings['calculation_payload']['from']??null] = intval( $from->plate);
        $data[$settings['calculation_payload']['to']??null] = intval($to->plate);
        if($isEnvelope){
            $data[$settings['calculation_payload']['envelope_key']] = $settings['calculation_payload']['envelope_value'];
        } else {
            $data[$settings['calculation_payload']['parcel_key']] = $settings['calculation_payload']['parcel_value'];
            $data['dimensions'] = [
                $settings['dimensions']['length'] ?? null => $length,
                $settings['dimensions']['width']  ?? null  => $width,
                $settings['dimensions']['height'] ?? null  => $height,
                $settings['dimensions']['weight'] ?? null  => $weight
            ];
        }
        return collect($data)->reject(function($value, $key){
            return !$key;
        })->toArray();
    }
}
