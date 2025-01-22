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
        Schema::create('cek_data', function (Blueprint $table) {
            $table->id();
            $table->enum('status_seleksi', ['diterima', 'ditolak', 'pending']);
            $table->text('catatan')->nullable();
            $table->unsignedBigInteger('pendaftar_id');
            $table->timestamps();
        });

        Schema::table('cek_data', function (Blueprint $table) {
            $table->foreign('pendaftar_id')->references('id')->on('pendaftar')->onUpdate('cascade')->onDelete('cascade');
  
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cek_data', function (Blueprint $table) {
            $table->dropForeign('cek_data_pendaftar_id_foreign');
        });

        Schema::table('cek_data', function (Blueprint $table) {
            $table->dropIndex('cek_data_pendaftar_id_foreign');
        });

        Schema::dropIfExists('cek_data');
    }
};
