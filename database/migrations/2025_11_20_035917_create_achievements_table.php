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
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('icon_title_1');
            $table->string('title_1');
            $table->string('description_1');
            $table->string('icon_title_2');
            $table->string('title_2');
            $table->string('description_2');
            $table->string('photo_1');
            $table->string('icon_title_3');
            $table->string('title_3');
            $table->string('description_3');
            $table->string('icon_title_4');
            $table->string('title_4');
            $table->string('description_4');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
