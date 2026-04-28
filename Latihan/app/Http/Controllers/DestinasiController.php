<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinasi;

class DestinasiController extends Controller
{
    // Halaman utama destinasi (semua kategori)
    public function index()
    {
        $destinasi = Destinasi::all();
        return view('destinasi.index', compact('destinasi'));
    }
    // Kategori
    // Destinasi Alam
    public function alam()
    {
        $kategori = 'Alam';
        $destinasi = Destinasi::where('kategori','Alam')->get();
        return view('destinasi.kategori', compact('kategori','destinasi'));
    }
    
    // Destinasi Buatan
    public function buatan()
    {
        $kategori = 'Buatan';
        $destinasi = Destinasi::where('kategori','Buatan')->get();
        return view('destinasi.kategori', compact('kategori','destinasi'));
    }
    
    // Destinasi Budaya
    public function budaya()
    {
        $kategori = 'Budaya';
        $destinasi = Destinasi::where('kategori','Budaya')->get();
        return view('destinasi.kategori', compact('kategori','destinasi'));
    }
    
    // DETAIL
    public function show($id)
    {
        $data = Destinasi::with(['galeri','review'])->findOrFail($id);
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
