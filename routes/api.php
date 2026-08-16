<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Route;

Route::get('/akun', [AkunController::class, 'getApi']);
Route::get('/menu', [MenuController::class, 'getApi']);