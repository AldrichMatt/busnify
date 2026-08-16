<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\Barang;
use App\Models\Resep;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    //
    public function index(){
        $dataBarang = Barang::withExists('resep')->get();
        // dd($dataBarang);
        return view('feature.barang',compact(
            'dataBarang'
        ));
    }

    public function tambahBarang(Request $request)
    {
        Barang::create(
            [
                'nama' => $request->nama,
                'jumlah' => $request->jumlah,
                'produksi' => $request->produksi,
            ]
        );
        return redirect('/barang');
    }

    public function updateBarang(Request $request)
    {
        Barang::whereId($request->id)->lockForUpdate()
            ->update([
                'nama' => $request->nama,
                'produksi' => $request->produksi
            ]);

        return redirect('/barang');
    }

    public function resepBarang(Request $request)
    {
        $barang = Barang::whereId($request->id)->first();
        if(!$barang->produksi){
            return redirect('/barang');
        }

        $allResep = Resep::with('barang','bahan')
                    ->get();
                    // ->groupBy(fn($item)=> $item->barang->nama);

        // dd($allResep);
        $allBahan = Bahan::all();
        return view('feature.resepBarang', compact(
            'allResep',
            'allBahan',
            'barang'
        ));
    }

    public function produksiBarang(Request $request)
    {   
        $dataBarang = Barang::whereId($request->id)->withExists('resep')->first();

        if(!$dataBarang->produksi || !$dataBarang->resep_exists){
            return redirect('/barang');
        }

        $dataResep = Resep::whereIdBarang($request->id)
                    ->orderBy('id_barang', 'asc')
                    ->with("bahan")
                    ->get();
        // dd($dataResep);

        return view(
            'feature.produksiBarang',
            compact([
                'dataResep',
                'dataBarang'
            ])
        );
    }
    }
