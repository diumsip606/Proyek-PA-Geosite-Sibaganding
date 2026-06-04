<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::with('kategori')
                    ->where('status', 1)
                    ->latest()
                    ->get();

        $beritaFormatted = $berita->map(function($item) {
            return [
                'id' => $item->id,
                'title' => $item->judul,
                'slug' => $item->slug,
                'excerpt' => \Illuminate\Support\Str::limit(strip_tags($item->konten), 120),
                'image' => $item->gambar ? asset($item->gambar) : asset('images/sibaganding1.JPG'),
                'date' => $item->tanggal_terbit ? \Carbon\Carbon::parse($item->tanggal_terbit)->format('d M Y') : '',
                'link' => $item->link,
            ];
        });

        // Ambil SEMUA gambar berita untuk slideshow background hero
        $sliderImages = $berita->map(function($item) {
            return $item->gambar
                ? asset($item->gambar)
                : asset('images/sibaganding1.JPG');
        })->unique()->values()->toArray();

        // Jika tidak ada berita sama sekali, gunakan default Geosite
        if (empty($sliderImages)) {
            $sliderImages = [asset('images/sibaganding1.JPG')];
        }

        return view('pages.berita', compact('berita', 'beritaFormatted', 'sliderImages'));
    }

    public function show($slug)
    {
        $berita = Berita::with('kategori')->where('slug', $slug)->firstOrFail();

        $otherBerita = Berita::with('kategori')
                            ->where('slug', '!=', $slug)
                            ->where('status', 1)
                            ->latest()
                            ->limit(3)
                            ->get();

        return view('pages.berita-detail', compact('berita', 'otherBerita'));
    }
}
