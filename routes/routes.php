<?php
use Illuminate\Support\Facades\Route;
use M15Studio\LaraGroups\Controllers\GruppoController;

Route::middleware(['auth', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/gruppo/dashboard', [GruppoController::class, 'index'])->name('gruppo-dashboard');
    Route::get('/gruppo/{id_gruppo}', [GruppoController::class, 'show'])->name('gruppo-scheda');
});