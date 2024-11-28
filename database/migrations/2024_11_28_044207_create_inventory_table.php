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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('item_name'); // Name of the inventory item
            $table->string('item_code')->unique(); // Unique code for the item (e.g., barcode or SKU)
            $table->string('category'); // Category (e.g., equipment, supplies, consumables)
            $table->integer('quantity'); // Current quantity in stock
            $table->integer('minimum_stock_level'); // Minimum quantity before reorder
            $table->text('description')->nullable(); // Description or notes about the item
            $table->decimal('purchase_price', 10, 2); // Purchase price of the item
            $table->decimal('selling_price', 10, 2)->nullable(); // Selling price if items are sold (optional)
            $table->date('purchase_date')->nullable(); // Date of purchase
            $table->date('expiry_date')->nullable(); // Expiry date for consumable items
            $table->string('supplier')->nullable(); // Supplier or vendor name
            $table->enum('status', ['in_stock', 'out_of_stock', 'ordered'])->default('in_stock'); // Item status
            $table->string('location')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
