<?php

use App\Actions\CalculateArasEnvelopePrice;
use App\Actions\CalculateArasParcelPrice;
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


    return view('welcome');

    // // envelope
    // $yurticiDosya = (new CalculateYurticiEnvelopePrice())->execute($from, $to, true);
    // $upsDosya = (new CalculateUpsEnvelopePrice())->execute($from, $to, true);
    // $mngDosya = (new CalculateMngEnvelopePrice())->execute($from, $to, true);
    // $arasDosya = (new CalculateArasEnvelopePrice())->execute($from, $to);
    // set $a with value multiple *
    $a = '****************************************';
    // // Parcel
    // $yurtici = (new CalculateYurticiParcelPrice())->execute($from, $to, 10, 11, 12, 3);
    // $mng = (new CalculateMngParcelPrice())->execute($from, $to, 10, 11, 12, 3);
    // $ups = (new CalculateUpsParcelPrice())->execute($from, $to, 10, 11, 12, 3);
    // $aras = (new CalculateArasParcelPrice())->execute($from, $to,3);

    return compact('upsDosya','mngDosya','yurticiDosya','arasDosya');
    // return compact('ups','mng','yurtici','aras','a','upsDosya','mngDosya','yurticiDosya','arasDosya');


});
