<?php
use Illuminate\Support\Facades\Route;
use M15Studio\LaraGroups\Controllers\GruppoController;

Route::middleware(['auth:sanctum', 'verified', 'locale'])->group(function () {
    Route::controller(GruppoController::class)->group(function () {
        Route::get('/gruppo/dashboard', 'index')->name('gruppo-dashboard');
        Route::get('/gruppo/{lotto}', 'show')->name('gruppo-scheda');
    });
});