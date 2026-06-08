<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;
use App\Models\Jurnal;
use App\DTO\JurnalEntry;

class AkunController extends Controller
{
    public function index(){
        $allAkun = Akun::all()
                    ->groupBy('kategori');
        // dd($allAkun);

        $allKredit = Akun::sum('kredit');
        $allDebit = Akun::sum('debit');
        $totalSaldo = Akun::TotalKode(Akun::KAS_BESAR);
        $totalAset = Akun::TotalKode(Akun::PERSEDIAAN);
        
        if($allKredit == $allDebit){
            $selisih = 0;
            $detailSelisih = "Seimbang";
        }elseif($allDebit > $allKredit){
            $selisih = $allKredit - $allDebit;
            $detailSelisih = "Debit lebih dari Kredit";
        }elseif($allKredit > $allDebit){
            $selisih = $allDebit - $allKredit;
            $detailSelisih = "Kredit lebih dari Debit";
        }

        return view('feature.akun', compact(
            'allAkun',
            'totalSaldo',
            'selisih',
            'detailSelisih',
            'totalAset'
        ));
    }
    
    public function tambahAkun(Request $request){
        $saldo = $request->saldo;
        $kategori = $request->kategori;
        $debit = 0;
        $kredit = 0;


        if($kategori == 'aset' || $kategori == 'beban')
        {
            $debit = $saldo;
        }else{
            $kredit = $saldo;
        }

        // dd($kredit);
        
        Akun::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'debit' => $debit,
            'kredit' => $kredit
        ]);

        $jurnalEntry = new JurnalEntry($request->kode, $debit, $kredit, "Saldo Awal", "Pencatatan");

        if($debit !== 0 || $kredit !== 0){
            Jurnal::singleEntry($jurnalEntry);
        }

        return redirect('/akun');
    }

    public function hapusAkun(Request $request){
        $id = $request->id;
        $akun = Akun::whereId($id);
        $akun->update([
            'kode' => $akun->first()->kode.time()
        ]);
        dd($akun->first()->kode);

        if($akun->first()->debit == 0 && $akun->first()->kredit == 0){
            $akun->delete();
        }
        return redirect('/akun');
    }

    public function fetchAkunByKategori(Request $request){
        $kategori = $request->kategori; //penjualan, pembelian, waste

        $kas = Akun::whereKategori('aset')->get();
        $penjualan = Akun::whereKategori('pendapatan')->get();
        $beban = Akun::whereKategori('beban')->get();
        
        switch($kategori):
            case "penjualan" : 
                $akun = (object)[
                "kiri" => $kas,
                "kanan" => $penjualan
                ];
                break;
            case "pembelian" : 
                $akun = (object)[
                "kiri" => $kas,
                "kanan" => $kas
                ];
                break;
            case "produksi" : 
                $akun = (object)[
                    "kiri" => $kas,
                    "kanan" => $beban
                ];
                break;
            case "waste" : 
                $akun = (object)[
                    "kiri" => $beban,
                    "kanan" => $kas
                ];
                break;
        endswitch;
        return $akun;
    }
}
