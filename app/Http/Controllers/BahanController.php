<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bahan;
use App\Models\Jurnal;
use Illuminate\Support\Facades\DB;

class BahanController extends Controller
{
    public function index()
    {
        $allBahan = Bahan::with('stocks')
        ->get();

        return view('feature.bahan', compact('allBahan'));
    }

    public function tambahBahan(Request $request)
    {
        Bahan::create([
            'nama' => $request->nama,
            'jumlah' => 0,
            'satuan' => $request->satuan,
            'harga' => $request->harga
        ]);

        return redirect('/bahan');
    }

    public function updateBahan(Request $request)
    {
        Bahan::whereId($request->id_bahan)->lockForUpdate()
            ->update([
                'nama' => $request->nama,
                'satuan' => $request->satuan,
                'harga' => $request->harga_edit
            ]);

        return redirect('/bahan');
    }

    public function stockBahan(Request $request)
    {
        $bahan = Bahan::whereId($request->id);

        if(!$bahan->exists()){
            return false;
        }

        if($request->sumber == "pembelian"){
            // $bahan->increment('jumlah', $request->jumlah);
        }else{
            if($bahan->jumlah < $request->jumlah){
                return false;
            }
            // $bahan->decrement('jumlah', $request->jumlah);
        }

        JurnalBarangController::logStock($request);
        return;
    }

    public function hapusBahan(Request $request)
    {
        Bahan::whereId($request->id)->delete();
        return redirect('/bahan');
    }
}
