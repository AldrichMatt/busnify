<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    //
    protected $fillable = [
        'nama_cust',
        'jumlah_menu',
        'detail',
        'charge',
        'total'
    ];

    protected $casts = [
        'detail' => 'array'
    ];
}
