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
        Schema::create('workout_guides', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('target_muscle_group');
            $table->string('excercise_type');
            $table->string('equipment_required');
            $table->string('mechanics');
            $table->string('force_type');
            $table->string('experience_level');
            $table->string('video_url');
            $table->string('copyright')->nullable();
            $table->longText('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workout_guides');
    }
};
