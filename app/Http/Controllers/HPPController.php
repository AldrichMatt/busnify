<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HPP;

class HPPController extends Controller
{
    public function index(){
        $allhpp = HPP::all();
        return view('feature.produksi',
        compact(
            'allhpp'
        ));
    }
}
