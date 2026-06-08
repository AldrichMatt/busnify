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
        $dataStockBarang = Stock::all();
        return view('feature.stock',compact(
            'dataStockBarang'
        ));
    }

    public function tambahStock(Request $request)
    {
        Stock::create(
            [
                'nama' => $request->nama,
                'jumlah' => $request->jumlah,
            ]
        );
        return redirect('/stock');
    }
}
