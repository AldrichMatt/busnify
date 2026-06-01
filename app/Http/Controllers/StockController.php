<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Menu;
use App\Models\Bahan;
use App\Models\Jurnal;
use App\DTO\JurnalEntry;

class StockController extends Controller
{
    //
    public function index(){
        // $dataStock = Stock::with('item')->get();
        $dataStockMenu = Stock::where('item_type', "=", "menu")->with('item')->get();
        $dataStockBahan = Stock::where('item_type', "=", "bahan")->with('item')->get();
        $dataBarang = (object)['menu' => Menu::all(), 'bahan' => Bahan::all()];
        $dataAkunAset = Akun::where('kategori', '=', 'aset')->get();
        $dataAkunBeban = Akun::where('kategori', '=', 'beban')->get();
        $dataAkunPendapatan = Akun::where('kategori', '=', 'pendapatan')->get();
        return view('feature.stock',compact(
            'dataStockMenu',
            'dataStockBahan',
            'dataBarang',
            'dataAkunAset',
            'dataAkunBeban',
            'dataAkunPendapatan',
        ));
    }

    public function tambahStock(Request $request)
    {
        // dd($request);
        switch($request->sumber) :
            case "penjualan" :
                $arah = "keluar";
                break;
            case "produksi" :
                $arah = "keluar";
                break;
            case "pembelian" :
                $arah = "masuk";
                break;
            case "waste" :
                $arah = "keluar";
                break;
        endswitch;
        switch($request->tipe):
            case "menu" :
            $item = Menu::whereId($request->id_barang)->first();
            break;
            case "bahan" :
            $item = Bahan::whereId($request->id_barang)->first();
            break;
        endswitch;

        // dd($request);
        $totalHarga = $request->jumlah*$item->harga;
        $entryKiri = new JurnalEntry($request->akunKiri, $totalHarga, 0, $request->tipe, $request->sumber);
        $entryKanan = new JurnalEntry($request->akunKanan, 0, $totalHarga, $request->tipe, $request->sumber);

        Stock::logStock($request->id_barang, $request->jumlah, $arah, $request->tipe, $request->sumber);
        Jurnal::doubleEntry($entryKiri, $entryKanan, $totalHarga);
        
        return redirect('/stock');
    }
}
