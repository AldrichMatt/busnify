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
        $allResep = Resep::all();
        $allBahan = Bahan::all();
        $allMenu = Menu::where('tipe', '=', 'produksi')
                    ->get();

        return view('feature.resep', compact(
            'allResep',
            'allBahan',
            'allMenu'
        ));
    }
}
