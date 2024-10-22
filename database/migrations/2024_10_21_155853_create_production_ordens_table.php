<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('production_ordens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idDescriptionParts');  // Clave foránea
            $table->string('description', 255)->nullable();  // Descripción, permitiendo nulos
            $table->integer('quantity');  // Cantidad a producir
            $table->unsignedBigInteger('status_id')->default(1);  // Clave foránea para el estado con valor predeterminado
            $table->date('production_date');  // Campo para la fecha de producción, permitiendo nulos
            $table->timestamps();

            // Relación con description_parts
            $table->foreign('idDescriptionParts')->references('id')->on('description_parts')->onDelete('cascade');

            // Relación con statuses
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('production_ordens');
    }
};
