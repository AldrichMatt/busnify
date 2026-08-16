<?php

namespace App\Models;

use App\Models\Akun;
use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    protected $table = "pengaturan_akun";

    public $timestamps = false;

    protected $fillable = [
        'key',
        'value'
    ];

    protected $casts = [
        'value' => "integer"
    ];

    public const KEYS = [
        'KAS_BESAR',
        'PERSEDIAAN',
        'MODAL',
        'PENJUALAN',
        'HPP',
        'WASTE',
        'UTANG',
    ];

    public function akun(){
        return $this->belongsTo(Akun::class, 'value', 'kode');
    }

    public static function unset(int $kode){
        Pengaturan::whereValue($kode)->delete();
    }
}
