<?php

namespace App\Http\Controllers;

use App\Actions\CalculateArasEnvelopePrice;
use App\Actions\CalculateArasParcelPrice;
use App\Actions\CalculateMngEnvelopePrice;
use App\Actions\CalculateMngParcelPrice;
use App\Actions\CalculatePttPrice;
use App\Actions\CalculateSuratEnvelopePrice;
use App\Actions\CalculateSuratParcelPrice;
use App\Actions\CalculateUpsEnvelopePrice;
use App\Actions\CalculateUpsParcelPrice;
use App\Actions\CalculateYurticiEnvelopePrice;
use App\Actions\CalculateYurticiParcelPrice;
use App\Http\Requests\CalculatePriceRequest;
use App\Http\Resources\PriceResource;
use App\Models\City;

class CalculatePriceController extends Controller
{
    public function __invoke(CalculatePriceRequest $request)
    {
        $from = City::plate($request->from)->first();
        $to = City::plate($request->to)->first();

        if ($request->is_envelope) {
            $yurtici = (new CalculateYurticiEnvelopePrice())->execute($from, $to);
            $ups = (new CalculateUpsEnvelopePrice())->execute($from, $to);
            $mng = (new CalculateMngEnvelopePrice())->execute($from, $to);
            $aras = (new CalculateArasEnvelopePrice())->execute($from, $to);

            // $surat = (new CalculateSuratEnvelopePrice)->execute($from, $to);

        } else {
            $yurtici = (new CalculateYurticiParcelPrice())->execute($from, $to, $request->width, $request->height, $request->length, $request->weight);
            $mng = (new CalculateMngParcelPrice())->execute($from, $to, $request->width, $request->height, $request->length, $request->weight);
            $ups = (new CalculateUpsParcelPrice())->execute($from, $to, $request->width, $request->height, $request->length, $request->weight);
            $aras = (new CalculateArasParcelPrice())->execute($from, $to, $request->weight, $request->width, $request->height, $request->length);
            // $surat = (new CalculateSuratParcelPrice)->execute($from, $to, $request->width, $request->height, $request->length, $request->weight);
        }

        $ptt = (new CalculatePttPrice)->execute($request->weight, $request->width, $request->height, $request->length);

        $prices = [
            [
                'price' => $yurtici,
                'provider' => 'yurtici',
            ],
            [
                'price' => $mng,
                'provider' => 'mng',
            ],
            [
                'price' => $ups,
                'provider' => 'ups',
                'note' => 'KDV ve yakıt bedeli dahil değildir.',
            ],
            [
                'price' => $aras,
                'provider' => 'aras',
            ],
            [
                'price' => $ptt,
                'provider' => 'ptt',
            ],
            // [
            //     'price' => $surat,
            //     'provider' => 'surat',
            // ]
        ];

        return PriceResource::collection(($prices));
    }
}
