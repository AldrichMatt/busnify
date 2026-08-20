<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bahan extends Model
{
    use SoftDeletes;

    protected $table = "bahan";
    //bahan selalu masukkan satuan terkecil, misal ayam dibeli dalam gram
    //takaran terkecil adalah 1 kilo, maka masukkan, jumlah 1000, satuan gr
    protected $fillable = [
        'nama',
        'jumlah',
        'satuan',
        'harga',
    ];

    protected $casts = [
        'jumlah' => 'integer',
        'harga' => 'integer'
    ];

    public static function updateStock($id, $jumlah, $arah)
    {
        $bahan = self::findOrFail($id);

        if($arah === "masuk"){
            $bahan->increment('jumlah', $jumlah);
        }else{
            $bahan->decrement('jumlah', $jumlah);
        }

        return $bahan;
    }

    protected function hargaRupiah(): Attribute
    {
        return Attribute::make(
            get: fn () => rupiah($this->harga)
        );
    }
}
