<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Menu;
use App\Models\Bahan;
use Illuminate\Support\Facades\DB;

class Stock extends Model
{
    use SoftDeletes;

    protected $table = "stock";
    //
    protected $fillable = [
        'nama',
        'jumlah'
    ];

    protected $casts = [
        'jumlah' => 'integer'
    ];

    public static function tambahStock($id, $jumlah)
    {
        self::whereId($id)
            ->increment('jumlah', $jumlah);
    }

    public static function kurangStock($id, $jumlah)
    {
        self::whereId($id)
            ->decrement('jumlah', $jumlah);
    }
}
