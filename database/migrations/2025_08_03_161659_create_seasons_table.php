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
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
             $table->string('category'); // e.g., 'peak_seasons', 'other_seasons'
             $table->string('name'); // e.g., 'Autumn', 'Winter'
             $table->string('months'); // e.g., 'Sep-Nov', 'Dec-Feb'
             $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seasons');
    }
};