<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Tenant\Manager\Configuration\ProviderServiceController;
use App\Http\Controllers\Tenant\Manager\ManagerHistoryMedical\HistoryMedicalModelController;
use \App\Http\Controllers\Tenant\Manager\ManagerHistoryMedical\HistoryMedicalVariableController;
use App\Http\Controllers\Tenant\Manager\Configuration\AgreementController;
use App\Http\Controllers\Tenant\Operative\Calendar\CalendarController;
use App\Http\Controllers\Tenant\Operative\MedicalHistory\InformationMedicalHistoryController;
use App\Http\Controllers\Tenant\Operative\MedicalHistory\MedicalHistoryController;
use App\Http\Controllers\Tenant\Patients\PatientsController;
use Illuminate\Support\Facades\Route;

Route::domain('{account}.medhistoria.test')
    ->middleware('web')
    ->namespace('App\\Http\\Controllers\\Tenant\\')
    ->domain('{account?}.medhistoria.test')
    ->as('tenant.')
    ->group(function () {
        Route::get('/', function (){
            return view('medhistoria.layouts.app');
        });
    });

Route::middleware(['web', 'auth:web_tenant'])
    ->namespace('App\\Http\\Controllers\\Tenant\\')
    ->domain('{account?}.clinik-app.test')
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

            Route::get('/models-medical-history/order_by/{id}', [HistoryMedicalModelController::class, 'order_by'])
                ->name('models-medical-history.order_by')
                ->middleware('modules:manager-medical-history');

            Route::post('/models-medical-history/order_by/{id}/save', [HistoryMedicalModelController::class, 'order_by_save'])
                ->name('models-medical-history.order_by_save')
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

            Route::resource('/clinics', '\App\Http\Controllers\Tenant\Manager\Configuration\ClinicController')
                ->except(['destroy', 'show'])
                ->middleware('modules:clinics');

            Route::get('/provider-service', [ProviderServiceController::class, 'index'])
                ->name('provider-service.index')
                ->middleware('modules:provider-service');
            Route::post('/provider-service', [ProviderServiceController::class, 'update'])
                ->name('provider-service.update')
                ->middleware('modules:provider-service');
        });


        Route::group(['as' => 'operative.', 'prefix' => 'operative'], function (){

            Route::group(['middleware' => 'modules:calendar-operative', 'as' => 'calendar.'],function (){
                Route::get('/calendar/', [CalendarController::class, 'index'])->name('index');
                Route::post('/calendar/list-free-date', [CalendarController::class, 'list_free_date'])->name('list-free-date');
                Route::get('/calendar/upload-date', [CalendarController::class, 'upload_date'])->name('upload-date');

                Route::post('/calendar/create_date', [CalendarController::class, 'create_date'])->name('date-create');
                Route::get('/calendar/calc-money/{date_type}/{agreement?}', [CalendarController::class, 'calc_money'])->name('calc-money');

                Route::get('/calendar/date/{id}', [CalendarController::class, 'edit_date'])->name('edit-date');
                Route::post('/calendar/date/{date}', [CalendarController::class, 'update_date'])->name('update-date');

                Route::get('/calendar/date/{id}/cancel', [CalendarController::class, 'cancel_date'])->name('cancel-date');
                Route::delete('/calendar/date/{date}/cancel', [CalendarController::class, 'confirm_cancel_date'])->name('confirm-cancel-date');

                //Route::get('/calendar/date/{id}/reschedule', [\App\Http\Controllers\Tenant\Operative\Calendar\CalendarController::class, 'reschedule_date'])->name('reschedule-date');
                Route::post('/calendar/date/{date}/reschedule', [CalendarController::class, 'confirm_reschedule_date'])->name('confirm-reschedule-date');

                Route::get('/calendar/config-calendar', [CalendarController::class, 'config_calendar'])->name('config-calendar');
                Route::post('/calendar/config-date', [CalendarController::class, 'config_date'])->name('config-date');
                Route::post('/calendar/add-schedule', [CalendarController::class, 'add_schedule'])->name('add-schedule');
                Route::delete('/calendar/delete-schedule', [CalendarController::class, 'delete_schedule'])->name('delete-schedule');
            });

            Route::group(['middleware' => 'modules:medical-history', 'as' => 'medical-history.'],function (){
                Route::get('/medical-history/{patient}', [MedicalHistoryController::class,'index'])
                    ->name('index');
                Route::post('/medical-history/{patient}/create', [MedicalHistoryController::class,'create'])
                    ->name('create');
                Route::get('/medical-history/{patient}/register/{record}', [MedicalHistoryController::class,'register'])
                    ->name('register');
                Route::post('/medical-history/create/{record}', [MedicalHistoryController::class,'store'])
                    ->name('store');

                Route::post('/medical-history/finished/{record}', [MedicalHistoryController::class,'finished'])
                    ->name('finished');
            });

            Route::resource('/date-type', '\App\Http\Controllers\Tenant\Operative\Calendar\DateTypeController')
                ->except(['destroy', 'show'])->middleware('modules:date-types');

            Route::resource('/agreement', '\App\Http\Controllers\Tenant\Manager\Configuration\AgreementController')
                ->except(['destroy', 'show'])->middleware('modules:agreements');
            Route::get('/agreement/co-pay/{agreement}', [AgreementController::class, 'co_pay'])
                ->name('agreement.co-pay')->middleware('modules:agreements');;
            Route::post('/agreement/co-pay/{agreement}/save', [AgreementController::class, 'co_pay_save'])
                ->name('agreement.co-pay-save')->middleware('modules:agreements');;

            Route::resource('/consent', '\App\Http\Controllers\Tenant\Operative\Calendar\ConsentController')
                ->except(['destroy', 'show'])->middleware('modules:consents');

            Route::get('/information', [InformationMedicalHistoryController::class, 'index'])
                ->name('information.index');
            Route::get('/information/days-off', [InformationMedicalHistoryController::class, 'days_offs'])
                ->name('information.days_off');
            Route::get('/information/days-off-template', [InformationMedicalHistoryController::class, 'days_off_template'])
                ->name('information.days_off-template');
            Route::get('/information/prescriptions', [InformationMedicalHistoryController::class, 'prescriptions'])
                ->name('information.prescriptions');
            Route::get('/information/prescriptions-template', [InformationMedicalHistoryController::class, 'prescriptions_template'])
                ->name('information.prescriptions-template');
            Route::get('/information/procedures', [InformationMedicalHistoryController::class, 'procedures'])
                ->name('information.procedures');
            Route::get('/information/procedures-template', [InformationMedicalHistoryController::class, 'procedures_template'])
                ->name('information.procedures-template');

        });

        Route::group(['as' => 'administrative.'], function (){

            Route::group(['middleware' => 'modules:calendar-administrative', 'as' => 'calendar.'],function (){
                Route::get('/administrative/calendar/', [\App\Http\Controllers\Tenant\Administrative\Calendar\CalendarController::class, 'index'])->name('index');
            });
        });

        Route::group(['middleware' => 'modules:patients-operative', 'as' => 'patients.'],function (){
            Route::get('/patients', [PatientsController::class,'index'])->name('index');
            Route::get('/patients/create', [PatientsController::class,'create'])->name('create');
            Route::post('/patients/create', [PatientsController::class,'store'])->name('store');
            Route::get('/patients/{patient}/edit', [PatientsController::class,'edit'])->name('edit');
            Route::put('/patients/{patient}/edit', [PatientsController::class,'update'])->name('update');
            Route::delete('/patients/{patient}/delete', [PatientsController::class, 'destroy'])->name('destroy');
            Route::post('/patients/id_card', [PatientsController::class,'search_patient'])->name('search-patient');
        });

    });

Route::middleware('web')
    ->namespace('App\\Http\\Controllers\\Tenant\\')
    ->domain('{account?}.clinik-app.test')
    ->as('tenant.')
    ->group(function () {


        Route::get('/consent/{token}', [\App\Http\Controllers\Tenant\ConsentPublicController::class, 'index'])
            ->name('consent-authorization');

        Route::post('/consent-confirmation', [\App\Http\Controllers\Tenant\ConsentPublicController::class, 'confirmation'])
            ->name('consent-confirmation');

        Route::get('/media/{path}', '\Hyn\Tenancy\Controllers\MediaController')
            ->where('path', '.+')
            ->name('tenant.media');


        Route::get('/', [AuthenticatedSessionController::class, 'create']);
        Route::view('/test', 'test');
        require __DIR__ . "/auth.php";

    });
