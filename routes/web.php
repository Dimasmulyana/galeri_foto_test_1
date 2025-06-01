<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FotoController;

// === AUTH ROUTES ===
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// === HALAMAN UTAMA ===
Route::get('/home', [FotoController::class, 'index'])->name('home');

// === HALAMAN KHUSUS USER LOGIN ===
Route::middleware(['auth'])->group(function () {

    // Halaman upload (menampilkan form)
    Route::get('/upload', function () {
        return view('upload');
    })->name('upload');

    // Proses upload foto
    Route::post('/upload', [FotoController::class, 'store'])->name('foto.store');

    // Halaman Foto Saya
    Route::get('/saya', [FotoController::class, 'showFotoSaya'])->name('saya');

    // Update foto
    Route::post('/foto/update/{id}', [FotoController::class, 'update'])->name('foto.update');

    // Hapus foto
    Route::delete('/foto/delete/{id}', [FotoController::class, 'destroy'])->name('foto.destroy');
});

// === FITUR LAINNYA ===
Route::get('/foto/{id}/like', [FotoController::class, 'like'])->name('foto.like');
Route::get('/search', [FotoController::class, 'search'])->name('foto.search');
