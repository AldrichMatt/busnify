<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    //
    protected $fillable = [
        'id_menu',
        'id_variant',
        'nama',
        'harga'
    ];
}
