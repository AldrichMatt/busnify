<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;

    protected $table = "menu";

    protected $fillable = [
        'id_barang',
        'nama',
        'harga',
        'gramasi',
        'kuantitas',
        'tipe' //produksi, resell
    ];

    protected $casts = [
        'harga' => 'integer'
    ];

    public function barang(){
        return $this->belongsTo(Barang::class, 'id_barang', 'id')
                    ->withTrashed();
    }

    protected function hargaRupiah(): Attribute
    {
        return Attribute::make(
            get: fn () => rupiah($this->harga)
        );
    }
}
