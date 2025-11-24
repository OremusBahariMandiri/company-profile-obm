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
        Schema::create('director_welcome', function (Blueprint $table) {
            $table->id();
            $table->string('title_highlight');
            $table->string('content_1');
            $table->string('content_2');
            $table->string('content_3');
            $table->string('content_4');
            $table->string('director_name');
            $table->string('director_photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('director_welcome');
    }
};
