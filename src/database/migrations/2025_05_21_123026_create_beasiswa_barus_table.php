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
        Schema::create('beasiswa_barus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_beasiswa');
            $table->string('penyelenggara');
            $table->enum('jenis', ['Akademik', 'Non-Akademik', 'Lain']);
            $table->integer('kuota');
            $table->year('tahun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beasiswa_barus');
    }
};
