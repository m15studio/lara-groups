<?php

namespace M15Studio\LaraGroups;

use Illuminate\Support\ServiceProvider;

class GroupServiceProvider extends ServiceProvider {
    public function boot() {
        // Esegui le migrazioni del database

        $this->publishes([
            __DIR__ . '/../database/migrations' => database_path('migrations'),
        ], 'm15studio');

        $this->loadRoutesFrom(__DIR__ . '/../routes/routes.php');
        // Views
        $sourceViewsPath = __DIR__ . '/../resources/views';
        $this->loadViewsFrom($sourceViewsPath, 'm15studio');

        if (class_exists(Livewire::class)) {
            Livewire::component('gruppo.gruppi-table', Gruppo\GruppiTable::class);
        }

    }

    public function register() {
        // Registra i servizi, se necessario
    }
}