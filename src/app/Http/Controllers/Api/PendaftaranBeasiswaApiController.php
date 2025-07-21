<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendaftaranBeasiswaApiController extends Controller
{
    public function index(Request $request)
    {
        // Asumsikan mahasiswa sudah terautentikasi dan disimpan di request
        $mahasiswa = $request->get('authenticated_mahasiswa');
        
        // Ambil pendaftaran beasiswa milik mahasiswa ini dengan relasi beasiswa
        $pendaftaran = $mahasiswa->pendaftaranBeasiswa()->with('beasiswa')->get();

        $responseData = [
            'message' => 'Success',
            'data' => $pendaftaran,
        ];

        // Contoh encrypt jika perlu
        $encryptedResponse = EncryptionHelper::encrypt(json_encode($responseData));

        return response()->json(['data' => $encryptedResponse]);
    }

    public function store(Request $request)
    {
        $mahasiswa = $request->get('authenticated_mahasiswa');

        $validated = $request->validate([
            'id_beasiswa' => 'required|exists:beasiswa,id',
            'tanggal_daftar' => 'required|date',
            'status' => 'required|in:Diterima,Ditolak,Diproses',
            'nilai_akademik' => 'nullable|numeric|max:100',
        ]);

        try {
            $pendaftaran = PendaftaranBeasiswa::create([
                'id_mahasiswa' => $mahasiswa->id,
                'id_beasiswa' => $validated['id_beasiswa'],
                'tanggal_daftar' => $validated['tanggal_daftar'],
                'status' => $validated['status'],
                'nilai_akademik' => $validated['nilai_akademik'],
            ]);

            $responseData = [
                'message' => 'Pendaftaran berhasil dibuat',
                'data' => $pendaftaran,
            ];

            $encryptedResponse = EncryptionHelper::encrypt(json_encode($responseData));

            return response()->json(['data' => $encryptedResponse]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Gagal menyimpan pendaftaran: ' . $e->getMessage(),
            ], 500);
        }
    }
}
