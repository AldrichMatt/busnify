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

        // $totalSaldo = Akun::where('kategori','=','aset')
        //             ->sum('debit');

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
            'allAkun',
            'totalSaldo',
            'selisih',
            'detailSelisih'
        ));
    }
    
    public function tambahAkun(Request $request){
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

        $jurnalEntry = new JurnalEntry($request->kode, $debit, $kredit, "Saldo Awal", "Pencatatan");

        if($debit !== 0 || $kredit !== 0){
            Jurnal::singleEntry($jurnalEntry);
        }

        return redirect('/akun');
    }

    public function hapusAkun(Request $request){
        $id = $request->id;

        Akun::where('id',$id)->delete();
        return redirect('/akun');
    }

    public function fetchAkunByKategori(Request $request){
        $kategori = $request->kategori; //penjualan, pembelian, waste

        $kas = Akun::where("kategori", '=', 'aset')->get();
        $penjualan = Akun::where('kategori', '=', 'pendapatan')->get();
        $beban = Akun::where('kategori', '=', 'beban')->get();
        
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
                    "kiri" => '',
                    "kanan" => ''
                ];
                break;
        endswitch;
        return $akun;
    }
}
