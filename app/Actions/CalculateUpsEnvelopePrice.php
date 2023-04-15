<?php

namespace App\Actions;

use Illuminate\Support\Facades\Http;
class CalculateUpsEnvelopePrice
{
    public function execute($fromCity, $toCity, $isEnvelope)
    {
        $url = config('cargoproviders.ups.calculation_url');
        $method = config('cargoproviders.ups.calculation_method');

        $price = Http::asForm()->$method($url, [
            'ctl00$MainContent$yurticihesap_drop_gonsehir' =>intval($fromCity->plate),
            'ctl00$MainContent$yurticihesap_drop_alsehir' => intval($toCity->plate),
            'ctl00$MainContent$yurticihesap_drop_servistip'=>'3',
            'ctl00$MainContent$RadioButtonYurticiFiyatHesaplaDosya'=>'C',
            'ctl00$MainContent$RadioButtonYurticiFiyatHesaplaKoli'=>'I',
            'ctl00$MainContent$TextBoxYurticiGercekAgirlik1' => '0',
            'ctl00$MainContent$TextBoxYurticiGercekAgirlik2' => '5',
            'ctl00$MainContent$Button3' => 'Hesapla',
            '__VIEWSTATE' => config('cargoproviders.ups.viewstate'),
            '__EVENTVALIDATION' => config('cargoproviders.ups.eventvalidation')
            ])->throw()->body();

            $pos = mb_strpos($price,'Toplam Ücret :');

            $price = mb_substr($price, $pos+mb_strlen('Toplam Ücret :'), 5);

            return $price .' TL';
    }
}
