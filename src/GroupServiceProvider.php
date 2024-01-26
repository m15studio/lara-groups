<?php

namespace M15;

use Illuminate\Support\ServiceProvider;

class GroupServiceProvider extends ServiceProvider {
    public function boot() {
        // Esegui le migrazioni del database
        $this->loadMigrationsFrom(__DIR__ . '/path/to/migrations');
    }

    public function register() {
        // Registra i servizi, se necessario
    }
}