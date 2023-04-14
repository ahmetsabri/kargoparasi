<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'yurtici' => [
        'location_url' => env('YURTICI_LOCATIONS_URL'),
        'location_method' => env('YURTICI_LOCATIONS_METHOD'),
        'calculation_url' => env('YURTICI_CALCULATION_URL'),
        'calculation_method' => env('YURTICI_CALCULATION_METHOD'),
    ],

    'mng' => [
        'location_url' => env('MNG_LOCATIONS_URL'),
        'location_method' => env('MNG_LOCATIONS_METHOD'),
        'calculation_url' => env('MNG_CALCULATION_URL'),
        'calculation_method' => env('MNG_CALCULATION_METHOD'),
    ],

    'ups' => [
        'location_url' => env('UPS_LOCATIONS_URL'),
        'location_method' => env('UPS_LOCATIONS_METHOD'),
        'calculation_url' => env('UPS_CALCULATION_URL'),
        'calculation_method' => env('UPS_CALCULATION_METHOD'),
    ],

];
