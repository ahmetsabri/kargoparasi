<?php

use App\Http\Controllers\CitiesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/cities/search', [CitiesController::class, 'search'])->name('cities.search');
