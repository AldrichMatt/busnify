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
        'nama',
        'harga',
        'tipe' //produksi, resell
    ];

    protected $casts = [
        'harga' => 'integer'
    ];

    public function stocks()
    {
        return $this->morphMany(Stock::class, 'item');
    }

    // MENU TIDAK DI STOCK (UNTUK SEKARANG)
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
