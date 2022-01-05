<?php

use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\System\CIE10Controller;
use App\Http\Controllers\System\CumsController;
use App\Http\Controllers\System\CupsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/CIE10/search', [CIE10Controller::class, 'search'])->name('CIE10-search');
Route::get('/cups/search', [CupsController::class, 'search'])->name('cups-search');
Route::get('/cums/search', [CumsController::class, 'search'])->name('cums-search');

Route::get('/countries/search', [LocationController::class, 'countries'])->name('countries-search');
Route::get('/departments/search', [LocationController::class, 'departments'])->name('departments-search');
Route::get('/cites/search', [LocationController::class, 'cities'])->name('cites-search');
