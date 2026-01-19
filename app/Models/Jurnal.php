<?php

namespace App\Models;

use App\Models\Akun;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Jurnal extends Model
{
    protected $table = 'jurnal';

    protected $fillable = [
        'kode',
        'debit',
        'kredit',
        'uraian',
        'tujuan'
    ];

    protected $casts = [
        'debit'  => 'integer',
        'kredit' => 'integer',
    ];

    public function akun(){
        return $this->belongsTo(Akun::class, 'kode', 'kode')
                    ->withTrashed();
    }

    public static function logJurnal($kode, $debit = 0, $kredit = 0, $uraian, $tujuan)
    {
        return self::create([
            'kode' => $kode,
            'debit' => $debit,
            'kredit' => $kredit,
            'uraian' => $uraian,
            'tujuan' => $tujuan,
        ]);
    }

    protected function debitRupiah(): Attribute
    {
        return Attribute::make(
            get: fn () => rupiah($this->debit)
        );
    }

    protected function kreditRupiah(): Attribute
    {
        return Attribute::make(
            get: fn () => rupiah($this->kredit)
        );
    }
}
