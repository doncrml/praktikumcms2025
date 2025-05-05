<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PengemudiController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\RuteController;
use App\Http\Controllers\TransaksiController;

// Halaman Home
Route::get('/', function () {
    return view('home');
})->name('home');

// Resource Routes (CRUD)
Route::resource('pengguna', PenggunaController::class);
Route::resource('pengemudi', PengemudiController::class);
Route::resource('kendaraan', KendaraanController::class);
Route::resource('rute', RuteController::class);
Route::resource('transaksi', TransaksiController::class);
