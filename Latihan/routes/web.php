<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\InformasiController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\HomeController;


// ==================== FRONTEND ROUTES ====================

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Destinasi
Route::get('/destinasi', [DestinasiController::class, 'index'])->name('destinasi');
Route::get('/destinasi/alam', [DestinasiController::class, 'alam'])->name('destinasi.alam');
Route::get('/destinasi/buatan', [DestinasiController::class, 'buatan'])->name('destinasi.buatan');
Route::get('/destinasi/budaya', [DestinasiController::class, 'budaya'])->name('destinasi.budaya');
// Detail Destinasi (jika masih pakai ID)
Route::get('/destinasi/{id}', [DestinasiController::class, 'show'])->name('destinasi.show');

// Informasi
Route::get('/informasi', function () {
    $informasi = App\Models\Informasi::where('status', true)->latest()->paginate(10);
    return view('pages.informasi', compact('informasi'));
})->name('informasi');

// --- HALAMAN UTAMA GALERI ---
Route::get('/galeri', function () {
    // Pakai paginate agar rapi, atau get() jika ingin tampil semua tanpa halaman
    $galeris = App\Models\Galeri::where('status', true)->latest()->paginate(12);
    return view('pages.galeri', compact('galeris'));
})->name('galeri.index');

// Detail Galeri
Route::get('/galeri/{slug}', function ($slug) {
    $galeris = App\Models\Galeri::where('slug', $slug)->firstOrFail();
    $galeris->increment('views');
    return view('pages.galeri-detail', compact('galeris'));
})->name('galeri.detail');

// Berita
Route::get('/berita', function () {
    $berita = App\Models\Berita::with('kategori')->where('status', true)->latest()->paginate(9);
    $kategori = App\Models\Kategori::all();
    return view('pages.berita', compact('berita', 'kategori'));
})->name('berita');

// Detail Berita
Route::get('/berita/{slug}', function ($slug) {
    $berita = App\Models\Berita::with('kategori')->where('slug', $slug)->firstOrFail();
    $berita->increment('views');
    return view('pages.berita-detail', compact('berita'));
})->name('berita.detail');

// UMKM
Route::get('/umkm', [HomeController::class, 'umkm'])->name('umkm');

// Budaya
Route::get('/budaya', [HomeController::class, 'budaya'])->name('budaya');

// Kontak
Route::get('/kontak', function () {
    return view('pages.kontak');
})->name('kontak');


// ==================== AUTH ROUTES ====================

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Halaman untuk input email (Lupa Password)
Route::get('/forgot_password', [AuthController::class, 'showForgotPasswordForm'])
    ->name('password.request');

// Proses pengiriman email link reset
Route::post('/forgot_password', [AuthController::class, 'sendResetLink'])
    ->name('password.email');

// Halaman untuk menampilkan form password baru (dari link di log)
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])
    ->name('password.reset');

// Proses update password ke database
Route::post('/reset-password', [AuthController::class, 'resetPassword'])
    ->name('password.update');


// ==================== ADMIN ROUTES ====================

Route::prefix('admin')->middleware('auth')->group(function () {
    
    // --- DASHBOARD ADMIN ---
    Route::get('/', function () {
        // 1. Hitung galeri karena tabelnya sudah ada
        $totalGaleri = App\Models\Galeri::count();
        
        // 2. SET KE 0 SEMENTARA untuk fitur yang tabelnya belum dibuat
        $totalBerita = 0; 
        $totalInformasi = 0; 
        
        // 3. Ambil views dari Galeri saja dulu
        $totalViews = App\Models\Galeri::sum('views'); 

        return view('admin.dashboard', compact('totalGaleri', 'totalBerita', 'totalInformasi', 'totalViews'));
    })->name('admin.dashboard');
    
    // Resource Routes
    Route::resource('galeri', GaleriController::class)->names('admin.galeri');
    Route::resource('berita', BeritaController::class)->names('admin.berita');
    Route::resource('informasi', InformasiController::class)->names('admin.informasi');
    
    // Custom Route Toggle Status
    Route::post('galeri/toggle-status/{id}', [GaleriController::class, 'toggleStatus'])->name('admin.galeri.toggle-status');
});