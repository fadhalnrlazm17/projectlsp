<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MutasiAset extends Model
{
    //protected $guarded = []; artinya kita mengizinkan semua kolom diisi data (agar tidak ribet saat coding nanti).
    protected $table = 'mutasi_aset';
    protected $guarded = [];

    public function aset()
    {
        return $this->belongsTo(Aset::class, 'aset_id');
    }
    public function lokasiAsal()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_asal_id');
    }
    public function lokasiTujuan()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_tujuan_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
