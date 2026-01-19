<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Akun extends Model
{
    use SoftDeletes;

    //aset = aktiva
    //utang & modal = pasiva
    protected $table = "akun";

    protected $fillable = [
        'kode',
        'nama',
        'kategori', // ['aset','beban','utang','modal','pendapatan']
        'debit',
        'kredit'
    ];

    protected $casts = [
        'debit' => 'integer',
        'kredit' => 'integer'
    ];

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
