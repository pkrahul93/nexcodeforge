<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->constrained()->onDelete('cascade');

            // Basic item fields
            $table->string('description');
            $table->string('hsn')->nullable();          // for tax codes if needed
            $table->integer('quantity')->default(1);
            $table->decimal('unit_price', 12, 2)->default(0);
            $table->decimal('amount', 12, 2)->default(0); // quantity * unit_price

            // Optional: product SKU or reference
            $table->string('sku')->nullable();

            $table->integer('sort_order')->nullable(); // to preserve row order if user rearranges

            $table->timestamps();
        });

        // Index to speed up lookups by invoice
        Schema::table('invoice_items', function (Blueprint $table) {
            $table->index('invoice_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoice_items');
    }
};
