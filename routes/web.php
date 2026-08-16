<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\JurnalBarangController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ResepController;

Route::get('/', [JurnalController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/akun', [AkunController::class, 'index']);
Route::post('/akun/add', [AkunController::class, 'tambahAkun']);
Route::get('/akun/pengaturan', [AkunController::class, 'viewPengaturan']);
Route::post('/akun/pengaturan/set', [AkunController::class, 'setPengaturanAkun']);
Route::get('/akun/delete/{id}', [AkunController::class, 'hapusAkun']);

Route::get('/fetch/akun/{kategori}', [AkunController::class, 'fetchAkunByKategori']);
Route::get('/fetch/resep/{idBarang}', [ResepController::class, 'getBahanbyMenu']);

Route::get('/barang', [BarangController::class, 'index']);
Route::post('/barang/add', [BarangController::class, 'tambahBarang']);
Route::post('/barang/update', [BarangController::class, 'updateBarang']);
Route::get('/barang/resep/{id}', [BarangController::class, 'resepBarang']);
Route::get('/barang/produksi/{id}', [BarangController::class, 'produksiBarang']);
Route::post('/barang/stock/{id}', [BarangController::class, 'stockBarang']);

Route::get('/menus', [MenuController::class, 'index']);
Route::post('/menu/add', [MenuController::class, 'tambahMenu']);
Route::get('/menu/delete/{id}', [MenuController::class, 'hapusMenu']);

Route::get('/bahan', [BahanController::class, 'index']);
Route::post('/bahan/add', [BahanController::class, 'tambahBahan']);
Route::post('/bahan/update', [BahanController::class, 'updateBahan']);
Route::get('/bahan/delete/{id}', [BahanController::class, 'hapusBahan']);
Route::post('/bahan/stock/{id}', [BahanController::class, 'stockBahan']);


Route::get('/resep', [ResepController::class, 'index']);
Route::post('/resep/add', [ResepController::class, 'tambahResep']);
Route::get('/resep/edit/{id}', [ResepController::class, 'editResep']);
Route::post('/resep/update/{id}', [ResepController::class, 'updateResep']);

Route::get('/produksi', [ProduksiController::class, 'index']);
Route::get('/produksi/{id}', [ProduksiController::class, 'detailProduksi']);
Route::post('/produksi/add', [ProduksiController::class, 'tambahProduksi']);

Route::get('/sales', [PenjualanController::class, 'index']);
Route::get('/sales/{id}', [PenjualanController::class, 'detailPenjualan']);
Route::post('/sales/add', [PenjualanController::class, 'tambahPenjualan']);

Route::get('/page', function () {
    return view('page');
});
