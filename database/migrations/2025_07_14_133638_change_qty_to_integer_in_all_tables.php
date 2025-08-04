<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Table atk_items
        Schema::table('atk_items', function (Blueprint $table) {
            $table->integer('qty')->change();
        });

        // Table requests
        Schema::table('requests', function (Blueprint $table) {
            $table->integer('qty')->change();
        });

        // Table barang_masuk (jika ada)
        Schema::table('barang_masuks', function (Blueprint $table) {
            $table->integer('qty')->change();
        });

        // Table barang_keluar (jika ada)
        Schema::table('barang_keluars', function (Blueprint $table) {
            $table->integer('qty')->change();
        });
    }

    public function down(): void
    {
        // Kembalikan ke string jika perlu
        Schema::table('atk_items', function (Blueprint $table) {
            $table->string('qty')->change();
        });

        Schema::table('requests', function (Blueprint $table) {
            $table->string('qty')->change();
        });

        Schema::table('barang_masuk', function (Blueprint $table) {
            $table->string('qty')->change();
        });

        Schema::table('barang_keluar', function (Blueprint $table) {
            $table->string('qty')->change();
        });
    }
};
