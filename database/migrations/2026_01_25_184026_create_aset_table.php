<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('aset', function (Blueprint $table) {
            $table->id();
            $table->string('kode_aset', 50)->unique();
            $table->string('nama_aset', 150);
            // Relasi ke kategori_aset dan lokasi
            $table->foreignId('kategori_id')->constrained('kategori_aset');
            $table->foreignId('lokasi_id')->constrained('lokasi');
            $table->string('kondisi', 30);
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aset');
    }
};
