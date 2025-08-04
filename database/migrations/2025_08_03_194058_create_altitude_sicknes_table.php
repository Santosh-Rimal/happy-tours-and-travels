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
        
        Schema::create('altitude_sicknes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->json('mild_symptoms');
            $table->json('severe_symptoms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('altitude_sicknes');
    }
};