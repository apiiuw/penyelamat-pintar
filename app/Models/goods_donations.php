<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class goods_donations extends Model
{
    protected $fillable = [
        'nama_pengirim',
        'alamat_pengirim',
        'bentuk_barang',
        'bukti_donasi',
    ];
}
