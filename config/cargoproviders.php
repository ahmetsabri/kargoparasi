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
        'logo_url' => env('YURTICI_LOGO_URL'),
    ],

    'mng' => [
        'location_url' => env('MNG_LOCATIONS_URL'),
        'location_method' => env('MNG_LOCATIONS_METHOD'),
        'calculation_url' => env('MNG_CALCULATION_URL'),
        'calculation_method' => env('MNG_CALCULATION_METHOD'),
        'logo_url' => env('MNG_LOGO_URL'),
    ],

    'ups' => [
        'location_url' => env('UPS_LOCATIONS_URL'),
        'location_method' => env('UPS_LOCATIONS_METHOD'),
        'calculation_url' => env('UPS_CALCULATION_URL'),
        'calculation_method' => env('UPS_CALCULATION_METHOD'),
        'viewstate' => env('UPS_VIEWSTATE'),
        'eventvalidation' => env('UPS_EVENTVALIDATION'),
        'logo_url' => env('UPS_LOGO_URL'),
    ],

    'aras' => [
        'location_url' => env('ARAS_LOCATIONS_URL'),
        'location_method' => env('ARAS_LOCATIONS_METHOD'),
        'calculation_url' => env('ARAS_CALCULATION_URL'),
        'calculation_method' => env('ARAS_CALCULATION_METHOD'),
        'address_geocode_url' => env('ARAS_ADDRESS_GEOCODE_URL'),
        'address_geocode_method' => env('ARAS_ADDRESS_GEOCODE_METHOD'),
        'town_to_town_url' => env('ARAS_TOWN_TO_TOWN_URL'),
        'town_to_town_method' => env('ARAS_TOWN_TO_TOWN_METHOD'),
        'parcel_service_id' => env('ARAS_PARCEL_SERVICE_ID'),
        'logo_url' => env('ARAS_LOGO_URL'),
    ],

    'surat' => [
        'location_url' => env('SURAT_LOCATIONS_URL'),
        'location_method' => env('SURAT_LOCATIONS_METHOD'),
        'calculation_url' => env('SURAT_CALCULATION_URL'),
        'calculation_method' => env('SURAT_CALCULATION_METHOD'),
        'logo_url' => env('SURAT_LOGO_URL'),
    ],

];
