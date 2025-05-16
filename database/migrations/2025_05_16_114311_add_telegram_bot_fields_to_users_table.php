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
            //
            $table->string('telegram_id')->nullable();
            $table->string('role')->nullable();
            $table->text('locations')->nullable(); // JSON or comma-separated
            $table->text('services')->nullable(); 
            $table->text('rates')->nullable();
            $table->json('media')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('telegram_id');
            $table->dropColumn('role');
            $table->dropColumn('locations');
            $table->dropColumn('services');
            $table->dropColumn('rates');
            $table->dropColumn('media');
        });
    }
};
