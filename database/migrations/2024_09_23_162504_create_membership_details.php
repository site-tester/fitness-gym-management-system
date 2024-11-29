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
        Schema::create('membership_details', function (Blueprint $table) {
            $table->id();
            $table->string('client_id');
            $table->string('rfid_number')->nullable();
            $table->string('phone');
            $table->string('address');
            $table->date('birthdate');
            $table->string('medical_info');
            $table->string('height');
            $table->string('weight');
            $table->string('civil_status');
            $table->string('gender');
            $table->string('guardian');
            $table->string('membership_type')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership_details');
    }
};
