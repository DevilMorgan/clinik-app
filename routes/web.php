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

Route::get('/tester', function (){
    $string = 'V99';

    echo ++$string; // this will print V0002
    echo ++$string; // this will print V0002
    echo ++$string; // this will print V0002
    echo ++$string; // this will print V0002
});

require __DIR__ . "/auth.php";

// Ruta para el pdf Fórmula Médica
Route::name('print')->get('/print-formula-medica', [\App\Http\Controllers\Pdf\GeneradorController::class, 'printPdf1']);
Route::name('load')->get('/load-formula-medica', [\App\Http\Controllers\Pdf\GeneradorController::class, 'loadPdf1']);

// Ruta para el pdf Incapacidades
Route::name('print-incapacidad')->get('/print-incapacidad', [\App\Http\Controllers\Pdf\GeneradorController::class, 'printPdf2']);
Route::name('load-incapacidad')->get('/load-incapacidad', [\App\Http\Controllers\Pdf\GeneradorController::class, 'loadPdf2']);

// Ruta para el pdf Autorizaciones
Route::name('print-autorizacion')->get('/print-autorizacion', [\App\Http\Controllers\Pdf\GeneradorController::class, 'printPdf3']);
Route::name('load-autorizacion')->get('/load-autorizacion', [\App\Http\Controllers\Pdf\GeneradorController::class, 'loadPdf3']);

// Ruta para el pdf historia medica
Route::name('print-historia-medica')->get('/print-historia-medica', [\App\Http\Controllers\Pdf\GeneradorController::class, 'printPdf4']);
Route::name('load-historia-medica')->get('/load-historia-medica', [\App\Http\Controllers\Pdf\GeneradorController::class, 'loadPdf4']);

// Ruta para el PDF consentimiento
Route::name('print-consentimiento')->get('/print-consentimiento', [\App\Http\Controllers\Pdf\GeneradorController::class, 'printPdf5']);
Route::name('load-consentimiento')->get('/load-consentimiento' , [\App\Http\Controllers\Pdf\GeneradorController::class, 'loadPdf5']);

// Ruta para el PDF del carné de vacunación
Route::name('print-vacunacion')->get('/print-vacunacion', [\App\Http\Controllers\Pdf\GeneradorController::class, 'printPdf61']);
Route::name('load-vacunacion')->get('/load-vacunacion', [\App\Http\Controllers\Pdf\GeneradorController::class, 'loadPdf6']);

// Ruta para el PDF del carné de vacunación Covid-19
Route::name('load-carnetC19')->get('/load-carnetC19', [\App\Http\Controllers\Pdf\GeneradorController::class, ('loadPdf7')]);