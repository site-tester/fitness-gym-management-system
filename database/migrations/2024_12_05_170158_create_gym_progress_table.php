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
        Schema::create('gym_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Links progress to a client
            $table->string('workout_name');
            $table->date('progress_date');
            $table->string('height')->nullable(); // Client's height
            $table->string('height_raw')->nullable(); // Raw height value
            $table->string('height_raw_unit')->nullable(); // Unit of height (e.g., cm, ft)
            $table->string('weight')->nullable(); // Client's weight
            $table->string('weight_raw')->nullable(); // Raw weight value
            $table->string('weight_raw_unit')->nullable(); // Unit of weight (e.g., kg, lb)
            $table->integer('reps')->nullable(); // Example: reps for a specific exercise
            $table->string('bmi')->nullable(); // BMI calculation
            $table->text('notes')->nullable(); // Additional notes about the session
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gym_progress');
    }
};
