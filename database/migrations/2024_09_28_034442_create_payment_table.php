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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable(); // Foreign key to users table
            $table->string('reservation_id')->nullable(); // Foreign key to reservations table
            $table->string('payment_method'); // Payment method used
            $table->string('amount'); // Payment amount
            $table->string('currency', 10)->default('PHP'); // Currency of the payment
            $table->string('payment_status')->default('Pending'); // Status of the payment
            $table->string('transaction_id')->nullable(); // Transaction ID from payment gateway
            $table->timestamp('payment_date')->nullable(); // Date and time of the payment
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
