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
        Schema::create('pendaftaran_beasiswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mahasiswa')->constrained('mahasiswas')->onDelete('cascade');
            $table->foreignId('id_beasiswa')->constrained('beasiswa_barus')->onDelete('cascade');
            $table->date('tanggal_daftar');
            $table->enum('status', ['Diterima', 'Ditolak', 'Diproses'])->default('Diproses');
            $table->decimal('nilai_akademik', 4, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_beasiswas');
    }
};
