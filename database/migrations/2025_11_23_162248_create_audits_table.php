<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditsTable extends Migration
{
    public function up()
    {
        Schema::create('audits', function (Blueprint $table) {
            $table->id();
            $table->string('audit_number')->unique()->index();
            $table->string('user_ip', 45)->nullable()->index();
            $table->string('domain', 255);
            $table->string('file_name')->nullable();
            $table->string('file_path')->nullable();
            $table->json('meta')->nullable(); // store small summary / parsed data
            $table->text('stdout')->nullable();
            $table->text('stderr')->nullable();
            $table->enum('status', ['pending', 'running', 'completed', 'failed'])->default('pending')->index();
            $table->boolean('include_whois')->default(false);
            $table->timestamp('started_at')->nullable();
            $table->timestamp('finished_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('audits');
    }
}
