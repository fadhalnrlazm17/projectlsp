<?php

namespace App\Http\Controllers;

use App\Models\KategoriAset;
use Illuminate\Http\Request;

class KategoriAsetController extends Controller
{
    // 1. TAMPILKAN DATA (Read)
    public function index()
    {
        $kategori = KategoriAset::all(); // Ambil semua data
        return view('kategori.index', compact('kategori'));
    }

    // 2. FORM TAMBAH (Create)
    public function create()
    {
        return view('kategori.create');
    }

    // 3. PROSES SIMPAN (Store)
    public function store(Request $request)
    {
        // Validasi wajib diisi
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        KategoriAset::create($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    // 4. FORM EDIT (Edit)
    public function edit(string $id)
    {
        $kategori = KategoriAset::findOrFail($id); // Cari data berdasarkan ID
        return view('kategori.edit', compact('kategori'));
    }

    // 5. PROSES UPDATE (Update)
    public function update(Request $request, string $id)
    {
        $kategori = KategoriAset::findOrFail($id);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diupdate!');
    }

    // 6. PROSES HAPUS (Delete)
    public function destroy(string $id)
    {
        $kategori = KategoriAset::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
