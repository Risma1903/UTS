<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DetailBeasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('detail_beasiswas')->insert([
            [
                'beasiswa_id' => 1,
                'syarat' => 'Mahasiswa aktif, IPK minimal 3.50, tidak sedang menerima beasiswa lain.',
                'keuntungan' => 'Bantuan biaya pendidikan, uang saku, pelatihan kepemimpinan.',
                'kontak' => '81234567890',
                'informasi_tambahan' => 'Bersedia mengikuti program mentoring setiap bulan.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'beasiswa_id' => 2,
                'syarat' => 'Mahasiswa aktif, aktif dalam organisasi atau kegiatan sosial.',
                'keuntungan' => 'Dukungan dana proyek sosial dan pelatihan soft skill.',
                'kontak' => '89876543210',
                'informasi_tambahan' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'beasiswa_id' => 3,
                'syarat' => 'Terbuka untuk semua jurusan, minimal semester 3.',
                'keuntungan' => 'Subsidi pendidikan dan kesempatan magang.',
                'kontak' => '82112223344',
                'informasi_tambahan' => 'Wajib mengikuti seminar tahunan.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
