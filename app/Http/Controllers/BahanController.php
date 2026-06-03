<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bahan;

class BahanController extends Controller
{
    public function index()
    {
        $allBahan = Bahan::with('stocks')
        ->orderBy('jumlah', 'asc')
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
        Bahan::whereId($request->id)->lockForUpdate()
            ->update([
                'nama' => $request->nama,
                'satuan' => $request->satuan,
                'harga' => $request->harga_edit
            ]);

        return redirect('/bahan');
    }

    public function hapusBahan(Request $request)
    {
        Bahan::where('id', $request->id)->delete();
        return redirect('/bahan');
    }
}
