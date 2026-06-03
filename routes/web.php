<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Models\Informasi;
use App\Models\Galeri;
use App\Models\Berita;
use App\Models\Kategori;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Admin\DestinasiController as AdminDestinasiController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\InformasiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\WarisanGeologiController;
use App\Http\Controllers\Admin\FaktaUnikController;



/*
|--------------------------------------------------------------------------
| LANGUAGE ROUTE (FIXED)
|--------------------------------------------------------------------------
*/
Route::get('/lang/{lang}', function ($lang) {

    // hanya izinkan id & en
    if (!in_array($lang, ['id', 'en'])) {
        abort(404);
    }

    // simpan ke session
    session(['lang' => $lang]);

    // set langsung
    App::setLocale($lang);

    return redirect()->back();

})->name('lang.switch');


/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES
|--------------------------------------------------------------------------
*/

// HOME
Route::get('/', [HomeController::class, 'index'])->name('home');

// INFORMASI
Route::get('/informasi', function () {
    $informasi = Informasi::where('status', true)
        ->latest()
        ->paginate(10);

    return view('pages.informasi', compact('informasi'));
})->name('informasi');

// DESTINASI (Menggunakan 3 Pilar)
Route::get('/destinasi', [DestinasiController::class, 'index'])->name('destinasi');
Route::get('/destinasi/geodiversity', [DestinasiController::class, 'geodiversity'])->name('destinasi.geodiversity');
Route::get('/destinasi/biodiversity', [DestinasiController::class, 'biodiversity'])->name('destinasi.biodiversity');
Route::get('/destinasi/culture-diversity', [DestinasiController::class, 'cultureDiversity'])->name('destinasi.culture-diversity');

// DETAIL DESTINASI
Route::get('/destinasi/{id}', [DestinasiController::class, 'show'])->name('destinasi.show');

// GALERI
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');

// BERITA
Route::get('/berita', function () {
    $berita = Berita::with('kategori')
        ->where('status', true)
        ->latest()
        ->paginate(9);

    $kategori = Kategori::all();

    return view('pages.berita', compact('berita', 'kategori'));
})->name('berita');

// DETAIL BERITA
Route::get('/berita/{slug}', function ($slug) {
    $berita = Berita::with('kategori')
        ->where('slug', $slug)
        ->firstOrFail();

    $berita->increment('views');

    return view('pages.berita-detail', compact('berita'));
})->name('berita.detail');

// DETAIL GALERI
Route::get('/galeri/{slug}', function ($slug) {
    $galeri = Galeri::where('slug', $slug)->firstOrFail();
    $galeri->increment('views');

    return view('pages.galeri-detail', compact('galeri'));
})->name('galeri.detail');

// UMKM
Route::get('/umkm', [HomeController::class, 'umkm'])->name('umkm');

// BUDAYA
Route::get('/budaya', [HomeController::class, 'budaya'])->name('budaya');

// KONTAK
Route::get('/kontak', function () {
    return view('pages.kontak');
})->name('kontak');


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Lupa Password Routes
Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware('auth')->group(function () {


    Route::get('/', function () {

        $totalGaleri = Galeri::count();
        $totalBerita = Berita::count();
        $totalInformasi = Informasi::count();
        $totalDestinasi = \App\Models\Destinasi::count();
        $totalViews = \App\Models\Visitor::count();

        return view('admin.dashboard', compact(
            'totalGaleri',
            'totalBerita',
            'totalInformasi',
            'totalDestinasi',
            'totalViews'
        ));
    })->name('admin.dashboard');

    Route::resource('galeri', AdminGaleriController::class)->names('admin.galeri');
    Route::resource('berita', BeritaController::class)->names('admin.berita');
    Route::resource('informasi', InformasiController::class)->names('admin.informasi');
    Route::resource('destinasi', AdminDestinasiController::class)->names('admin.destinasi');
    Route::resource('hero-slider', \App\Http\Controllers\Admin\HeroSliderController::class)->names('admin.hero-slider');
    Route::resource('fakta-unik', FaktaUnikController::class)->names('admin.fakta-unik');
    Route::resource('video-youtube', VideoYoutubeController::class)->names('admin.video-youtube');
    Route::resource('warisan-geologi', WarisanGeologiController::class)->names('admin.warisan-geologi');
    Route::resource('video-youtube', \App\Http\Controllers\Admin\VideoYoutubeController::class)->names('admin.video-youtube');
Route::resource('fakta-unik', FaktaUnikController::class)->names('admin.fakta-unik');
    // Rute untuk Admin Destinasi
    Route::resource('destinasi', AdminDestinasiController::class)->names('admin.destinasi');

    Route::post('galeri/toggle-status/{id}', [AdminGaleriController::class, 'toggleStatus'])
        ->name('admin.galeri.toggle-status');

    // ini mengarah ke edit background galeri
    Route::post('galeri/{id}/set-hero', [AdminGaleriController::class, 'setHero'])
        ->name('admin.galeri.set_hero');
    Route::post('galeri/{id}/unset-hero', [AdminGaleriController::class, 'unsetHero'])
        ->name('admin.galeri.unset_hero');
});
