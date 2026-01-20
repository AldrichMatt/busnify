<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class StockController extends Controller
{
    //
    public function index(){
        $dataBarang = Stock::with('item')->get();
        return view('feature.stock',compact('dataBarang'));
    }
}
