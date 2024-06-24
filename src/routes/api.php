<?php

use AmuzThemes\ApplicationInstall\Http\Controllers\AppInstallController;
use Illuminate\Support\Facades\Route;

Route::name('application-install.')
    ->controller(AppInstallController::class)
    ->group(function(){
        Route::get('/check-update', 'checkUpdate')->name('check.update');
    });
