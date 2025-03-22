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
        Schema::create('adoptions', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('current_address');
            $table->string('purok_street');
            $table->string('barangay');
            $table->string('city_province');
            $table->string('email');
            $table->string('phone_number');
            $table->integer('age');
            $table->string('gender');
            $table->string('user_id')->nullable();
            $table->string('pet_name');
            $table->string('pet_id');
            $table->string('breed');
            $table->string('color');
            $table->integer('pet_age');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adoptions');
    }
};
