<?php

use AmuzThemes\ApplicationInstall\Http\Controllers\AppInstallController;
use Illuminate\Support\Facades\Route;

Route::name('application-install.')
    ->prefix(config('application-install.route.prefix'))
    ->controller(AppInstallController::class)
    ->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/releases', 'releases')->name('releases');
        Route::get('/ios', 'ios')->name('ios');
        Route::get('/android', 'android')->name('android');
    });
