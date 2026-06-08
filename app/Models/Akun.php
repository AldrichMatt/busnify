<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Akun extends Model
{
    use SoftDeletes;

    //aset = aktiva
    //utang & modal = pasiva
    protected $table = "akun";

    const KATEGORI = [
        'aset',
        'beban',
        'utang',
        'modal',
        'pendapatan',
    ];

    const KAS_BESAR = '101';

    const PERSEDIAAN = '102';

    const UTANG = '201';

    const MODAL = '301';

    const PENJUALAN = '401';
    
    const HPP = '501';

    const WASTE = "502";

    protected $fillable = [
        'kode',
        'main',
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

    public static function TotalKode(String $kode) {
        $akun = Akun::whereKode($kode)->first();
        if($akun == null){
            return;
        }
        if ($akun->kategori == 'aset' || $akun->kategori == "beban"){
            return $akun->debit - $akun->kredit;
        }else{
            return $akun->kredit - $akun->debit;
        }
    }

    public static function TotalKategori(String $kategori) {
        $akun = Akun::whereKategori($kategori);
        if($akun == null){
            return;
        }
        $sumDebit = $akun->sum('debit');
        $sumKredit = $akun->sum('kredit');
        if ($kategori == 'aset' || $kategori == "beban"){
            return $sumDebit - $sumKredit;
        }else{
            return $sumKredit - $sumDebit;
        }
    }

    public static function TotalSaldo(){
        $totalSaldo = 0;

        foreach(Akun::KATEGORI as $kategori){
            $totalSaldo += Akun::TotalKategori($kategori);
        }

        return $totalSaldo;
    }

    public static function updateAkun(String $kode, int $debit, int $kredit){

        return Akun::whereKode($kode)->lockForUpdate()
                    ->update([
                        'debit' => DB::raw("debit + $debit"),
                        'kredit' => DB::raw("kredit + $kredit")
                    ]);
    }
}
