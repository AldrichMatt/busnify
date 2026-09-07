<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Menu;
use App\Models\Bahan;
use Illuminate\Support\Facades\DB;

class Barang extends Model
{
    use SoftDeletes;

    protected $table = "barang";
    //
    protected $fillable = [
        'nama',
        'jumlah',
        'produksi'
    ];

    protected $casts = [
        'jumlah' => 'integer'
    ];

    public function resep()
    {
        return $this->hasMany(Resep::class, 'id_barang');
    }

    public static function tambahStock($id, $jumlah)
    {
        self::whereId($id)
            ->increment('jumlah', $jumlah);
    }

    public static function kurangiStock($id, $jumlah)
    {
        self::whereId($id)
            ->decrement('jumlah', $jumlah);
    }
}
