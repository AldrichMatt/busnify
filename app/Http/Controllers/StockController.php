<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Menu;
use App\Models\Bahan;
use App\Models\Jurnal;

class StockController extends Controller
{
    //
    public function index(){
        // $dataStock = Stock::with('item')->get();
        $dataStockMenu = Stock::where('item_type', "=", "menu")->with('item')->get();
        $dataStockBahan = Stock::where('item_type', "=", "bahan")->with('item')->get();
        $dataBarang = (object)['menu' => Menu::all(), 'bahan' => Bahan::all()];
        return view('feature.stock',compact('dataStockMenu', 'dataStockBahan' ,'dataBarang'));
    }

    public function tambahStock(Request $request)
    {
        $item = Stock::where("item_id", $request->id_barang)->with('item')->first();
        // dd($item);
        Stock::logStock($request->id_barang, $request->jumlah, $request->arah, $request->tipe, $request->sumber);
        Jurnal::logJurnal(102, $request->jumlah*$item->item->harga, 0, $request->tipe, $request->sumber);
        Jurnal::logJurnal(501, 0, $request->jumlah*$item->item->harga, $request->tipe, $request->sumber);
        return redirect('/stock');
    }
}
