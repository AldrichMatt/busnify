<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
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
}
