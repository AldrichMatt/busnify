<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Stock;

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

    public function stocks()
    {
        return $this->morphOne(Stock::class, 'item');
    }

    protected function hargaRupiah(): Attribute
    {
        return Attribute::make(
            get: fn () => rupiah($this->harga)
        );
    }
}
