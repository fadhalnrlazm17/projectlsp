<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KategoriAset;

class KategoriAsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriAset::create([
            'nama_kategori' => 'Elektronik',
        ]);
        KategoriAset::create([
            'nama_kategori' => 'Furniture',
        ]);
        KategoriAset::create([
            'nama_kategori' => 'Kendaraan',
        ]);
    }
}
