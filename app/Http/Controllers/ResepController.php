<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resep;
use App\Models\Bahan;

class ResepController extends Controller
{
    public function index()
    {
        $allResep = Resep::all();

        return view('feature.resep', compact('allResep'));
    }
}
