<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\HPPController;
use App\Http\Controllers\ResepController;

Route::get('/', [JurnalController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/akun', [AkunController::class, 'index']);
Route::post('/akun/add', [AkunController::class, 'tambahAkun']);
Route::get('/akun/delete/{id}', [AkunController::class, 'hapusAkun']);

Route::get('/fetch/akun/{kategori}', [AkunController::class, 'fetchAkunByKategori']);
Route::get('/fetch/resep/{idBarang}', [ResepController::class, 'getBahanbyMenu']);

Route::get('/stock', [StockController::class, 'index']);
Route::post('/stock/add', [StockController::class, 'tambahStock']);

Route::get('/menus', [MenuController::class, 'index']);
Route::post('/menu/add', [MenuController::class, 'tambahMenu']);
Route::post('/menu/delete/{id}', [MenuController::class, 'hapusMenu']);

Route::get('/bahan', [BahanController::class, 'index']);
Route::post('/bahan/add', [BahanController::class, 'tambahBahan']);
Route::post('/bahan/update', [BahanController::class, 'updateBahan']);
Route::get('/bahan/delete/{id}', [BahanController::class, 'hapusBahan']);

Route::get('/resep', [ResepController::class, 'index']);
Route::post('/resep/add', [ResepController::class, 'tambahResep']);
Route::get('/resep/edit/{id}', [ResepController::class, 'editResep']);
Route::post('/resep/update/{id}', [ResepController::class, 'updateResep']);

Route::get('/produksi', [HPPController::class, 'index']);

Route::get('/sales', function () {
    return view('feature.sales');
});

Route::get('/page', function () {
    return view('page');
});
