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
        //Home
        Route::get('/home', [\App\Http\Controllers\Tenant\HomeController::class, 'index'])->name('home');

        Route::as('operative.')->group(function (){
            Route::get('/operative/calendar/', [\App\Http\Controllers\Tenant\Operative\Calendar\CalendarController::class, 'index'])->name('calendar');
            Route::post('/operative/calendar/list-free-date', [\App\Http\Controllers\Tenant\Operative\Calendar\CalendarController::class, 'list_free_date'])->name('list-free-date');
            Route::post('/operative/calendar/create_date', [\App\Http\Controllers\Tenant\Operative\Calendar\CalendarController::class, 'create_date'])->name('date-create');
        });
    });

Route::middleware('web')
    ->namespace('App\\Http\\Controllers\\Tenant\\')
    //->as('tenant.')
    ->group(function () {
        Route::get('/', [AuthenticatedSessionController::class, 'create']);
        Route::view('/users', 'tenant/layouts/app');
        Route::get('/usuario', function (){
            return response(\App\Models\Tenant\User::all(), 205);
        });

        require __DIR__ . "/auth.php";
    });
