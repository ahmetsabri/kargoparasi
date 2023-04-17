<?php

namespace App\Http\Controllers;

use App\Actions\CalculateArasEnvelopePrice;
use App\Actions\CalculateArasParcelPrice;
use App\Actions\CalculateMngEnvelopePrice;
use App\Actions\CalculateMngParcelPrice;
use App\Actions\CalculateUpsEnvelopePrice;
use App\Actions\CalculateUpsParcelPrice;
use App\Actions\CalculateYurticiEnvelopePrice;
use App\Actions\CalculateYurticiParcelPrice;
use App\Http\Requests\CalculatePriceRequest;
use App\Models\City;

class CalculatePriceController extends Controller
{
    public function __invoke(CalculatePriceRequest $request)
    {
        $from = City::plate($request->from)->first();
        $to = City::plate($request->to)->first();

        if ($request->is_envelope) {
            $yurticiDosya = (new CalculateYurticiEnvelopePrice())->execute($from, $to);
            $upsDosya = (new CalculateUpsEnvelopePrice())->execute($from, $to);
            $mngDosya = (new CalculateMngEnvelopePrice())->execute($from, $to);
            $arasDosya = (new CalculateArasEnvelopePrice())->execute($from, $to);

            return compact('upsDosya', 'mngDosya', 'yurticiDosya', 'arasDosya');
        }

        $yurtici = (new CalculateYurticiParcelPrice())->execute($from, $to, $request->width, $request->height, $request->length, $request->weight);
        $mng = (new CalculateMngParcelPrice())->execute($from, $to, $request->width, $request->height, $request->length, $request->weight);
        $ups = (new CalculateUpsParcelPrice())->execute($from, $to, $request->width, $request->height, $request->length, $request->weight);
        $aras = (new CalculateArasParcelPrice())->execute($from, $to, $request->weight);

        return compact('ups', 'mng', 'yurtici', 'aras');
    }
}
