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
        Schema::create('material_grapas', function (Blueprint $table) {
            $table->id();
            $table->string('inches', 15)->nullable()->change();;  // Esto creará un VARCHAR(255)
            $table->string('decimal', 15)->nullable()->change();;  // Esto creará un VARCHAR(255)
            $table->string('mm', 15)->nullable()->change();  // Esto creará un VARCHAR(255)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_grapas');
    }
};
