<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use \App\Http\Controllers\Tenant\Manager\ManagerHistoryMedical\HistoryMedicalVariableController;
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

        Route::group(['as' => 'manager.', 'prefix' => 'manager'], function (){

            Route::resource('/users', '\App\Http\Controllers\Tenant\Manager\User\UsersController')
                ->except(['destroy', 'show'])->middleware('modules:users');

            Route::get('/users/roles/{id}', [\App\Http\Controllers\Tenant\Manager\User\UsersController::class, 'roles'])
                ->name('users.roles')
                ->middleware('modules:users');

            Route::post('/users/roles/{user}/save', [\App\Http\Controllers\Tenant\Manager\User\UsersController::class, 'roles_save'])
                ->name('users.roles-save')
                ->middleware('modules:users');

            Route::resource('/models-medical-history', '\App\Http\Controllers\Tenant\Manager\ManagerHistoryMedical\HistoryMedicalModelController')
                ->except(['destroy', 'show'])
                ->middleware('modules:manager-medical-history');

            Route::resource('/history-medical-categories', '\App\Http\Controllers\Tenant\Manager\ManagerHistoryMedical\HistoryMedicalCategoryController')
                ->parameter('history_medical_category', 'category')
                ->except(['destroy', 'show'])
                ->middleware('modules:manager-medical-history');

            Route::get('/history-medical-variables', [HistoryMedicalVariableController::class, 'index'])
                ->name('history-medical-variables.index')
                ->middleware('modules:manager-medical-history');

            Route::get('/history-medical-variables/create/{type}', [HistoryMedicalVariableController::class, 'create'])
                ->name('history-medical-variables.create')
                ->middleware('modules:manager-medical-history');

            Route::post('/history-medical-variables/create/{type}', [HistoryMedicalVariableController::class, 'store'])
                ->name('history-medical-variables.store')
                ->middleware('modules:manager-medical-history');

            Route::get('/history-medical-variables/{variable}/edit', [HistoryMedicalVariableController::class, 'edit'])
                ->name('history-medical-variables.edit')
                ->middleware('modules:manager-medical-history');

            Route::put('/history-medical-variables/{variable}', [HistoryMedicalVariableController::class, 'update'])
                ->name('history-medical-variables.update')
                ->middleware('modules:manager-medical-history');

        });


        Route::group(['as' => 'operative.', 'prefix' => 'operative'], function (){

            Route::group(['middleware' => 'modules:calendar-operative', 'as' => 'calendar.'],function (){
                Route::get('/calendar/', [\App\Http\Controllers\Tenant\Operative\Calendar\CalendarController::class, 'index'])->name('index');
                Route::post('/calendar/list-free-date', [\App\Http\Controllers\Tenant\Operative\Calendar\CalendarController::class, 'list_free_date'])->name('list-free-date');
                Route::get('/calendar/upload-date', [\App\Http\Controllers\Tenant\Operative\Calendar\CalendarController::class, 'upload_date'])->name('upload-date');

                Route::post('/calendar/create_date', [\App\Http\Controllers\Tenant\Operative\Calendar\CalendarController::class, 'create_date'])->name('date-create');
                Route::get('/calendar/calc-money/{date_type}/{agreement?}', [\App\Http\Controllers\Tenant\Operative\Calendar\CalendarController::class, 'calc_money'])->name('calc-money');

                Route::get('/calendar/date/{id}', [\App\Http\Controllers\Tenant\Operative\Calendar\CalendarController::class, 'edit_date'])->name('edit-date');
                Route::post('/calendar/date/{date}', [\App\Http\Controllers\Tenant\Operative\Calendar\CalendarController::class, 'update_date'])->name('update-date');

                Route::get('/calendar/date/{id}/cancel', [\App\Http\Controllers\Tenant\Operative\Calendar\CalendarController::class, 'cancel_date'])->name('cancel-date');
                Route::delete('/calendar/date/{date}/cancel', [\App\Http\Controllers\Tenant\Operative\Calendar\CalendarController::class, 'confirm_cancel_date'])->name('confirm-cancel-date');

                //Route::get('/calendar/date/{id}/reschedule', [\App\Http\Controllers\Tenant\Operative\Calendar\CalendarController::class, 'reschedule_date'])->name('reschedule-date');
                Route::post('/calendar/date/{date}/reschedule', [\App\Http\Controllers\Tenant\Operative\Calendar\CalendarController::class, 'confirm_reschedule_date'])->name('confirm-reschedule-date');

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
