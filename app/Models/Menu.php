<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\models\Stock;

class Menu extends Model
{
    use SoftDeletes;

    protected $table = "menu";

    protected $fillable = [
        'id_stock',
        'nama',
        'harga',
        'gramasi',
        'kuantitas',
        'tipe' //produksi, resell
    ];

    protected $casts = [
        'harga' => 'integer'
    ];


    // MENU TIDAK DI STOCK (MENU DI STOCK DI TABEL STOCK)
    // public static function updateStock($id, $jumlah, $arah)
    // {
    //     $menu = self::findOrFail($id);

    //     if($arah === "masuk"){
    //         $menu->increment('jumlah', $jumlah);
    //     }else{
    //         $menu->decrement('jumlah', $jumlah);
    //     }

    //     return $menu;
    // }

    protected function hargaRupiah(): Attribute
    {
        return Attribute::make(
            get: fn () => rupiah($this->harga)
        );
    }
}
