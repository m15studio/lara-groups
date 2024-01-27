<?php

namespace M15Studio\LaraGroups;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use M15Studio\LaraGroups\Livewire\Gruppo\FormNuovoGruppo;
use M15Studio\LaraGroups\Livewire\Gruppo\GruppiTable;

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
        $this->publishes([
            $sourceViewsPath => resource_path('views/vendor/m15studio/lara-groups'),
        ]);

        if (class_exists(Livewire::class)) {
            Livewire::component('gruppo.gruppi-table', GruppiTable::class);
            Livewire::component('gruppo.form-nuovo-gruppo', FormNuovoGruppo::class);
        }

    }

    public function register() {
        // Registra i servizi, se necessario
    }
}