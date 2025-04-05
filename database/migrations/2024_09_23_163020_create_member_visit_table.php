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
        Schema::create('timelogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_rfid_id');
            $table->string('client_name')->nullable();
            $table->date('timelog_date')->nullable();
            $table->timestamp('time_in')->nullable();
            $table->timestamp('time_out')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            // $table->foreign('client_rfid_id')
            //       ->references('rfid_number')
            //       ->on('users')
            //       ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('timelogs', function (Blueprint $table) {
            $table->dropForeign(['client_rfid_id']);
        });

        Schema::dropIfExists('timelogs');
    }
};
