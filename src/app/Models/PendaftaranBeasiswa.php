<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendaftaranBeasiswa extends Model
{
    protected $fillable = ['id_mahasiswa', 'id_beasiswa', 'tanggal_daftar', 'status', 'nilai_akademik'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }

    public function beasiswa()
    {
        return $this->belongsTo(BeasiswaBaru::class, 'id_beasiswa');
    }
}
