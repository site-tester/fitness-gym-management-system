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
        Schema::create('trainer_details', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('gender');
            $table->string('date_of_birth');
            $table->string('contact_number');
            $table->text('address')->nullable();
            $table->string('trainer_type');
            $table->integer('experience_years');
            $table->json('availability');
            $table->date('hire_date');
            $table->enum('status', ['active', 'on_leave', 'retired']);
            $table->enum('contract_type', ['full-time', 'part-time', 'contract']);
            $table->decimal('average_rating', 2, 1)->default(0.0);
            $table->string('profile_picture')->nullable();
            $table->text('bio')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainer_details');
    }
};
