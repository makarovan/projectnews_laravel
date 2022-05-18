<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Models\Country;
use App\Http\Controllers\CityController;
use App\Models\City;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('start');
});

Route::get('/countries', [CountryController::class, 'index']);
Route::get('/detail/{country}', [CountryController::class, 'show']);
Route::get('/search', [CountryController::class, 'search'])->name('search');

Route::get('/cities', [CityController::class, 'index']);
Route::get('/detailCity/{city}', [CityController::class, 'show']);

Route::get('/continent', [CountryController::class, 'listContinent']);
Route::get('/continentCountry/{continent}', [CountryController::class, 'countryByContinent']);

// Route::get('/filter', 'CountryController@filterCountry');
// Route::get('/filterSelect', 'CountryController@filterShow');

Route::get('/filter', [CountryController::class, 'filterCountry']);
Route::get('/filterSelect', [CountryController::class, 'filterShow']);