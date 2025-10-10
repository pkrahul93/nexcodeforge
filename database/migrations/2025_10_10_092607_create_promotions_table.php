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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->nullable();
            $table->text('content')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->integer('timer')->default(0); // seconds to auto-close
            $table->boolean('status')->default(0); // 0 = inactive, 1 = active

            // 👇 New fields for interval and scheduling control
            $table->integer('show_interval')->default(24); // in hours — e.g. 24 = show once a day
            $table->dateTime('start_date')->nullable(); // When promotion becomes visible
            $table->dateTime('end_date')->nullable();   // When promotion should stop showing

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
