<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::resource('pelanggan', PelangganController::class);
Route::resource('layanan', LayananController::class);
Route::resource('transaksi', TransaksiController::class);