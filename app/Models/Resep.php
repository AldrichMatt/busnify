<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    //
    protected $fillable = [
        'id_barang',
        'id_bahan',
        'takaran'
    ];
}
