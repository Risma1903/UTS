<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PendaftaranBeasiswaApiController;

    Route::get('/daftarBeasiswa', [PendaftaranBeasiswaApiController::class, 'index']);

