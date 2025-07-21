<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeasiswaBaru extends Model
{
    protected $fillable = ['nama_beasiswa', 'penyelenggara', 'jenis', 'kuota', 'tahun'];

    public function pendaftarans()
    {
        return $this->hasMany(PendaftaranBeasiswa::class, 'id_beasiswa');
    }

        public function detail()
    {
        return $this->hasOne(DetailBeasiswa::class, 'beasiswa_id');
    }
}
