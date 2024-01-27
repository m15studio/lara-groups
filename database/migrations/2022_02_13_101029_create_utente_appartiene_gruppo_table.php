<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('utente_appartiene_gruppo', function (Blueprint $table) {
            //  $table->id();
            $table->primary(['user_id', 'gruppo_id']);
            $table->foreignId('user_id')->constrained(
                'users', 'id'
            );
            $table->foreignId('gruppo_id')->constrained(
                'gruppo', 'id_gruppo'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('utente_appartiene_gruppo');
    }
};