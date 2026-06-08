<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;
use App\Models\JurnalBarang;
use App\Models\Menu;
use App\Models\Bahan;
use App\Models\Jurnal;
use App\DTO\JurnalEntry;

class JurnalBarangController extends Controller
{
    //
    public function index(){
        // $dataStock = JurnalBarang::with('item')->get();
        $dataStockMenu = JurnalBarang::whereItemType("menu")->with('item')->get();
        $dataStockBahan = JurnalBarang::whereItemType("bahan")->with('item')->get();
        $dataBarang = (object)['menu' => Menu::all(), 'bahan' => Bahan::all()];
        $dataAkunAset = Akun::whereKategori('aset')->get();
        $dataAkunBeban = Akun::whereKategori('beban')->get();
        $dataAkunPendapatan = Akun::whereKategori('pendapatan')->get();
        return view('feature.jurnal-barang',compact(
            'dataStockMenu',
            'dataStockBahan',
            'dataBarang',
            'dataAkunAset',
            'dataAkunBeban',
            'dataAkunPendapatan',
        ));
    }

    public static function tambahStock(Request $request)
    {

        //sumber, tipe, jumlah, id_barang
        // dd($request);
        if($request->sumber == "pembelian"){
            $akunKiri = Akun::PERSEDIAAN;
            $akunKanan = Akun::KAS_BESAR;
            $arah = "masuk";
        }else if($request->sumber == "waste"){
            $akunKiri = Akun::WASTE;
            $akunKanan = Akun::PERSEDIAAN;
            $arah = "keluar";
        }else if($request->sumber == "produksi"){
            $akunKiri = Akun::HPP;
            $akunKanan = Akun::PERSEDIAAN;
            $arah = "keluar";
        };
        switch($request->tipe):
            case "menu" :
            $item = Menu::whereId($request->id_barang)->first();
            break;
            case "bahan" :
            $item = Bahan::whereId($request->id_barang)->first();
            break;
        endswitch;

        $totalHarga = $request->jumlah*$item->harga;
        $entryKiri = new JurnalEntry($akunKiri, $totalHarga, 0, $request->tipe, $request->sumber);
        $entryKanan = new JurnalEntry($akunKanan, 0, $totalHarga, $request->tipe, $request->sumber);

        JurnalBarang::logStock(NULL, $request->id_barang, $request->jumlah, $arah, $request->tipe, $request->sumber);
        Jurnal::doubleEntry($entryKiri, $entryKanan, $totalHarga);
        
        return redirect('/bahan');
    }
}
