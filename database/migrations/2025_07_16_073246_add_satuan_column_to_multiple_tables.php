<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Tambah kolom 'satuan' ke semua tabel yang dibutuhkan
        Schema::table('atk_items', function (Blueprint $table) {
            $table->string('satuan')->after('qty');
        });

        Schema::table('barang_masuks', function (Blueprint $table) {
            $table->string('satuan')->after('qty');
        });

        Schema::table('barang_keluars', function (Blueprint $table) {
            $table->string('satuan')->after('qty');
        });

        Schema::table('requests', function (Blueprint $table) {
            $table->string('satuan')->after('qty');
        });
    }

    public function down()
    {
        // Hapus kolom jika rollback
        Schema::table('atk_items', function (Blueprint $table) {
            $table->dropColumn('satuan');
        });

        Schema::table('barang_masuks', function (Blueprint $table) {
            $table->dropColumn('satuan');
        });

        Schema::table('barang_keluars', function (Blueprint $table) {
            $table->dropColumn('satuan');
        });

        Schema::table('requests', function (Blueprint $table) {
            $table->dropColumn('satuan');
        });
    }
};