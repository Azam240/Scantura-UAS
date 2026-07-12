<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

// ==========================================
// 1. HALAMAN UTAMA (LANDING PAGE)
// ==========================================
Route::get('/', function () {
    return view('welcome');
});

// ==========================================
// 2. SISTEM UTAMA SCANTURA (PORTFOLIO)
// ==========================================

// HALAMAN UTAMA SCANNER: Buka untuk umum (Hapus middleware 'auth' agar guest bisa masuk)
Route::get('/portfolio', [PortfolioController::class, 'index'])
    ->name('portfolio.index');

// PROSES EKSEKUSI SCAN: Tetap seperti ini (Aman dibatasi 3x di Controller)
Route::post('/portfolio', [PortfolioController::class, 'store'])
    ->name('portfolio.store');

// ==========================================
// 3. ROUTE BAWAAN LARAVEL BREEZE
// ==========================================
Route::get('/dashboard', function () {
    return redirect('/portfolio')->with('success', 'Login Berhasil! Selamat datang kembali di ScanTura.');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';