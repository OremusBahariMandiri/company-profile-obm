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
        Schema::create('main_content', function (Blueprint $table) {
            $table->id();
            $table->string('title_1');
            $table->string('subtitle_1');
            $table->string('photo_1');
            $table->string('title_2');
            $table->string('subtitle_2');
            $table->string('photo_2');
            $table->string('title_3');
            $table->string('subtitle_3');
            $table->string('photo_3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_content');
    }
};
