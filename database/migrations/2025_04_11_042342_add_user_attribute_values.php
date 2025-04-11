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
            $table->text('bio')->nullable();
            $table->string('gender')->nullable();
            $table->boolean('is_claimed')->default(true);
            $table->string('phone_number')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('telegram_number')->nullable();
            $table->string('address')->nullable();
            $table->string('nationality')->nullable();
            $table->string('orientation')->nullable();
            $table->string('languages')->nullable();
            $table->string('body_type')->nullable();
            $table->string('height')->nullable();
            $table->date('dob')->nullable();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('bio');
            $table->dropColumn('gender');
            $table->dropColumn('phone_number');
            $table->dropColumn('is_claimed');
            $table->dropColumn('whatsapp_number');
        });
    }
};
