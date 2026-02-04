<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Resep extends Model
{
    use SoftDeletes;

    protected $table = "resep";
    //
    protected $fillable = [
        'id_barang',
        'id_bahan',
        'takaran'
    ];
}
