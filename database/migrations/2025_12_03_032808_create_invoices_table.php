<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            // Unique invoice number for human reference
            $table->string('number')->unique();

            // Optional link to a user/customer record if you have users table
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            // Customer details (denormalized for snapshotting)
            $table->string('customer_name');
            $table->string('customer_email')->nullable();
            $table->string('customer_phone')->nullable();
            $table->text('customer_address')->nullable();

            // Dates
            $table->date('issue_date');
            $table->date('due_date')->nullable();

            // Totals
            $table->decimal('subtotal', 12, 2)->default(0);
            $table->decimal('tax', 12, 2)->default(0);
            $table->decimal('discount', 12, 2)->default(0);
            $table->decimal('total', 12, 2)->default(0);

            // Status (draft, sent, paid, cancelled)
            $table->string('status')->default('draft');

            // Currency & payment info (optional)
            $table->string('currency', 8)->default('INR'); // adjust as required
            $table->text('notes')->nullable();

            // If you plan to store generated PDF path
            $table->string('pdf_path')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
