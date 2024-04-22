<?php

use AmuzThemes\ApplicationInstall\Http\Controllers\AppInstallController;
use Illuminate\Support\Facades\Route;

Route::name('install.')
    ->prefix('install')
    ->controller(AppInstallController::class)
    ->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/ios', 'ios')->name('ios');
        Route::get('/android', 'android')->name('android');
    });
