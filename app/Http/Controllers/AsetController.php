<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\KategoriAset;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    public function index()
    {
        // Kita pakai 'with' agar query lebih cepat (Eager Loading)
        $aset = Aset::with(['kategori', 'lokasi'])->get();
        return view('aset.index', compact('aset'));
    }

    public function create()
    {
        // Kirim data Kategori & Lokasi untuk isi Dropdown
        $kategori = KategoriAset::all();
        $lokasi = Lokasi::all();

        return view('aset.create', compact('kategori', 'lokasi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_aset' => 'required|unique:aset,kode_aset',
            'nama_aset' => 'required',
            'kategori_id' => 'required',
            'lokasi_id' => 'required',
            'jumlah' => 'required|numeric',
            'kondisi' => 'required',
        ]);

        Aset::create($request->all());

        return redirect()->route('aset.index')->with('success', 'Aset berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $aset = Aset::findOrFail($id);
        $kategori = KategoriAset::all();
        $lokasi = Lokasi::all();

        return view('aset.edit', compact('aset', 'kategori', 'lokasi'));
    }

    public function update(Request $request, string $id)
    {
        $aset = Aset::findOrFail($id);

        $request->validate([
            'nama_aset' => 'required',
            'kategori_id' => 'required',
            'lokasi_id' => 'required',
            'jumlah' => 'required|numeric',
        ]);

        // Kita update semua kecuali kode_aset (biasanya kode aset tidak boleh berubah)
        $aset->update($request->except('kode_aset'));

        return redirect()->route('aset.index')->with('success', 'Aset berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        $aset = Aset::findOrFail($id);
        $aset->delete();

        return redirect()->route('aset.index')->with('success', 'Aset berhasil dihapus!');
    }
}
