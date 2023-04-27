<?php

use App\Http\Controllers\CalculatePriceController;
use App\Http\Controllers\CitiesController;
use App\Http\Middleware\TrackSearch;
use Illuminate\Support\Facades\Route;

Route::get('cities/search', [CitiesController::class, 'search'])->name('cities.search');
Route::post('calculate', CalculatePriceController::class)->name('calculate.price')->middleware(TrackSearch::class);
