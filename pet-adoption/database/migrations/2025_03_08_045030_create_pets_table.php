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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('species');
            $table->string('other_species')->nullable();
            $table->string('breed')->nullable();
            $table->integer('age');
            $table->string('color_markings');
            $table->string('sex');
            $table->string('health_status');
            $table->string('neutered_spayed');
            $table->string('adoption_status'); // Ensure this column is defined
            $table->date('date_added');
            $table->string('pet_image')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};