<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriAset extends Model
{
    //protected $guarded = []; artinya kita mengizinkan semua kolom diisi data (agar tidak ribet saat coding nanti).
    protected $table = 'kategori_aset';
    protected $guarded = [];
}
