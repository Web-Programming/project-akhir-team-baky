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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id()->primary;
            $table->bigInteger('id_peminjam')->unsigned();
            $table->foreign('id_peminjam')->references('id_anggota')->on('anggota')->onDelete('cascade');
            $table->bigInteger('id_buku')->unsigned();
            $table->foreign('id_buku')->references('id')->on('buku')->onDelete('cascade');
            $table->integer('status')->nullable();
            $table->date('tgl_pinjam');
            $table->date('tgl_wajib_kembali')->nullable();
            $table->integer('denda')->nullable();
            $table->date('tgl_kembali')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
