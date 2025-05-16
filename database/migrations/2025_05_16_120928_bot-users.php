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
        Schema::table('bot_users', function (Blueprint $table) {
            $table->id();
            $table->string('ref')->nullable();
            $table->string('telegram_id')->nullable();
            $table->string('name')->nullable();
            $table->string('username')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('role')->nullable();
            $table->text('locations')->nullable(); // JSON or comma-separated
            $table->text('services')->nullable(); 
            $table->text('rates')->nullable();
            $table->json('media')->nullable();
            $table->boolean('is_banned')->default(false); 
            $table->boolean('is_onboarded')->default(false); 
            $table->boolean('is_boosted')->default(false);  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bot_users', function (Blueprint $table) {
            $table->dropColumn('ref');
            $table->dropColumn('name');
            $table->dropColumn('username');
            $table->dropColumn('is_banned');
            $table->dropColumn('is_onboarded');
            $table->dropColumn('is_boosted');
            $table->dropColumn('media');
            $table->dropColumn('telegram_id');
            $table->dropColumn('role');
            $table->dropColumn('locations');
            $table->dropColumn('services');
            $table->dropColumn('rates');
            $table->dropColumn('media');
            $table->dropColumn('phone_number');
        });
    }
};
