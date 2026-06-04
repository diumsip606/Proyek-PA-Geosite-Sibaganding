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

        // Ambil gambar berita terbaru untuk slideshow background hero (maksimal 5 gambar)
        $sliderImages = $berita->whereNotNull('gambar')->filter(function($item) {
            return !empty($item->gambar) && file_exists(public_path($item->gambar));
        })->pluck('gambar')->unique()->take(5)->map(function($img) {
            return asset($img);
        })->toArray();

        // Jika tidak ada gambar berita yang valid, gunakan default Geosite
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
