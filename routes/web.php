<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\anggotaController;
use App\Http\Controllers\bukuController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\peminjamanController;
use App\Http\Controllers\pengembalianController;
use App\Http\Controllers\SessionController;
use App\Http\Middleware\isLogin;
use App\Http\Middleware\isTamu;

Route::get('/', function () {
    return view('sesi.index');
});

Route::resource('anggota', anggotaController::class)->middleware(isLogin::class);

Route::get('/sesi',[SessionController::class,'index'])->middleware(isTamu::class);
Route::post('/sesi/login',[SessionController::class,'login'])->middleware(isTamu::class);
Route::get('/sesi/logout',[SessionController::class,'logout']);
Route::get('/sesi/register',[SessionController::class,'register'])->middleware(isTamu::class);
Route::post('/sesi/create',[SessionController::class,'create'])->middleware(isTamu::class);

Route::resource('kategoriBuku', kategoriController::class)->middleware(isLogin::class);
Route::resource('buku', bukuController::class)->middleware(isLogin::class);

Route::resource('peminjaman', peminjamanController::class)->middleware(isLogin::class);
Route::resource('pengembalian', pengembalianController::class)->middleware(isLogin::class);



