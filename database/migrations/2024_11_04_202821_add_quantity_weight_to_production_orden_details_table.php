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
        Schema::table('production_orden_details', function (Blueprint $table) {
            $table->decimal('quantity_weight', 8, 2)->nullable()->after('quantity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('production_orden_details', function (Blueprint $table) {
            $table->dropColumn('quantity_weight');
        });
    }
};
