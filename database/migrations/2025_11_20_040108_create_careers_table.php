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
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('careers_name');
            $table->string('description');
            $table->string('position');
            $table->string('working_area');
            $table->string('spesification_1');
            $table->string('spesification_2');
            $table->string('spesification_3');
            $table->string('spesification_4');
            $table->string('spesification_5');
            $table->string('spesification_6');
            $table->string('spesification_7');
            $table->string('spesification_8');
            $table->string('spesification_9');
            $table->string('spesification_10');
            $table->string('photo');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('sallary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
