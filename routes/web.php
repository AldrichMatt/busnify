<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;

Route::get('/', function () {
    return view('landing');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/akun', [AkunController::class, 'index']);
Route::post('/akun/add', [AkunController::class, 'akunBaru']);

Route::get('/stock', function () {
    return view('feature.stock');
});

Route::get('/menus', function () {
    return view('feature.menus');
});

Route::get('/bahan', function () {
    return view('feature.bahan');
});

Route::get('/sales', function () {
    return view('feature.sales');
});

Route::get('/page', function () {
    return view('page');
});
