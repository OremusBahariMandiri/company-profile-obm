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
        Schema::table('careers', function (Blueprint $table) {
            $table->string('contact_phone')->after('photo');
            $table->string('contact_email')->after('contact_phone');
            $table->string('status')->after('contact_email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('volunteer', function (Blueprint $table) {
            $table->string('contact_phone')->after('photo');
            $table->string('contact_email')->after('contact_phone');
            $table->string('status')->after('contact_email');
        });
    }
};
