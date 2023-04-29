<?php

namespace Database\Seeders;

use App\Models\CargoProvider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CargoPorviderSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $yurticiSettings = [
            'urls' => [
                'locations' => config('cargoproviders.yurtici.location_url'),
                'calculation' => config('cargoproviders.yurtici.calculation_url'),
            ],

            'methods' => [
                'locations' => config('cargoproviders.yurtici.location_method'),
                'calculation' => config('cargoproviders.yurtici.calculation_method'),
            ],

            'calculation_payload' => [
                'from' => 'SourceCityId',
                'to' => 'DestinationCityId',
                'envelope_key' => 'ShipmentType',
                'envelope_value' => 0,
                'parcel_key' => 'ShipmentType',
                'parcel_value' => 2,
            ],
            'dimensions' => [
                'weight' => 'Weight',
                'length' => 'Length',
                'width' => 'Width',
                'height' => 'Height',
            ],
            'extra_payload' => [
                'SourceCountyId' => 'SourceCountyId',
                'DestinationCountyId' => 'DestinationCountyId',
                'TotalKgds' => 'TotalKgds',
                'TotalCount' => 'TotalCount'
            ],
            'defined_payload' => [],
        ];

        $mngSettings =  [
            'urls' => [
                'locations' => config('cargoproviders.mng.location_url'),
                'calculation' => config('cargoproviders.mng.calculation_url'),
            ],

            'methods' => [
                'locations' => config('cargoproviders.mng.location_method'),
                'calculation' => config('cargoproviders.mng.calculation_method'),
            ],

            'calculation_payload' => [
                'from' => 'WhereFromCityId',
                'to' => 'WhereCityId',
                'envelope_key' => 'EnvelopeFile',
                'envelope_value' => 1,
                'parcel_key' => 'PackageParcel',
                'parcel_value' => 3,
            ],
            'dimensions' => [
                'weight' => 'WeightRange',
                'length' => 'LengthRange',
                'width' => 'MostRange',
                'height' => 'HeightRange',
            ],
            'extra_payload' => [],
            'defined_payload' => [],
        ];

        $upsSettings = [
            'urls' => [
                'locations' => config('cargoproviders.ups.location_url'),
                'calculation' => config('cargoproviders.ups.calculation_url'),
            ],

            'methods' => [
                'locations' => config('cargoproviders.ups.location_method'),
                'calculation' => config('cargoproviders.ups.calculation_method'),
            ],

            'calculation_payload' => [
                'from' => 'ctl00$MainContent$yurticihesap_drop_gonsehir',
                'to' => 'ctl00$MainContent$yurticihesap_drop_alsehir',
                'envelope_key' => 'ctl00$MainContent$RadioButtonYurticiFiyatHesaplaDosya',
                'envelope_value' => 'C',
                'parcel_key' => 'ctl00$MainContent$RadioButtonYurticiFiyatHesaplaKoli',
                'parcel_value' => 'I',
            ],
            'dimensions' => [
                'height' => 'ctl00$MainContent$TextBoxYurticiYukseklik',
                'width' => 'ctl00$MainContent$TextBoxYurticiEn',
                'length' => 'ctl00$MainContent$TextBoxYurticiBoy',
                'weight' => 'ctl00$MainContent$TextBoxYurticiGercekAgirlik2',
            ],
            'extra_payload' => [],

            'defined_payload' => [
                'ctl00$MainContent$TextBoxYurticiGercekAgirlik1' => '0',
                'ctl00$MainContent$Button3' => 'Hesapla',
                'ctl00$MainContent$yurticihesap_drop_servistip' => '3',
                'ctl00$MainContent$RadioButtonYurticiFiyatHesaplaDosya' => 'C',
                'ctl00$MainContent$RadioButtonYurticiFiyatHesaplaKoli' => 'I',
                '__VIEWSTATE' => config('cargoproviders.ups.viewstate'),
                '__EVENTVALIDATION' => config('cargoproviders.ups.eventvalidation'),
            ],
        ];

        $arasSettings = [
            'urls' => [
                'locations' => config('cargoproviders.aras.location_url'),
                'calculation' => config('cargoproviders.aras.calculation_url'),
                'address_geocode' => config('cargoproviders.aras.address_geocode_url'),
            ],

            'methods' => [
                'locations' => config('cargoproviders.aras.location_method'),
                'calculation' => config('cargoproviders.aras.calculation_method'),
                'address_geocode' => config('cargoproviders.aras.address_geocode_method'),
            ],

            'calculation_payload' => [
                'envelope_key' => 'Weight',
                'envelope_value' => 0,
                'parcel_key' => 'Desi',
                'parcel_value' => 0,
            ],
            'dimensions' => [
                'weight' => 'Weight',
                'length' => 'Length',
                'width' => 'Width',
                'height' => 'Height',
            ],
            'extra_payload' => [],
            'defined_payload' => [
                "Desi" => 0,
                "IsWeb" => 1,
                "IsWorldWide" => 0,
                'ServiceList' => [
                    [
                        "Id" => "DC261CBFD5E0674986C7B6D7093E4060",
                        "LovServiceTypeId" => "1",
                        "ServiceCount" => "1",
                    ]
                ]
            ],
        ];

        $surat =
            [
                'urls' => [
                    'locations' => config('cargoproviders.surat.location_url'),
                    'calculation' => config('cargoproviders.surat.calculation_url'),
                    'address_geocode' => config('cargoproviders.surat.address_geocode_url'),
                ],

                'methods' => [
                    'locations' => config('cargoproviders.surat.location_method'),
                    'calculation' => config('cargoproviders.surat.calculation_method'),
                    'address_geocode' => config('cargoproviders.surat.address_geocode_method'),
                ],

                'calculation_payload' => [
                    'from' => 'CikisIl',
                    'to' => 'VarisIl',
                    'envelope_key' => 'Kg',
                    'envelope_value' => 0,
                    'parcel_key' => 'Kg',
                    'parcel_value' => 0,
                ],
                'dimensions' => [
                    'weight' => 'Kg',
                ],
                'extra_payload' => [],
                'defined_payload' => [
                    'Sigorta' => false,
                    'GonderimTipi' => 2,
                    'TeslimSekli' => 1,
                    'TeslimattaGondericiye_Sms' => false,
                    'AliciSubVar_Aliciya_Sms' => false,
                    'FatTesKes_Aliciya_Sms' => false,
                ],
            ];

        $cargoProviders = [
            'yurtici' => $yurticiSettings,
            'mng' => $mngSettings,
            'ups' => $upsSettings,
            'aras' => $arasSettings,
            'surat' => $surat,

        ];

        foreach ($cargoProviders as $provider => $settings) {
            $provider = CargoProvider::where('name', $provider)->first();
            $provider->settings()->updateOrCreate(
                [
                    'cargo_provider_id' => $provider->id,
                ],
                [
                    'cargo_provider_id' => $provider->id,
                    'settings' => $settings,
                ]
            );
        }
    }
}
