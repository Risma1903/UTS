<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswas';
    protected $fillable = ['nama', 'nim', 'fakultas', 'prodi', 'email'];

    public function pendaftarans()
    {
        return $this->hasMany(PendaftaranBeasiswa::class, 'id_mahasiswa');
    }
}
