<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth:web_tenant'])
    ->namespace('App\\Http\\Controllers\\Tenant\\')
    ->as('tenant.')
    ->group(function ()
    {
        /**
         * The routes separated for modules
         */
        //Home
        Route::get('/home', [\App\Http\Controllers\Tenant\HomeController::class, 'index'])->name('home');

        Route::group(['as' => 'manager.'], function (){

            Route::group(['middleware' => 'modules:users', 'as' => 'users.'],function (){
                Route::get('/manager/users', [\App\Http\Controllers\Tenant\Manager\User\UsersController::class])->name('index');
            });

            Route::group(['middleware' => 'modules:manager-medical-history', 'as' => 'manager-medical-history.'],function (){
                Route::get('/manager/calendar/', [\App\Http\Controllers\Tenant\Administrative\Calendar\CalendarController::class, 'index'])->name('index');
            });
        });


        Route::group(['as' => 'operative.'], function (){

            Route::group(['middleware' => 'modules:patients-operative', 'as' => 'patients.'],function (){
                Route::get('/operative/patients', [\App\Http\Controllers\Tenant\Patients\PatientsController::class,'index'])->name('index');
                Route::get('/operative/patients/create', [\App\Http\Controllers\Tenant\Patients\PatientsController::class,'create'])->name('create');
                Route::post('/operative/patients/create', [\App\Http\Controllers\Tenant\Patients\PatientsController::class,'store'])->name('store');
                Route::get('/operative/patients/{id}/edit', [\App\Http\Controllers\Tenant\Patients\PatientsController::class,'edit'])->name('edit');
                Route::put('/operative/patients/{id}/edit', [\App\Http\Controllers\Tenant\Patients\PatientsController::class,'update'])->name('update');
                Route::delete('/operative/patients/{id}/delete', [\App\Http\Controllers\Tenant\Patients\PatientsController::class, 'destroy'])->name('destroy');
            });

            Route::group(['middleware' => 'modules:calendar-operative', 'as' => 'calendar.'],function (){
                Route::get('/operative/calendar/', [\App\Http\Controllers\Tenant\Operative\Calendar\CalendarController::class, 'index'])->name('index');
                Route::post('/operative/calendar/list-free-date', [\App\Http\Controllers\Tenant\Operative\Calendar\CalendarController::class, 'list_free_date'])->name('list-free-date');
                Route::post('/operative/calendar/create_date', [\App\Http\Controllers\Tenant\Operative\Calendar\CalendarController::class, 'create_date'])->name('date-create');

                Route::get('/operative/calendar/config-calendar', [\App\Http\Controllers\Tenant\Operative\Calendar\CalendarController::class, 'config_calendar'])->name('config-calendar');
                Route::post('/operative/calendar/config-date', [\App\Http\Controllers\Tenant\Operative\Calendar\CalendarController::class, 'config_date'])->name('config-date');
                Route::post('/operative/calendar/add-schedule', [\App\Http\Controllers\Tenant\Operative\Calendar\CalendarController::class, 'add_schedule'])->name('add-schedule');
                Route::delete('/operative/calendar/delete-schedule', [\App\Http\Controllers\Tenant\Operative\Calendar\CalendarController::class, 'delete_schedule'])->name('delete-schedule');
            });

            Route::group(['middleware' => 'modules:medical-history', 'as' => 'medical-history.'],function (){
                Route::get('/medical-history', [\App\Http\Controllers\Tenant\Operative\MedicalHistory\MedicalHistoryController::class,'index'])->name('index');
            });
        });

        Route::group(['as' => 'administrative.'], function (){

            Route::group(['middleware' => 'modules:patients-administrative', 'as' => 'patients.'],function (){
                Route::get('/administrative/patients', [\App\Http\Controllers\Tenant\Patients\PatientsController::class,'index'])->name('index');
            });

            Route::group(['middleware' => 'modules:calendar-administrative', 'as' => 'calendar.'],function (){
                Route::get('/administrative/calendar/', [\App\Http\Controllers\Tenant\Administrative\Calendar\CalendarController::class, 'index'])->name('index');
            });
        });

    });

Route::middleware('web')
    ->namespace('App\\Http\\Controllers\\Tenant\\')
    //->as('tenant.')
    ->group(function () {
        Route::get('/', [AuthenticatedSessionController::class, 'create']);
        //Route::get('/test', [\App\Http\Controllers\Tenant\Patients\PatientsController::class, 'test']);
        require __DIR__ . "/auth.php";
    });
