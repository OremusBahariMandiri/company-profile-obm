<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Rename kolom menggunakan raw SQL untuk kompatibilitas MariaDB/MySQL
        DB::statement('ALTER TABLE `our_activities` CHANGE `photo_1` `photo` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL');

        DB::statement('ALTER TABLE `our_activities` CHANGE `title_photo_1` `title` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL');

        // Hapus kolom yang tidak diperlukan
        Schema::table('our_activities', function (Blueprint $table) {
            $table->dropColumn(['photo_2', 'title_photo_2']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Kembalikan perubahan nama kolom
        DB::statement('ALTER TABLE `our_activities` CHANGE `photo` `photo_1` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL');

        DB::statement('ALTER TABLE `our_activities` CHANGE `title` `title_photo_1` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL');

        // Tambahkan kembali kolom yang dihapus
        Schema::table('our_activities', function (Blueprint $table) {
            $table->string('photo_2', 255)->nullable();
            $table->string('title_photo_2', 255)->nullable();
        });
    }
};