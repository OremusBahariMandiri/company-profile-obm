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
        Schema::create('spam_detections', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address');
            $table->integer('attempts')->default(1);
            $table->timestamp('blocked_until')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->string('user_agent')->nullable();
            $table->json('request_data')->nullable();
            $table->timestamps();

            $table->index('ip_address');
            $table->index('blocked_until');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spam_detections');
    }
};