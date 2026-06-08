<?php

namespace App\Models;

use App\Models\Akun;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Jurnal extends Model
{
    protected $table = 'jurnal';

    protected $fillable = [
        'ref',
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
    
        // public function pasangan()
        // {
        //     return self::where('ref', $this->ref)
        //                ->where('id', '!=', $this->id);
        // }

    public function akun(){
        return $this->belongsTo(Akun::class, 'kode', 'kode')
                    ->withTrashed();
    }

    public static function singleEntry($transaction)
    {
        return self::create([
            'kode' => $transaction->kode,
            'ref' => generateRefJurnal(),
            'debit' => $transaction->debit,
            'kredit' => $transaction->kredit,
            'uraian' => $transaction->uraian,
            'tujuan' => $transaction->tujuan,
        ]);
    }

    public static function doubleEntry($kiri, $kanan, $sum) {

        $ref = generateRefJurnal();

        // DEBIT
        self::create([
            'ref' => $ref,
            'kode' => $kiri->kode,
            'debit' => $kiri->debit,
            'kredit' => $kiri->kredit,
            'uraian' => $kiri->uraian,
            'tujuan' => $kiri->tujuan,
        ]);

        // KREDIT
        self::create([
            'ref' => $ref,
            'kode' => $kanan->kode,
            'debit' => $kanan->debit,
            'kredit' => $kanan->kredit,
            'uraian' => $kanan->uraian,
            'tujuan' => $kanan->tujuan,
        ]);

        Akun::updateAkun($kiri->kode, $sum, 0);
        Akun::updateAkun($kanan->kode, 0, $sum);
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
