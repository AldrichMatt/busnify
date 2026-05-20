<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use App\Models\Akun;
use Illuminate\Http\Request;

class JurnalController extends Controller
{
    public function index(){
        $dataJurnal = Jurnal::with('akun')
                    ->orderBy('id', 'desc')
                    ->get()
                    ->groupBy('ref')
                    ->map(function ($items) {
                        return (object)[
                            'kiri'  => $items->firstWhere('debit', '>', 0),
                            'kanan' => $items->firstWhere('kredit', '>', 0),
                        ];
                    })
                    ->values();
        // dd($dataJurnal);
        return view('landing',compact('dataJurnal'));
    }

}
