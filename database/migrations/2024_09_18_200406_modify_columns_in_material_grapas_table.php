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
            $table->string('inches', 10)->nullable()->change();
            $table->string('decimal', 10)->nullable()->change();
            $table->string('mm', 10)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('material_grapas', function (Blueprint $table) {
            $table->integer('inches')->nullable()->change();
            $table->decimal('decimal', 8, 2)->nullable()->change();
            $table->float('mm')->nullable()->change();
        });
    }
};
