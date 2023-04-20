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
});
