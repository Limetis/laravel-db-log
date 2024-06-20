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
        Schema::create('logs', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('event')->index();
            $table->string('event_id')->index();
            $table->string('eshop_id')->index();
            $table->string('request_id')->index();
            $table->longText('message');
            $table->longText('context')->nullable();
            $table->longText('payload')->nullable();
            $table->string('level');
            $table->string('channel');
            $table->longText('extra')->nullable();
            $table->string('remote_addr')->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
