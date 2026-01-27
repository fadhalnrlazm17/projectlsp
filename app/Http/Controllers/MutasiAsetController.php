<?php

namespace App\Http\Controllers;

use App\Models\MutasiAset;
use App\Models\Aset;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MutasiAsetController extends Controller
{
    // 1. TAMPILKAN RIWAYAT MUTASI
    public function index()
    {
        // Kita ambil data mutasi beserta relasinya agar nama aset/lokasi muncul
        $mutasi = MutasiAset::with(['aset', 'lokasiAsal', 'lokasiTujuan', 'user'])->latest()->get();
        return view('mutasi.index', compact('mutasi'));
    }

    // 2. FORM MUTASI
    public function create()
    {
        // Kita butuh data aset (untuk dipilih) dan lokasi (tujuan)
        $aset = Aset::with('lokasi')->get();
        $lokasi = Lokasi::all();

        return view('mutasi.create', compact('aset', 'lokasi'));
    }

    // 3. PROSES SIMPAN MUTASI (BAGIAN PALING PENTING)
    public function store(Request $request)
    {
        $request->validate([
            'aset_id' => 'required',
            'lokasi_tujuan_id' => 'required',
            'keterangan' => 'nullable|string'
        ]);

        // 1. Ambil data aset yang dipilih
        $aset = Aset::findOrFail($request->aset_id);

        // Cek: Jangan sampai memindahkan ke lokasi yang sama
        if ($aset->lokasi_id == $request->lokasi_tujuan_id) {
            return back()->withErrors(['lokasi_tujuan_id' => 'Lokasi tujuan tidak boleh sama dengan lokasi asal!']);
        }

        // 2. Catat di tabel riwayat (mutasi_aset)
        MutasiAset::create([
            'aset_id' => $aset->id,
            'lokasi_asal_id' => $aset->lokasi_id, // Lokasi lama
            'lokasi_tujuan_id' => $request->lokasi_tujuan_id, // Lokasi baru
            'tanggal_mutasi' => now(),
            'user_id' => Auth::id(), // Siapa yang memindahkan (User yang login)
            'keterangan' => $request->keterangan,
        ]);

        // 3. Update lokasi aset di tabel utama (aset)
        $aset->update([
            'lokasi_id' => $request->lokasi_tujuan_id
        ]);

        return redirect()->route('mutasi.index')->with('success', 'Mutasi berhasil! Aset telah berpindah lokasi.');
    }

    // Kita tidak butuh Edit/Delete untuk mutasi (karena ini riwayat/history)
}
