<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('incall')->default(true);
            $table->boolean('outcall')->default(true);
            // $$table->foreignId('country_id')->constrained()->onDelete('set null');
            // $table->foreignId('city_id')->constrained()->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('incall');
            $table->dropColumn('outcall');
            // $table->dropColumn('country_id');
            // $table->dropColumn('city_id');
        });
    }
};
