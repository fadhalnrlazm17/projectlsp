<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Lokasi extends Model
{
    use HasFactory;
    
    //protected $guarded = []; artinya kita mengizinkan semua kolom diisi data (agar tidak ribet saat coding nanti).
    protected $table = 'lokasi';
    protected $guarded = [];

    protected $fillable = [
        'nama_lokasi',
        'keterangan',
    ];
}
