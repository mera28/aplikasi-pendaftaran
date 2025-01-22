<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('pendaftar', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('alamat');
        $table->string('nomor_telepon');
        $table->date('tanggal_lahir');
        $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
        $table->integer('tinggi_badan');
        $table->integer('berat_badan');
        $table->text('prestasi')->nullable();
        $table->string('foto')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftars');
    }
};
