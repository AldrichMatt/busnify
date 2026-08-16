<?php

namespace App\Models;

use App\DTO\JurnalEntry;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Models\Pengaturan;

class Akun extends Model
{
    use SoftDeletes;

    //aset = aktiva
    //utang & modal = pasiva
    protected $table = "akun";

    public const KATEGORI = [
        'aset',
        'beban',
        'utang',
        'modal',
        'pendapatan',
    ];

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

    protected static function validasiTransfer(String $sumber, int $jumlah)
    {
        return self::TotalKode($sumber) >= $jumlah;
    }

    public static function Transfer(String $sumber, String $penerima, int $jumlah, String $tujuan)
    {
        if($jumlah <= 0){
            return false;
        }

        if(!self::whereKode($sumber)->exists()){
            return false;
        }

        if(!self::whereKode($penerima)->exists()){
            return false;
        }
        
        if($sumber === $penerima){
            return false;
        }

        if(!self::validasiTransfer($sumber, $jumlah)){    
            return false;
        }

        try {
            DB::transaction(function() use($sumber, $penerima, $jumlah, $tujuan){
                $kiri = new JurnalEntry($sumber, 0, $jumlah, 'Transfer Dana', $tujuan);
                $kanan = new JurnalEntry($penerima, $jumlah, 0, 'Transfer Dana', $tujuan);

                Jurnal::doubleEntry($kiri, $kanan, $jumlah);
                self::updateAkun($sumber, 0, $jumlah);
                self::updateAkun($penerima, $jumlah, 0);
            });

            return true;
        } catch (\Throwable $th) {
            return false;
        }
        
    }

    public static function TotalKode(String $kode) {
        $akun = Akun::whereKode($kode)->first();
        if($akun == null){
            return 0;
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

    
    public static function KAS_BESAR(){
        $akun = Pengaturan::where('key', '=', 'KAS_BESAR')->first();
        return $akun == null ? null : $akun->value;
    }

    public static function PERSEDIAAN(){
        $akun = Pengaturan::where('key','=','PERSEDIAAN')->first();
        return $akun == null ? null : $akun->value;
    }

    public static function MODAL(){
        $akun = Pengaturan::where('key','=','MODAL')->first();
        return $akun == null ? null : $akun->value;
    }

    public static function PENJUALAN(){
        $akun = Pengaturan::where('key','=','PENJUALAN')->first();
        return $akun == null ? null : $akun->value;
    }

    public static function HPP(){
        $akun = Pengaturan::where('key','=','HPP')->first();
        return $akun == null ? null : $akun->value;
    }

    public static function WASTE(){
        $akun = Pengaturan::where('key','=','WASTE')->first();
        return $akun == null ? null : $akun->value;
    }

    public static function UTANG(){
        $akun = Pengaturan::where('key','=','UTANG')->first();
        return $akun == null ? null: $akun->value;
    }
}
