<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ParametersController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\ReverseOsmosisTypeController;
use App\Http\Controllers\ServicesController;

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

Route::group(['middleware' => 'auth:sanctum', 'verified'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('companies', CompanyController::class);
    Route::resource('reverse-osmosis-types', ReverseOsmosisTypeController::class);

    Route::resource('companies.services', ServicesController::class); // Route para obtener los servicios de cada company
    Route::resource('companines.services.reverse-osmosis-types.plants', PlantController::class)->whereIn('services', ["reverse-osmosis"]);
    Route::resource('compannies.services.plants.parameters', ParametersController::class);
});


// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
