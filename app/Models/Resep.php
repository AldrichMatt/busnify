<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Resep extends Model
{
    use SoftDeletes;

    protected $table = "resep";

    //
    protected $fillable = [
        'id_barang',
        'id_bahan',
        'takaran'
    ];

    public function barang()
    {
        return $this->belongsTo(Stock::class, 'id_barang');
    }
    
    public function bahan()
    {
        return $this->belongsTo(Bahan::class, 'id_bahan');
    }
    // protected function namaBarang() : Attribute 
    // {
    //     return Attribute::make(
    //         get : fn() => $this->
    //     )
    // }
}
