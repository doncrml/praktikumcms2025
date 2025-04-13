<?php


use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PengemudiController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\RuteController;
use App\Http\Controllers\TransaksiController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::resource('pengguna', PenggunaController::class);
Route::resource('pengemudi', PengemudiController::class);
Route::resource('kendaraan', KendaraanController::class);
Route::resource('rute', RuteController::class);
Route::resource('transaksi', TransaksiController::class);
