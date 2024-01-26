<?php

namespace M15\LaraGroups;

use Illuminate\Support\ServiceProvider;

class GroupServiceProvider extends ServiceProvider {
    public function boot() {
        // Esegui le migrazioni del database
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    public function register() {
        // Registra i servizi, se necessario
    }
}