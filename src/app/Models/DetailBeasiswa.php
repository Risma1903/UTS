<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailBeasiswa extends Model
{
    protected $table = 'detail_beasiswas';

    protected $fillable = [
        'beasiswa_id',
        'syarat',
        'keuntungan',
        'kontak',
        'informasi_tambahan',
    ];

    public function beasiswa()
    {
        return $this->belongsTo(BeasiswaBaru::class, 'beasiswa_id');
    }
}
