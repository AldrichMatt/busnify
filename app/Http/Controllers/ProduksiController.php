<?php

namespace App\Http\Controllers;

use App\DTO\JurnalEntry;
use Illuminate\Http\Request;
use App\Models\Akun;
use App\Models\Resep;
use App\Models\Produksi;
use App\Models\Menu;
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

        // dd($dataResep);
    
        $dataMenu = Menu::whereTipe('produksi')
                    ->get();
        return view(
            'feature.produksi',
            compact([
                'dataResep',
                'dataMenu'
            ])
        );
    }

    public static function generateBatchId()
    {
        $today = now()->format('Ymd');

        $lastBatch = Produksi::whereCreatedAt(today())
            ->orderByDesc('id')
            ->first();

        $number = 1;

        if ($lastBatch) {

            $lastNumber = (int) substr(
                $lastBatch->batch_id,
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
        
        $idBarang = json_decode(json_encode($data))->menuId;
        $idBatch = self::generateBatchId();

        $produksi = Produksi::create([
            'id_batch' => $idBatch,
            'id_barang' => $idBarang
        ]);

        $dataInsert = collect($data['detail'])->map(function($item) use ($produksi){
            return [
                'id_produksi' => $produksi->id,
                'id_bahan' => $item['id'],
                'modal' => $item['harga'],
                'takaran' => $item['takaran'],
            ];
        })->toArray();

        HPP::insert(
            $dataInsert
        );
        
        // dd($request->detail['total']);

        $kiri = new JurnalEntry(Akun::HPP, $request->detail['total'], 0, $idBatch, "Produksi");
        $kanan = new JurnalEntry(Akun::KAS_BESAR, 0, $request->detail['total'], $idBatch, "Produksi");
        Jurnal::doubleEntry($kiri, $kanan);

        return redirect('/produksi');
    }
}
