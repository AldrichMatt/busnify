<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Barang;

class MenuController extends Controller
{
    public function index(){
        $allMenu = Menu::with('barang')->get();
        $allBarang = Barang::all();
        return view('feature.menus',compact('allMenu','allBarang'));
    }

    public function getApi(){
        $allMenu = Menu::all();
        $allBarang = Barang::all();
        return compact('allMenu', 'allBarang');
    }

    public function tambahMenu(Request $request)
    {
        $harga = $request->harga;

        if($request->id !== NULL){
            $harga = $request->harga_edit;
        }

        Menu::updateOrInsert(
            [
                "id" => $request->id,
            ],
            [
                "id_barang" => $request->id_barang,
                "nama" => $request->nama,
                "tipe" => $request->tipe,
                "kuantitas" => $request->kuantitas,
                "gramasi" => $request->gramasi == null ? '0' : '1',
                "harga" => $harga
            ]
        );
        return redirect('/menus');
    }

    public function hapusMenu(Request $request)
    {
        Menu::whereId($request->id)->delete();
        return redirect('/menus');
    }
}
