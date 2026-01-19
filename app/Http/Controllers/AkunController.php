<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;
use App\Models\Jurnal;

class AkunController extends Controller
{
    public function index(){
        $allAset = Akun::where('kategori','=','aset')
                    ->get();
        $allBeban = Akun::where('kategori','=','beban')
                    ->get();
        $allUtang = Akun::where('kategori','=','utang')
                    ->get();
        $allModal = Akun::where('kategori','=','modal')
                    ->get();
        $allPendapatan = Akun::where('kategori','=','pendapatan')
                    ->get();

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

        if($debit !== 0 || $kredit !== 0){
            Jurnal::logJurnal($request->kode, $debit, $kredit, "Saldo Awal", "Pencatatan");
        }

        return redirect('/akun');
    }

    public function hapusAkun(Request $request){
        $id = $request->id;

        Akun::where('id',$id)->delete();
        return redirect('/akun');
    }
}
