<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Resep;

class MenuController extends Controller
{
    public function index(){
        $allMenu = Menu::all();
        return view('feature.menus',compact('allMenu'));
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
                "nama" => $request->nama,
                "tipe" => $request->tipe,
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
