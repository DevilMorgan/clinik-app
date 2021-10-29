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


        Route::group(['as' => 'operative.', 'prefix' => 'operative'], function (){

            Route::group(['middleware' => 'modules:calendar-operative', 'as' => 'calendar.'],function (){
                Route::get('/calendar/', [\App\Http\Controllers\Tenant\Operative\Calendar\CalendarController::class, 'index'])->name('index');
                Route::post('/calendar/list-free-date', [\App\Http\Controllers\Tenant\Operative\Calendar\CalendarController::class, 'list_free_date'])->name('list-free-date');
                Route::get('/calendar/update-date', [\App\Http\Controllers\Tenant\Operative\Calendar\CalendarController::class, 'update_date'])->name('update-date');
                Route::post('/calendar/create_date', [\App\Http\Controllers\Tenant\Operative\Calendar\CalendarController::class, 'create_date'])->name('date-create');

                Route::get('/calendar/config-calendar', [\App\Http\Controllers\Tenant\Operative\Calendar\CalendarController::class, 'config_calendar'])->name('config-calendar');
                Route::post('/calendar/config-date', [\App\Http\Controllers\Tenant\Operative\Calendar\CalendarController::class, 'config_date'])->name('config-date');
                Route::post('/calendar/add-schedule', [\App\Http\Controllers\Tenant\Operative\Calendar\CalendarController::class, 'add_schedule'])->name('add-schedule');
                Route::delete('/calendar/delete-schedule', [\App\Http\Controllers\Tenant\Operative\Calendar\CalendarController::class, 'delete_schedule'])->name('delete-schedule');
            });

            Route::group(['middleware' => 'modules:medical-history', 'as' => 'medical-history.'],function (){
                Route::get('/medical-history', [\App\Http\Controllers\Tenant\Operative\MedicalHistory\MedicalHistoryController::class,'index'])->name('index');
            });

            Route::resource('/date-type', '\App\Http\Controllers\Tenant\Operative\Calendar\DateTypeController')
                ->except(['destroy', 'show'])->middleware('modules:date-types');

            Route::resource('/agreement', '\App\Http\Controllers\Tenant\Operative\Calendar\AgreementController')
                ->except(['destroy', 'show'])->middleware('modules:agreements');
            Route::get('/agreement/co-pay/{agreement}', [\App\Http\Controllers\Tenant\Operative\Calendar\AgreementController::class, 'co_pay'])
                ->name('agreement.co-pay')->middleware('modules:agreements');;
            Route::post('/agreement/co-pay/{agreement}/save', [\App\Http\Controllers\Tenant\Operative\Calendar\AgreementController::class, 'co_pay_save'])
                ->name('agreement.co-pay-save')->middleware('modules:agreements');;

            Route::resource('/consent', '\App\Http\Controllers\Tenant\Operative\Calendar\ConsentController')
                ->except(['destroy', 'show'])->middleware('modules:consents');

        });

        Route::group(['as' => 'administrative.'], function (){

            Route::group(['middleware' => 'modules:calendar-administrative', 'as' => 'calendar.'],function (){
                Route::get('/administrative/calendar/', [\App\Http\Controllers\Tenant\Administrative\Calendar\CalendarController::class, 'index'])->name('index');
            });
        });

        Route::group(['middleware' => 'modules:patients-operative', 'as' => 'patients.'],function (){
            Route::get('/patients', [\App\Http\Controllers\Tenant\Patients\PatientsController::class,'index'])->name('index');
            Route::get('/patients/create', [\App\Http\Controllers\Tenant\Patients\PatientsController::class,'create'])->name('create');
            Route::post('/patients/create', [\App\Http\Controllers\Tenant\Patients\PatientsController::class,'store'])->name('store');
            Route::get('/patients/{patient}/edit', [\App\Http\Controllers\Tenant\Patients\PatientsController::class,'edit'])->name('edit');
            Route::put('/patients/{patient}/edit', [\App\Http\Controllers\Tenant\Patients\PatientsController::class,'update'])->name('update');
            Route::delete('/patients/{patient}/delete', [\App\Http\Controllers\Tenant\Patients\PatientsController::class, 'destroy'])->name('destroy');
            Route::post('/patients/id_card', [\App\Http\Controllers\Tenant\Patients\PatientsController::class,'search_patient'])->name('search-patient');
        });

    });

Route::middleware('web')
    ->namespace('App\\Http\\Controllers\\Tenant\\')
    //->as('tenant.')
    ->group(function () {
        Route::get('/', [AuthenticatedSessionController::class, 'create']);
        Route::view('/test', 'test');
        require __DIR__ . "/auth.php";
    });
