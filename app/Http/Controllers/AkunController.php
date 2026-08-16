<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;
use App\Models\Jurnal;
use App\DTO\JurnalEntry;
use App\Models\Pengaturan;

class AkunController extends Controller
{
    public function index(){
        $allAkun = Akun::orderBy('kode', 'asc')
                    ->get()
                    ->groupBy('kategori');
        $allKredit = Akun::sum('kredit');
        $allDebit = Akun::sum('debit');
        $totalSaldo = 0;
        $totalAset = 0;
        $selisih = 0;

        // dd(Akun::KAS_BESAR());

        $allKredit = Akun::sum('kredit');
        $allDebit = Akun::sum('debit');
        if(Akun::KAS_BESAR() != null){
            $totalSaldo = Akun::TotalKode(Akun::KAS_BESAR());
        }
        if(Akun::PERSEDIAAN() != null){
            $totalAset = Akun::TotalKode(Akun::PERSEDIAAN());
        }            
        if($allKredit == $allDebit){
            $selisih = 0;
        }elseif($allDebit > $allKredit){
            $selisih = $allKredit - $allDebit;
        }elseif($allKredit > $allDebit){
            $selisih = $allDebit - $allKredit;
        }
        

        return view('feature.akun', compact(
            'allAkun',
            'totalSaldo',
            'selisih',
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
        // dd($akun->first()->kode);
        Pengaturan::unset($akun->first()->kode);

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

    public function getApi(){
        $allAkun = Akun::all()
                    ->groupBy('kategori');
        // dd($allAkun);

        $allKredit = Akun::sum('kredit');
        $allDebit = Akun::sum('debit');
        $totalSaldo = Akun::TotalKode(Akun::KAS_BESAR()());
        $totalAset = Akun::TotalKode(Akun::PERSEDIAAN()());
        
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

        return compact(
            'allAkun',
            'totalSaldo',
            'selisih',
            'detailSelisih',
            'totalAset'
        );
    }

    public function viewPengaturan()
    {
        $pengaturan = [];

        
        $keys = Pengaturan::KEYS;
        foreach($keys as $key) :
            $pengaturan[$key] = Pengaturan::with('akun')->where('key',$key)->first();
        endforeach;
        $aset = Akun::whereKategori('aset')->whereNotIn('kode',Pengaturan::pluck('value'))->get(['kode', 'nama']);
        $beban = Akun::whereKategori('beban')->whereNotIn('kode', Pengaturan::pluck('value'))->get(['kode', 'nama']);
        $utang = Akun::whereKategori('utang')->whereNotIn('kode', Pengaturan::pluck('value'))->get(['kode', 'nama']);
        $modal = Akun::whereKategori('modal')->whereNotIn('kode', Pengaturan::pluck('value'))->get(['kode', 'nama']);
        $pendapatan = Akun::whereKategori('pendapatan')->whereNotIn('kode', Pengaturan::pluck('value'))->get(['kode', 'nama']);

        // dd(Pengaturan::with('akun')->where('key','KAS_BESAR')->first());

        return view('feature.pengaturan', compact(
            'pengaturan',
            'keys',
            'aset',
            'beban',
            'utang',
            'modal',
            'pendapatan',
        ));
    }

    public function setPengaturanAkun(Request $request)
    {
        $nama = $request->nama;
        $kode = $request->kode;

        Pengaturan::create([
            'key' => $nama,
            'value' => $kode
        ]);

        return;
    }
}
