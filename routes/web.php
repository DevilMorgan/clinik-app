<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\Auth\SharepointController::class, 'index'])->name('init');
Route::post('/sharepoint', [\App\Http\Controllers\Auth\SharepointController::class, 'search_sharepoint'])
    ->name('sharepoint');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::view('/test', 'test');

require __DIR__ . "/auth.php";

// Ruta para el pdf Fórmula Médica
Route::name('print')->get('/print-formula-medica', [\App\Http\Controllers\Pdf\GeneradorController::class, 'printPdf1']);
Route::name('load')->get('/load-formula-medica', [\App\Http\Controllers\Pdf\GeneradorController::class, 'loadPdf1']);

// Ruta para el pdf Incapacidades
//Route::name('print')->get('/print-incapacidad', [\App\Http\Controllers\Pdf\GeneradorController::class, 'printPdf2']);
//Route::name('load')->get('/load-incapacidad', [\App\Http\Controllers\Pdf\GeneradorController::class, 'loadPdf2']);

// Ruta para el pdf Autorizaciones
//Route::name('print')->get('/print-autorizacion', [\App\Http\Controllers\Pdf\GeneradorController::class, 'printPdf3']);
//Route::name('load')->get('/load-autorizacion', [\App\Http\Controllers\Pdf\GeneradorController::class, 'loadPdf3']);
