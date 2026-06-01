<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Destinasi;
use App\Models\Review;
class DestinasiController extends Controller
{
    public function index()
    {
         = Destinasi::with('kategori')->get();
        return view('destinasi.index', compact('destinasi'));
    }

    // Biodiversity
    public function alam()
    {
         = 'Biodiversity';
         = 'Destinasi wisata alam di Sibaganding yang menampilkan keindahan geologi, perbukitan, dan panorama Danau Toba.';
         = Destinasi::whereHas('kategori', function() {
            ->where('nama', 'like', 'Alam%');
        })->get();
        return view('destinasi.kategori', compact('kategori','deskripsi','destinasi'));
    }

    // Geodiversity
    public function buatan()
    {
         = 'Geodiversity';
         = 'Destinasi wisata buatan yang dikembangkan sebagai daya tarik wisata, seperti taman, ikon, dan spot foto menarik.';
         = Destinasi::whereHas('kategori', function() {
            ->where('nama', 'Buatan');
        })->get();
        return view('destinasi.kategori', compact('kategori','deskripsi','destinasi'));
    }

    // Culturediversity
    public function budaya()
    {
         = 'Culturediversity';
         = 'Destinasi wisata budaya yang menampilkan adat istiadat, warisan leluhur, dan kehidupan masyarakat Batak Toba.';
         = Destinasi::whereHas('kategori', function() {
            ->where('nama', 'Budaya');
        })->get();
        return view('destinasi.kategori', compact('kategori','deskripsi','destinasi'));
    }

    public function show()
    {
         = Destinasi::with(['kategori', 'galeri', 'review'])->findOrFail();
        return view('destinasi.detail', compact('data'));
    }
}
