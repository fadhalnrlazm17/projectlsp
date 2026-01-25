<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    //protected $guarded = []; artinya kita mengizinkan semua kolom diisi data (agar tidak ribet saat coding nanti).
    protected $table = 'lokasi';
    protected $guarded = [];
}
