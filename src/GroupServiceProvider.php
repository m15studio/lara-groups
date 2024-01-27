<?php

namespace M15Studio\LaraGroups;

use Illuminate\Support\ServiceProvider;

class GroupServiceProvider extends ServiceProvider {
    public function boot() {
        // Esegui le migrazioni del database

        $this->publishes([
            __DIR__ . '/../databases/migrations' => database_path('migrations'),
        ], 'migrations');
    }

    public function register() {
        // Registra i servizi, se necessario
    }
}