<?php

namespace App\Http\Controllers;

use App\DTO\JurnalEntry;
use Illuminate\Http\Request;
use App\Models\Akun;
use App\Models\Resep;
use App\Models\Produksi;
use App\Models\Barang;
use App\Models\HPP;
use App\Models\Jurnal;
use App\Models\JurnalBarang;

class ProduksiController extends Controller
{
    public function index()
    {
        $dataResep = Resep::with('barang')
                    ->orderBy('id_barang', 'asc')
                    ->get()
                    ->groupBy('id_barang');

        $dataProduksi = Produksi::with('barang')
                        ->orderBy('created_at', 'desc')
                        ->get()
                        ;
    
        $dataBarang = Barang::whereProduksi(1)
                    ->withExists('resep')
                    ->get();
        return view(
            'feature.produksi',
            compact([
                'dataResep',
                'dataBarang',
                'dataProduksi'
            ])
        );
    }

    public function detailProduksi(Request $request){
        $dataBarang = Produksi::whereId($request->id)
                ->with('barang')
                ->first();

        $dataResep = HPP::whereIdProduksi($request->id)
                    ->with('bahan')
                    ->get();

        $dataBahan = (object)[];

        // dd($dataBarang, $dataResep);
        $totalModal = 0;
        $i = 1;
        foreach($dataResep as $resep):
            $totalModal += $resep->modal;
            $dataBahan->{$i++} = (object)[
                'nama_bahan' => $resep->bahan->nama,
                'modal' => $resep->modal,
                'takaran' => $resep->takaran,
                'satuan' => $resep->bahan->satuan
            ];
        endforeach;

        $dataProduksi = (object) [
            'tanggal_produksi' => date_format($dataBarang->created_at, 'D, d M y H:i'),
            'id_batch' => $dataBarang->id_batch,
            'nama_barang' => $dataBarang->barang->nama,
            'total_modal' => $totalModal,
            'data_bahan' => $dataBahan
        ];

        // dd($dataProduksi);

        return view('feature.detail-produksi' , compact(
           'dataProduksi' 
        ));
    }
    public function tambahRestock(Request $request)
    {
        $data = $request->detail;

        if(Akun::HPP() == null || Akun::KAS_BESAR() == null){
            //tambahkan pesan error
            return redirect('/barang');
        };
        
        $idBarang = $data['menuId'];
        $jumlah = $data['jumlah'];

        $idBatch = JurnalBarang::generateReStockLogId();

        //buat catatan produksi
        $produksi = Produksi::create([
            'id_batch' => $idBatch,
            'id_barang' => $idBarang
        ]);

        // PERLU DIPERBAIKI MODEL HPP
        // $produksi perlu diganti dengan idBatch
        $dataInsert = collect($data['detail'])->map(function($item) use ($produksi){
            return [
                'id_produksi' => $produksi->id,
                'id_bahan' => $item['id'],
                'modal' => $item['harga'],
                'takaran' => $item['takaran']
            ];
        })->toArray();

        //tambah jumlah barang setelah produksi
        Barang::tambahStock($idBarang, $jumlah);
        //masukkan data HPP
        HPP::insert(
            $dataInsert
        );

        //catat pengeluaran bahan yang tidak memiliki stock
        $kiri = new JurnalEntry(Akun::HPP(), $request->detail['total'], 0, $idBatch, "Produksi");
        $kanan = new JurnalEntry(Akun::KAS_BESAR(), 0, $request->detail['total'], $idBatch, "Produksi");
        Jurnal::doubleEntry($kiri, $kanan, $request->detail['total']);

        return redirect('/barang');
    }

    public function tambahProduksi(Request $request)
    {
        $data = $request->detail;

        if(Akun::HPP() == null || Akun::KAS_BESAR() == null){
            //tambahkan pesan error
            return redirect('/produksi');
        };
        
        $idBarang = $data['menuId'];
        $beratAkhir = $data['beratAkhir'];

        $idBatch = JurnalBarang::generateProductionLogId();

        //buat catatan produksi
        $produksi = Produksi::create([
            'id_batch' => $idBatch,
            'id_barang' => $idBarang
        ]);

        //cek setiap item dalam detail bahan produksi
        foreach($data['detail'] as $item):
            //kalau bahan ada stocknya, maka kurangi dari stock
            if ($item['stock']){
                $data = new Request([
                    'id_batch' => $idBatch,
                    'sumber' => 'produksi',
                    'tipe' => 'bahan',
                    'jumlah' => $item['takaran'],
                    'id_barang' => $item['id']
                ]);
                //fungsi untuk kurangi dari stock
                JurnalBarangController::logStock($data);
            }
        endforeach;
        //kalau bahan tidak ada di stock maka akan langsung dicatat sebagai pembelian bahan dan beban produksi

        //$produksi perlu diganti dengan idBatch
        //pembuatan data untuk pencatatan HPP
        $dataInsert = collect($data['detail'])->map(function($item) use ($produksi){
            return [
                'id_produksi' => $produksi->id,
                'id_bahan' => $item['id'],
                'modal' => $item['harga'],
                'takaran' => $item['takaran']
            ];
        })->toArray();

        //tambah jumlah barang setelah produksi
        Barang::tambahStock($idBarang, $beratAkhir);
        //masukkan data HPP
        HPP::insert(
            $dataInsert
        );

        //catat pengeluaran bahan yang tidak memiliki stock
        $kiri = new JurnalEntry(Akun::HPP(), $request->detail['total'], 0, $idBatch, "Produksi");
        $kanan = new JurnalEntry(Akun::KAS_BESAR(), 0, $request->detail['total'], $idBatch, "Produksi");
        Jurnal::doubleEntry($kiri, $kanan, $request->detail['total']);

        return redirect('/produksi');
    }
}
