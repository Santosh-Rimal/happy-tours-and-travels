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
        Schema::create('about_trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trip_detail_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->string('title')->nullable();
            $table->longText('trip_description')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_trips');
    }
};