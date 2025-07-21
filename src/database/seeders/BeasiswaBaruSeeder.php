<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class BeasiswaBaruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('beasiswa_barus')->insert([
            [
                'nama_beasiswa' => 'Beasiswa Unggulan',
                'penyelenggara' => 'Kementerian Pendidikan',
                'jenis' => 'Akademik',
                'kuota' => 100,
                'tahun' => 2025,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_beasiswa' => 'Beasiswa Kreatif',
                'penyelenggara' => 'Yayasan Cerdas',
                'jenis' => 'Non-Akademik',
                'kuota' => 50,
                'tahun' => 2024,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_beasiswa' => 'Beasiswa Umum',
                'penyelenggara' => 'Universitas Esa Unggul',
                'jenis' => 'Akademik',
                'kuota' => 200,
                'tahun' => 2025,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    
    }
}
