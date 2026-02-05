<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\CityController;

Route::get('/', function () {
    return redirect()->route('cities.index');
});

Route::resource('cities', CityController::class)->only(['index', 'store', 'create', 'edit', 'update']);
Route::get('cities/{city}/weather', [CityController::class, 'getWeather'])->name('cities.weather');
