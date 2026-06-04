<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DetailPenjualan;

class Penjualan extends Model
{
    //
    protected $table = "penjualan";

    protected $fillable = [
        'nama_cust',
        'jumlah_menu',
        'charge',
        'ongkir',
        'total',
        'metode'
    ];

    public function detail()
    {
      return $this->hasMany(DetailPenjualan::class, "id_penjualan", "id");
    }
}
