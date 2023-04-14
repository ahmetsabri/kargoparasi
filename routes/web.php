<?php

use App\Actions\CalculateMngPrice;
use App\Actions\CalculateUpsPrice;
use App\Actions\CalculateYurticiPrice;
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
    $to = City::plate('01')->first();

    $yurtici = (new CalculateYurticiPrice())->execute($from, $to, true);
    $ups = (new CalculateUpsPrice())->execute($from, $to, true);
    $mng = (new CalculateMngPrice())->execute($from, $to, true);
    //TODO: ups caculation implementation
    return compact('mng', 'yurtici', 'ups');
});
