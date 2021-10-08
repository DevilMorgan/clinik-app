<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth:web_tenant'])
    ->namespace('App\Http\Controllers\Tenant')
    //->as('tenant.')
    ->group(function ()
    {
        Route::get('/user', function (){
            dd(\App\Models\Tenant\User::all());
        });
        Route::get('/home', [\App\Http\Controllers\Tenant\HomeController::class, 'index'])->name('home');
        Route::get('/dashboard', [\App\Http\Controllers\Tenant\HomeController::class, 'dashboard'])->name('dashboard');

    });

Route::namespace('App\Http\Controllers\Tenant')
    ->middleware('web')
    ->group(function () {
        Route::get('/', [\App\Http\Controllers\Tenant\HomeController::class, 'index']);
        Route::get('/permission', [\App\Http\Controllers\Tenant\HomeController::class, 'permission']);
        require __DIR__.'/auth.php';
    });
