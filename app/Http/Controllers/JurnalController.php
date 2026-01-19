<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use App\Models\Akun;
use Illuminate\Http\Request;

class JurnalController extends Controller
{
    public function index(){
        $dataJurnal = Jurnal::with('akun')->get();
        
        // dd($dataJurnal);
        return view('landing',compact('dataJurnal'));
    }

}
