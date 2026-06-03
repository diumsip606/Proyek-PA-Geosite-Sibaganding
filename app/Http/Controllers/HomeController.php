<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Berita;
use App\Models\HeroSlider;
use App\Models\FaktaUnik;
use App\Models\WarisanGeologi;
use App\Models\VideoYoutube;
use App\Models\Informasi;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = HeroSlider::where('status', true)
            ->orderBy('urutan', 'asc')
            ->get();

        $faktaUniks = FaktaUnik::where('status', true)
            ->orderBy('nomor', 'asc')
            ->get();

        $warisanGeologis = WarisanGeologi::where('status', true)
            ->orderBy('urutan', 'asc')
            ->get();

        $videoYoutubes = VideoYoutube::where('status', true)
            ->orderBy('urutan', 'asc')
            ->get();

        // Galeri untuk section Galeri Keindahan di Beranda
        $galeriPreview = Galeri::where('status', true)
            ->latest()
            ->take(10)
            ->get();

        // Kalau masih ada bagian lain yang pakai variabel $galeri, samakan isinya
        $galeri = $galeriPreview;

        // Berita terkini untuk Beranda
        $berita = Berita::with('kategori')
            ->where('status', true)
            ->latest()
            ->take(4)
            ->get();

        $pengurus = Informasi::where('kategori', 'Pengurus')
            ->where('status', true)
            ->latest()
            ->get();

        $destinasi = [
            (object)[
                'slug' => 'meat',
                'nama' => 'Meat',
                'gambar' => '/images/meat/thumbnail.jpg',
                'deskripsi' => 'Desa adat dengan makam Raja Hunsa dan budaya Batak'
            ],
            (object)[
                'slug' => 'batu-bahisan',
                'nama' => 'Batu Bahisan',
                'gambar' => '/images/batu-bahisan/thumbnail.jpg',
                'deskripsi' => 'Formasi batuan unik dengan spot foto Instagramable'
            ],
            (object)[
                'slug' => 'liang-sipege',
                'nama' => 'Liang Sipege',
                'gambar' => '/images/liang-sipege/thumbnail.jpg',
                'deskripsi' => 'Goa alami dengan stalaktit dan stalakmit'
            ]
        ];

        return view('pages.home', compact(
            'sliders',
            'faktaUniks',
            'warisanGeologis',
            'videoYoutubes',
            'galeriPreview',
            'galeri',
            'berita',
            'pengurus',
            'destinasi'
        ));
    }
}