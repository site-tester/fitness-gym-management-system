<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('equipment_inventories', function (Blueprint $table) {
            $table->id();
            $table->string('equipment_name');
            $table->string('category');
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->integer('quantity')->default(1);
            $table->string('location')->nullable();
            $table->date('purchase_date')->nullable();
            $table->date('warranty_expiry_date')->nullable();
            $table->enum('condition', ['new', 'good', 'needs_repair', 'out_of_order'])->default('new');
            $table->date('last_maintenance_date')->nullable();
            $table->json('maintenance_schedule')->nullable();
            $table->text('maintenance_notes')->nullable();
            $table->decimal('cost_per_unit', 10, 2)->nullable();
            $table->decimal('total_cost', 10, 2)->nullable();
            $table->string('supplier_name')->nullable();
            $table->enum('usage_frequency', ['high', 'medium', 'low'])->default('medium');
            $table->text('remarks')->nullable();
            $table->foreignId('added_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment_inventories');
    }
};
