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
Route::domain('clinik-app.test')
    ->middleware('auth')
    ->as('system.')
    ->group(function (){

        Route::get('/home', [\App\Http\Controllers\System\HomeController::class, 'index'])
            ->name('home');

        Route::group(['as' => 'history-clinic.', 'prefix' => 'history-clinic'], function (){

            Route::resource('templates', '\App\Http\Controllers\System\HistoryClinic\TemplatesController')
                ->except(['destroy', 'show']);
            Route::get('/templates/config/{template}', [\App\Http\Controllers\System\HistoryClinic\TemplatesController::class, 'config'])
                ->name('templates.config');
            Route::put('/templates/config/{template}', [\App\Http\Controllers\System\HistoryClinic\TemplatesController::class, 'config_save'])
                ->name('templates.config-save');

            Route::resource('modules', '\App\Http\Controllers\System\HistoryClinic\ModulesController')
                ->except(['destroy', 'show']);
            Route::get('/modules/search', [\App\Http\Controllers\System\HistoryClinic\ModulesController::class, 'search'])
                ->name('modules.search');
            Route::get('/modules/config/{module}', [\App\Http\Controllers\System\HistoryClinic\ModulesController::class, 'config'])
                ->name('modules.config');
            Route::put('/modules/config/{module}', [\App\Http\Controllers\System\HistoryClinic\ModulesController::class, 'config_save'])
                ->name('modules.config-save');

            Route::resource('variables', '\App\Http\Controllers\System\HistoryClinic\VariablesController')
                ->except(['destroy', 'show', 'create', 'store']);
            Route::get('/variables/create/{type}', [\App\Http\Controllers\System\HistoryClinic\VariablesController::class, 'create'])
                ->name('variables.create');
            Route::post('/variables/{type}', [\App\Http\Controllers\System\HistoryClinic\VariablesController::class, 'store'])
                ->name('variables.store');
            Route::get('/variables/search', [\App\Http\Controllers\System\HistoryClinic\VariablesController::class, 'search'])
                ->name('variables.search');

            Route::resource('specialties', '\App\Http\Controllers\System\HistoryClinic\SpecialtiesController')
                ->except(['destroy', 'show']);

        });

    });


Route::domain('clinik-app.test')->group(function (){
    Route::get('/', [\App\Http\Controllers\Auth\SharepointController::class, 'index'])->name('init');
//    Route::get('/', function (){
//        dd(env('APP_DOMAIN'));
//    });
    Route::post('/sharepoint', [\App\Http\Controllers\Auth\SharepointController::class, 'search_sharepoint'])
        ->name('sharepoint');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');

    require __DIR__ . "/auth.php";
});


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

