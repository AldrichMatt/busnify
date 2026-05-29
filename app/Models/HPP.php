<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HPP extends Model
{
    protected $table = 'hpp';
    //
    protected $fillable = [
        'id_batch',
        'id_barang',
        'takaran',
        'modal'
    ];
}
