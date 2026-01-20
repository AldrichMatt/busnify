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
        'variant',
        'tipe'
    ];

    protected $casts = [
        'harga' => 'integer'
    ];

    public function stocks()
    {
        return $this->morphMany(Stock::class, 'item');
    }

    protected function hargaRupiah(): Attribute
    {
        return Attribute::make(
            get: fn () => rupiah($this->harga)
        );
    }
}
