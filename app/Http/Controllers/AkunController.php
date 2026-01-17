<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;

class AkunController extends Controller
{
    public function index(){
        $allAset = Akun::where('kategori','=','aset')
                    ->get()
                    ->map(function ($akun){
                        $akun->debitrupiah = rupiah($akun->debit);
                        $akun->kreditrupiah = rupiah($akun->kredit);
                        return $akun;
                    });
        $allBeban = Akun::where('kategori','=','beban')
                    ->get()
                    ->map(function ($akun){
                        $akun->debitrupiah = rupiah($akun->debit);
                        $akun->kreditrupiah = rupiah($akun->kredit);
                        return $akun;
                    });
        $allUtang = Akun::where('kategori','=','utang')
                    ->get()
                    ->map(function ($akun){
                        $akun->debitrupiah = rupiah($akun->debit);
                        $akun->kreditrupiah = rupiah($akun->kredit);
                        return $akun;
                    });
        $allModal = Akun::where('kategori','=','modal')
                    ->get()
                    ->map(function ($akun){
                        $akun->debitrupiah = rupiah($akun->debit);
                        $akun->kreditrupiah = rupiah($akun->kredit);
                        return $akun;
                    });
        $allPendapatan = Akun::where('kategori','=','pendapatan')
                    ->get()
                    ->map(function ($akun){
                        $akun->debitrupiah = rupiah($akun->debit);
                        $akun->kreditrupiah = rupiah($akun->kredit);
                        return $akun;
                    });

        $allKredit = Akun::sum('kredit');
        $allDebit = Akun::sum('debit');

        if($allKredit == $allDebit){
            $totalSaldo = $allDebit;
            $selisih = 0;
            $detailSelisih = "Seimbang";
        }elseif($allDebit > $allKredit){
            $totalSaldo = $allDebit;
            $selisih = $allKredit - $allDebit;
            $detailSelisih = "Debit lebih dari Kredit";
        }elseif($allKredit > $allDebit){
            $totalSaldo = $allKredit;
            $selisih = $allDebit - $allKredit;
            $detailSelisih = "Kredit lebih dari Debit";
        }
        return view('feature.akun', compact(
            'allAset',
            'allBeban',
            'allUtang',
            'allModal',
            'allPendapatan',
            'totalSaldo',
            'selisih',
            'detailSelisih'
        ));
    }
    
    public function akunBaru(Request $request){
        $saldo = $request->saldo;
        $kategori = $request->kategori;
        $debit = 0;
        $kredit = 0;

        if($kategori == 'aset' || $kategori == 'beban'){
            $debit = $saldo;
        }else{
            $kredit = $saldo;
        }

        Akun::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'debit' => $debit,
            'kredit' => $kredit
        ]);
        return redirect('/akun');
    }
}
