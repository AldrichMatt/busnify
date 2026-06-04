<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;

class PenjualanController extends Controller
{
    public function index(){
        $dataPenjualan = Penjualan::all();

        return view('feature.sales', compact(
            'dataPenjualan'
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
}
