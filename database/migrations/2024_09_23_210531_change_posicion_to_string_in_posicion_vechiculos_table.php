<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posicion_vechiculos', function (Blueprint $table) {
            // Cambia la columna 'posicion' de tipo integer a string
            $table->string('posicion')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posicion_vechiculos', function (Blueprint $table) {
            // Revertir la columna 'posicion' de nuevo a integer
            $table->integer('posicion')->change();
        });
    }
};