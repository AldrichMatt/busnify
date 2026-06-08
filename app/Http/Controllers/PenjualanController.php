<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Menu;
use App\Models\Jurnal;
use App\Models\Akun;
use App\Models\Stock;
use App\DTO\JurnalEntry;
use App\Models\DetailPenjualan;

class PenjualanController extends Controller
{
    public function index(){
        $dataPenjualan = Penjualan::all();
        $dataMenu = Menu::all();

        return view('feature.sales', compact(
            'dataPenjualan',
            'dataMenu'
        ));
    }

    public function detailPenjualan(Request $request)
    {
        $dataPenjualan = Penjualan::whereId($request->id)
                        ->with('detail.barang')
                        ->first();

        return view('feature.detail-sales', 
        compact(
            'dataPenjualan'
        ));
    }

    public function tambahPenjualan(Request $request)
    {
        $data = $request->data;
        $penjualan = Penjualan::create([
            'nama_cust' => $data['nama'],
            'jumlah_menu' => $data['jumlah_menu'],
            'charge' => $data['charge'],
            'ongkir' => $data['ongkir'],
            'total' => $data['total'],
            'metode' => $data['metode'],
        ]);

        foreach($data['detail'] as $detail):
            DetailPenjualan::create([
                'id_penjualan' => $penjualan->id,
                'id_barang' => $detail['id'],
                'jumlah' => $detail['jumlah'],
                'total' => $detail['harga']
            ]);

            Stock::kurangStock($detail['id_stock'], $detail['kuantitas'] * $detail['jumlah']);
        endforeach;


        $kiri = new JurnalEntry(Akun::KAS_BESAR, $data['total'], 0, "Transaksi " . $data['nama'], "Transaksi");
        $kanan = new JurnalEntry(Akun::PENJUALAN, 0, $data['total'], "Transaksi " . $data['nama'], "Transaksi");
        Jurnal::doubleEntry($kiri, $kanan, $data['total']);
    }
}
