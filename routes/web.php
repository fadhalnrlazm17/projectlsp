<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriAsetController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\MutasiAsetController;

// 1. Jalur Tamu (Guest) - Hanya bisa diakses kalau belum login
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// 2. Jalur Member (Auth) - Harus login dulu baru bisa masuk
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Fitur Utama (Otomatis bikin jalur index, create, store, edit, update, destroy)
    Route::resource('kategori', KategoriAsetController::class);
    Route::resource('lokasi', LokasiController::class);
    Route::resource('aset', AsetController::class);
    Route::resource('mutasi', MutasiAsetController::class);
});
