<?php
namespace App\Helpers;

use App\Models\City;

class CalculationPayloadMapper
{
    public static function map(array $settings, City $from, City $to, bool $isEnvelope = false, $width = null, $height = null, $length = null, $weight = null):array
    {
        $data = [];

        $data[$settings['calculation_payload']['from']] = intval( $from->plate);
        $data[$settings['calculation_payload']['to']] = intval($to->plate);
        if($isEnvelope){
            $data[$settings['calculation_payload']['envelope_key']] = $settings['calculation_payload']['envelope_value'];
        } else {
            $data[$settings['calculation_payload']['parcel_key']] = $settings['calculation_payload']['parcel_value'];
            $data['dimensions'] = [
                $settings['dimensions']['length'] => $length,
                $settings['dimensions']['width'] => $width,
                $settings['dimensions']['height'] => $height,
                $settings['dimensions']['weight'] => $weight
            ];

        }

        return $data;
    }
}
