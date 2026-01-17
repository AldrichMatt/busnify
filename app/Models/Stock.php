<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //
    protected $fillable = [
        'id_barang',
        'jumlah',
        'arah',
        'tipe',
        'sumber'
    ];
}
