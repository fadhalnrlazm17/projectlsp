<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    // protected $guarded = []; artinya kita mengizinkan semua kolom diisi data (agar tidak ribet saat coding nanti).
    protected $table = 'aset';
    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(KategoriAset::class, 'kategori_id');
    }
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id');
    }
}
