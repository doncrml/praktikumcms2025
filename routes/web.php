<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PengemudiController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\RuteController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\FeedbackController;

// Halaman Home
Route::get('/', function () {
    return view('home');
})->name('home');

// Resource Routes (CRUD lengkap)
Route::resource('/pengguna', PenggunaController::class);
Route::resource('/pengemudi', PengemudiController::class);
Route::resource('/kendaraan', KendaraanController::class);
Route::resource('/rute', RuteController::class);
Route::resource('/transaksi', TransaksiController::class);

// Manual Routes (khusus Feedback, karena tidak pakai edit/update/show)
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
Route::delete('/feedback/{id}', [FeedbackController::class, 'destroy'])->name('feedback.destroy');
