<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PengemudiController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\RuteController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ImageController;


Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/login/admin', function () {
    session(['role' => 'admin']);
    return redirect()->route('admin.dashboard');
})->name('login.admin');

Route::get('/logout', function () {
    session()->forget('role');
    return redirect()->route('home');
})->name('logout');




Route::middleware(['checkadmin'])->group(function () {

  
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

 
    Route::resource('/pengguna', PenggunaController::class);
    Route::resource('/pengemudi', PengemudiController::class);
    Route::resource('/kendaraan', KendaraanController::class);
    Route::resource('/rute', RuteController::class);
    Route::resource('/transaksi', TransaksiController::class);
});


Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
Route::delete('/feedback/{id}', [FeedbackController::class, 'destroy'])->name('feedback.destroy');

Route::get('/upload', [ImageController::class, 'create']);
Route::post('/upload', [ImageController::class, 'store'])->name('image.upload');
Route::delete('/upload/{id}', [ImageController::class, 'destroy'])->name('image.delete');

Route::get('/transaksi/cek/{id}', [TransaksiController::class, 'cek'])->name('transaksi.cek');
