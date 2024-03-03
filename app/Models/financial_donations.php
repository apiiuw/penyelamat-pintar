<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class financial_donations extends Model
{
    protected $fillable = [
        'nama_pengirim',
        'alamat_pengirim',
        'jumlah_donasi',
        'bukti_donasi',
    ];
}
