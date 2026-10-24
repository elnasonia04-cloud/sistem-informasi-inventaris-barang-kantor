<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarangController; // Tambahkan baris ini
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

 // Menampilkan daftar inventaris barang
Route::get('/barang', [BarangController::class, 'index'])
    ->name('barang.index');

// Menampilkan form tambah barang
Route::get('/barang/create', [BarangController::class, 'create'])
    ->name('barang.create');

// Menyimpan barang baru
Route::post('/barang', [BarangController::class, 'store'])
    ->name('barang.store');

// Menampilkan form edit barang berdasarkan ID
Route::get('/barang/{barang}/edit', [BarangController::class, 'edit'])
    ->name('barang.edit');

// Menyimpan perubahan data barang
Route::put('/barang/{barang}', [BarangController::class, 'update'])
    ->name('barang.update');
    
// Route untuk menghapus barang
Route::delete('/barang/{barang}', [BarangController::class, 'destroy'])
    ->name('barang.destroy');

require __DIR__.'/auth.php';
