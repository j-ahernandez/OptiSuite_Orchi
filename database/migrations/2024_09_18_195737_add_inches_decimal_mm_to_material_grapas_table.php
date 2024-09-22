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
        Schema::table('material_grapas', function (Blueprint $table) {
            $table->integer('inches')->nullable();  // Columna 'inches' de tipo entero que permite nulos
            $table->decimal('decimal', 8, 2)->nullable();  // Columna 'decimal' de tipo decimal que permite nulos
            $table->float('mm')->nullable();  // Columna 'mm' de tipo float que permite nulos
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('material_grapas', function (Blueprint $table) {
            $table->dropColumn(['inches', 'decimal', 'mm']);  // Eliminar las columnas si se hace rollback
        });
    }
};
