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
            $table->decimal('weight', 5, 2)->nullable(); // Client's weight
            $table->integer('reps')->nullable(); // Example: reps for a specific exercise
            $table->decimal('bmi', 5, 2)->nullable(); // BMI calculation
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