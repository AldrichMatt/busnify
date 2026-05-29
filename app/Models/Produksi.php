<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produksi extends Model
{
    //
    protected $table = "produksi";

    use SoftDeletes;
    
    protected $fillable = [
      'id_batch',
      'id_barang'
    ];
}
