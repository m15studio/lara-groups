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
        Schema::create('gruppo', function (Blueprint $table) {
            $table->id('id_gruppo');
            $table->timestamps();
            $table->string("gruppo_nome");
            $table->string("gruppo_slug");
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('gruppo');
    }
};