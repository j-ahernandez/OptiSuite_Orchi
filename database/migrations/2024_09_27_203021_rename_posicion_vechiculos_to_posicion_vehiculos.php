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
        Schema::table('posicion_vehiculos', function (Blueprint $table) {
            Schema::rename('posicion_vechiculos', 'posicion_vehiculos');  // Renombrar la tabla
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posicion_vehiculos', function (Blueprint $table) {
            Schema::rename('posicion_vehiculos', 'posicion_vechiculos');  // Deshacer el cambio
        });
    }
};