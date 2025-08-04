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
        Schema::create('trip_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->string('trip_name')->nullable();
            $table->string('trip_slug')->nullable();
            $table->string('destination')->nullable();
            $table->string('trip_style')->nullable(); // changed from date to string
            $table->string('food')->nullable();
            $table->string('transportation')->nullable();
            $table->string('accommodation')->nullable();
            $table->string('group_size')->nullable();
            $table->string('trip_duration')->nullable();
            $table->string('trip_difficulty')->nullable();
            $table->string('trip_price')->nullable();
            $table->string('max_elevation')->nullable();
            $table->longText('trip_description')->nullable();
            $table->string('sliderimage')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_details');
    }
};
