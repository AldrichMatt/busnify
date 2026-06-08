<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

class DetailPenjualan extends Model
{
    public $timestamps = false;
    
    protected $table = "detail_penjualan";

    protected $fillable = [
        'id_penjualan',
        'id_barang',
        'jumlah',
        'total',
    ];

    public function barang()
    {
      return $this->belongsTo(Menu::class, "id_barang", "id");
    }
}
