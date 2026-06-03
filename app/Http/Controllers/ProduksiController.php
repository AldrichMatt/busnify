<?php

namespace App\Http\Controllers;

use App\DTO\JurnalEntry;
use Illuminate\Http\Request;
use App\Models\Akun;
use App\Models\Resep;
use App\Models\Produksi;
use App\Models\Menu;
use App\Models\Stock;
use App\Models\HPP;
use App\Models\Jurnal;

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
    
        $dataMenu = Menu::whereTipe('produksi')
                    ->get();
        return view(
            'feature.produksi',
            compact([
                'dataResep',
                'dataMenu',
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

    public static function generateBatchId()
    {
        $today = now()->format('Ymd');

        $lastBatch = Produksi::whereDate('created_at','=',now()->format('Y-m-d'))
            ->orderByDesc('id')
            ->first();

        $number = 1;

        if ($lastBatch) {

            $lastNumber = (int) substr(
                $lastBatch->id_batch,
                -4
            );

            $number = $lastNumber + 1;
        }

        return 'PRD-' .
            $today . '-' .
            str_pad($number, 4, '0', STR_PAD_LEFT);
    }

    public function tambahProduksi(Request $request)
    {
        $data = $request->detail;
        
        $idBarang = $data['menuId'];
        $idBatch = self::generateBatchId();

        $produksi = Produksi::create([
            'id_batch' => $idBatch,
            'id_barang' => $idBarang
        ]);

        foreach($data['detail'] as $item):
            if ($item['stock']){
                Stock::logStock($item['id'], $item['takaran'], 'keluar', 'bahan', 'produksi');
            }else{
                
            }
        endforeach;

        $dataInsert = collect($data['detail'])->map(function($item) use ($produksi){
            return [
                'id_produksi' => $produksi->id,
                'id_bahan' => $item['id'],
                'modal' => $item['harga'],
                'takaran' => $item['takaran']
            ];
        })->toArray();

        HPP::insert(
            $dataInsert
        );

        $kiri = new JurnalEntry(Akun::HPP, $request->detail['total'], 0, $idBatch, "Produksi");
        $kanan = new JurnalEntry(Akun::KAS_BESAR, 0, $request->detail['total'], $idBatch, "Produksi");
        Jurnal::doubleEntry($kiri, $kanan, $request->detail['total']);

        return redirect('/produksi');
    }
}
