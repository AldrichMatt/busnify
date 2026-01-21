<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Menu;
use App\Models\Bahan;

class Stock extends Model
{
    use SoftDeletes;

    protected $table = "stock";
    //
    protected $fillable = [
        'item_id',
        'item_type', //bahan, menu
        'jumlah',
        'arah', //masuk, keluar
        'sumber' //penjualan, pembelian, waste
    ];

    protected $casts = [
        'jumlah' => 'integer'
    ];

    public function item()
    {
        return $this->morphTo();
    }

    public static function logStock($id_barang, $jumlah, $arah, $tipe, $sumber)
    {
        return self::create([
            'item_type' => $tipe,
            'item_id' => $id_barang,
            'jumlah' => $jumlah,
            'arah' => $arah,
            'sumber' => $sumber,
        ]);
    }
}
