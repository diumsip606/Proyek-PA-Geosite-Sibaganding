<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinasi;
use App\Models\Review;

class DestinasiController extends Controller
{
    // Halaman utama destinasi (semua kategori)
    public function index()
    {
        // Menampilkan semua destinasi yang statusnya aktif (true)
        $destinasi = Destinasi::with('kategori')->where('status', true)->get();
        return view('destinasi.index', compact('destinasi'));
    }

    // ============================================
    // 3 PILAR GEOPARK
    // ============================================

    public function geodiversity()
    {
        $kategori = 'Geodiversity';
        $deskripsi = 'Keragaman geologi, seperti batuan, mineral, fosil, dan struktur geologi yang menjadi jejak sejarah bumi di Sibaganding.';

        $destinasi = Destinasi::whereHas('kategori', function($query) {
            $query->where('nama', 'Geodiversity');
        })->where('status', true)->get();

        return view('destinasi.kategori', compact('kategori','deskripsi','destinasi'));
    }

    public function biodiversity()
    {
        $kategori = 'Biodiversity';
        $deskripsi = 'Keanekaragaman hayati, flora dan fauna endemik yang hidup dan dilindungi di kawasan Geosite Sibaganding.';

        $destinasi = Destinasi::whereHas('kategori', function($query) {
            $query->where('nama', 'Biodiversity');
        })->where('status', true)->get();

        return view('destinasi.kategori', compact('kategori','deskripsi','destinasi'));
    }

    public function cultureDiversity()
    {
        $kategori = 'Culture Diversity';
        $deskripsi = 'Keragaman budaya, adat istiadat, dan warisan leluhur masyarakat lokal yang hidup selaras dengan alam di Sibaganding.';

        $destinasi = Destinasi::whereHas('kategori', function($query) {
            $query->where('nama', 'Culture Diversity');
        })->where('status', true)->get();

        return view('destinasi.kategori', compact('kategori','deskripsi','destinasi'));
    }

    // ============================================
    // DETAIL & REVIEW
    // ============================================

    // DETAIL
    public function show($id)
    {
        // Sekalian memuat data relasi kategori, galeri, dan review agar bisa ditampilkan di detail
        $data = Destinasi::with(['kategori', 'galeri', 'review'])->findOrFail($id);
        return view('destinasi.detail', compact('data'));
    }

    // SIMPAN REVIEW
    public function storeReview(Request $request, $id)
    {
        Review::create([
            'destinasi_id' => $id,
            'nama' => $request->nama,
            'komentar' => $request->komentar,
            'rating' => $request->rating
        ]);

        return back();
    }
}
