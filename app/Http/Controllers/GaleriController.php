<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Kategori;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Halaman galeri publik — dinamis dari DB
     */
    public function index()
    {
        // 1. Ambil gambar Hero
        $hero = Galeri::where('is_hero', true)->first();

        // 2. Ambil semua galeri aktif beserta relasi kategori
        $allGaleri = Galeri::with('kategori')
            ->where('status', true)
            ->orderBy('created_at', 'desc')
            ->get();

        // 3. Kelompokkan berdasarkan nama kategori (dari relasi, bukan kolom string)
        $galeriByKategori = $allGaleri->groupBy(function ($item) {
            return $item->kategori->nama ?? 'Lainnya';
        });

        // 4. Daftar kategori untuk filter tab
        $kategoris = Kategori::orderBy('nama')->get();

        return view('pages.galeri', compact('galeriByKategori', 'hero', 'kategoris'));
    }
}
