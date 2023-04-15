<?php

use App\Actions\CalculateMngEnvelopePrice;
use App\Actions\CalculateMngParcelPrice;
use App\Actions\CalculateUpsEnvelopePrice;
use App\Actions\CalculateUpsParcelPrice;
use App\Actions\CalculateYurticiEnvelopePrice;
use App\Actions\CalculateYurticiParcelPrice;
use App\Models\City;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    $from = City::plate(34)->first();
    $to = City::plate("01")->first();

    // envelope
    $yurtici = (new CalculateYurticiEnvelopePrice())->execute($from, $to, true);
    $ups = (new CalculateUpsEnvelopePrice())->execute($from, $to, true);
    $mng = (new CalculateMngEnvelopePrice())->execute($from, $to, true);

    // Parcel
    // $yurtici = (new CalculateYurticiParcelPrice())->execute($from, $to, 10, 11, 12, 3);
    // $mng = (new CalculateMngParcelPrice())->execute($from, $to, 10, 11, 12, 3);
    // $ups = (new CalculateUpsParcelPrice())->execute($from, $to, 10, 11, 12, 3);

    return compact('yurtici', 'mng', 'ups');

});
