<?php

namespace Database\Seeders;

use App\Models\Lokasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lokasi::create([
            'nama_lokasi' => 'Lab Komputer 1',
        ]);
        Lokasi::create([
            'nama_lokasi' => 'Ruang Guru',
        ]);
        Lokasi::create([
            'nama_lokasi' => 'Gudang Utama',
        ]);
    }
}
