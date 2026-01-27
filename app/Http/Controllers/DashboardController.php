<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aset;
use App\Models\KategoriAset;
use App\Models\Lokasi;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung data untuk ditampilkan di dashboard
        $totalAset = Aset::count();
        $totalKategori = KategoriAset::count();
        $totalLokasi = Lokasi::count();

        return view('dashboard', compact('totalAset', 'totalKategori', 'totalLokasi'));
    }
}
