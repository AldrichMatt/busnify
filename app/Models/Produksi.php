<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Barang;

class Produksi extends Model
{
    //
    protected $table = "produksi";

    use SoftDeletes;
    
    protected $fillable = [
      'id_batch',
      'id_barang'
    ];

    public function barang()
    {
      return $this->belongsTo(Barang::class, "id_barang", "id");
    }
}
