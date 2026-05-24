<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinasi;
use App\Models\Review; // Tambahan penting agar fungsi storeReview tidak error

class DestinasiController extends Controller
{
    // Halaman utama destinasi (semua kategori)
    public function index()
    {
        // Menggunakan with('kategori') agar performa query lebih cepat dan ringan
        $destinasi = Destinasi::with('kategori')->get();
        return view('destinasi.index', compact('destinasi'));
    }

    // ============================================
    // KATEGORI
    // ============================================

    // Destinasi Alam
    public function alam()
    {
        $kategori = 'Alam';
        $deskripsi = 'Destinasi wisata alam di Sibaganding yang menampilkan keindahan geologi, perbukitan, dan panorama Danau Toba.';

        // Memanggil semua kategori yang berawalan kata "Alam" (Biodiversity, Geodiversity, Culture)
        $destinasi = Destinasi::whereHas('kategori', function($query) {
            $query->where('nama', 'like', 'Alam%');
        })->get();

        return view('destinasi.kategori', compact('kategori','deskripsi','destinasi'));
    }

    // Destinasi Buatan
    public function buatan()
    {
        $kategori = 'Buatan';
        $deskripsi = 'Destinasi wisata buatan yang dikembangkan sebagai daya tarik wisata, seperti taman, ikon, dan spot foto menarik.';

        // Memanggil kategori yang namanya persis "Buatan"
        $destinasi = Destinasi::whereHas('kategori', function($query) {
            $query->where('nama', 'Buatan');
        })->get();

        return view('destinasi.kategori', compact('kategori','deskripsi','destinasi'));
    }

    // Destinasi Budaya
    public function budaya()
    {
        $kategori = 'Budaya';
        $deskripsi = 'Destinasi wisata budaya yang menampilkan adat istiadat, warisan leluhur, dan kehidupan masyarakat Batak Toba.';

        // Memanggil kategori yang namanya persis "Budaya"
        $destinasi = Destinasi::whereHas('kategori', function($query) {
            $query->where('nama', 'Budaya');
        })->get();

        return view('destinasi.kategori', compact('kategori','deskripsi','destinasi'));
    }

    // ============================================
    // DETAIL & REVIEW
    // ============================================

    // DETAIL
    public function show($id)
    {
        // Sekalian memuat data relasi kategori agar bisa ditampilkan di halaman detail
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
