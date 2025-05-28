<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ListHargaController;
use App\Http\Controllers\LayananLaundryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth'])->name('dashboard');

// Auth routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Group route yang butuh user sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/list-harga', [ListHargaController::class, 'index'])->name('list-harga.index');
    Route::post('/list-harga/update', [ListHargaController::class, 'update'])->name('list-harga.update');
});

Route::get('/layanan', [LayananLaundryController::class, 'index'])->name('layanan.index');
Route::post('/layanan', [LayananLaundryController::class, 'store'])->name('layanan.store');
Route::put('/layanan/{id}', [LayananLaundryController::class, 'update'])->name('layanan.update');
Route::delete('/layanan/{id}', [LayananLaundryController::class, 'destroy'])->name('layanan.destroy');
