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
        Schema::table('material_const_vehiculos', function (Blueprint $table) {
            $table->string('Grueso', 100)->charset('utf8')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('material_const_vehiculos', function (Blueprint $table) {
            $table->string('Grueso', 10)->charset('utf8')->change();
        });
    }
};
