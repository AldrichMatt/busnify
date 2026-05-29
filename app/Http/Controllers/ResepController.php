<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resep;
use App\Models\Bahan;
use App\Models\Menu;

class ResepController extends Controller
{
    public function index()
    {
        $allResep = Resep::with('barang')
                    ->get('id_barang')
                    ->groupBy(fn($item)=> $item->barang->nama);
        $allBahan = Bahan::all();
        $allMenu = Menu::whereTipe("produksi")
                    ->get();

        return view('feature.resep', compact(
            'allResep',
            'allBahan',
            'allMenu'
        ));
    }

    public function getBahanbyMenu(Request $request){
        // dd(Resep::with('bahan')
        //             ->where('id_barang', $request->idBarang)
        //             ->get()
        // );
        return response()->json(
            Resep::with('bahan')
                    ->where('id_barang', $request->idBarang)
                    ->get()
        );
    }

    public function tambahResep(Request $request){
        foreach($request->bahan as $bahan) : 
            Resep::create([
                'id_barang' => $request->menu_id,
                'id_bahan' => $bahan['id'],
                'takaran' => $bahan['qty']
                ]);
        endforeach;

        return response()->json([
            'message' => "Resep berhasil ditambah"
        ]);
    }

    public function editResep(Request $request)
    {
        $id_barang = $request->id;
        $allBahan = Bahan::all();
        $namaMenu = Menu::whereId($id_barang)->first()->nama;
        $dataResep = Resep::whereIdBarang($id_barang)
                    ->with('barang')
                    ->get();

        // dd($dataResep);

        return view('editResep', compact(
            'dataResep',
            'allBahan',
            'namaMenu',
            'id_barang'
            ));
    }

    public function updateResep(Request $request)
    {
        $idBahan = collect($request->bahan)->pluck('id');

        // dd($idBahan);

        Resep::whereIdBarang($request->menu_id)
                ->whereNotIn('id_bahan',$idBahan)
                ->delete();

        foreach($request->bahan as $bahan) :
            // dd($bahan['id']);
            Resep::updateOrInsert(
                [
                    'id_barang' => $request->menu_id,
                    'id_bahan' => $bahan['id']
                ],
                [
                    'takaran' => $bahan['qty']
                ]
            );
        endforeach;
        return redirect('/resep');
    }
}
