<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ListHargaController;
use App\Http\Controllers\LayananLaundryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RekapitulasiController;
use App\Http\Controllers\ProfilUsahaController;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/admin', function () {
//     return view('admin.index');
// });
Route::get('/admin', [ProfilUsahaController::class, 'edit'])->middleware(['auth'])->name('admin.index');
Route::post('/admin/profil-usaha', [ProfilUsahaController::class, 'update'])->name('profil-usaha.update');
Route::get('/dashboard', [ProfilUsahaController::class, 'index'])->middleware(['auth'])->name('dashboard');


// Route::get('/dashboard', function () {
//     return view('user.dashboard');
// })->middleware(['auth'])->name('dashboard');

// Auth routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Group route yang butuh user sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/list-harga', [ListHargaController::class, 'index'])->name('list-harga.index');
    Route::post('/list-harga', [ListHargaController::class, 'store'])->name('list-harga.Store');
    Route::post('/list-harga/update', [ListHargaController::class, 'update'])->name('list-harga.update');
    Route::get('/list-harga/layanan/{nama_layanan}', [ListHargaController::class, 'getLayananByPaket'])->name('list-harga.getLayananByPaket');
});
// Group route yang butuh user sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/rekapitulasi', [RekapitulasiController::class, 'index'])->name('rekapitulasi.index');
    Route::get('/waktu/{id}', [RekapitulasiController::class, 'waktu'])->name('waktu');
    Route::post('/transaksi.store', [RekapitulasiController::class, 'store'])->name('transaksi.store');
    Route::post('//transaksi/{id}/{proses}', [RekapitulasiController::class, 'update'])->name('transaksi.update');
    // Route::post('/list-harga/update', [ListHargaController::class, 'update'])->name('list-harga.update');
    // Route::get('/list-harga/layanan/{nama_layanan}', [ListHargaController::class, 'getLayananByPaket'])->name('list-harga.getLayananByPaket');
});

Route::get('/layanan', [LayananLaundryController::class, 'index'])->name('layanan.index');
Route::post('/layanan', [LayananLaundryController::class, 'store'])->name('layanan.store');
Route::put('/layanan/{id}', [LayananLaundryController::class, 'update'])->name('layanan.update');
Route::delete('/layanan/{id}', [LayananLaundryController::class, 'destroy'])->name('layanan.destroy');
Route::get('/get-jenis-layanan/{layananId}', [ListHargaController::class, 'getJenisLayanan']);
