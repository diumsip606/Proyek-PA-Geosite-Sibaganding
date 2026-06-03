<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Destinasi;
use App\Models\Review;
class DestinasiController extends Controller
{
    public function index()
    {
        // Menampilkan semua destinasi yang statusnya aktif (true)
        $destinasi = Destinasi::with('kategori')->where('status', true)->get();
        
        $heroImage = Destinasi::where('status', true)->whereNotNull('gambar_utama')->inRandomOrder()->value('gambar_utama');
        
        $bioImage = Destinasi::whereHas('kategori', function($q){ $q->where('nama', 'Biodiversity'); })->where('status', true)->whereNotNull('gambar_utama')->inRandomOrder()->value('gambar_utama');
        $geoImage = Destinasi::whereHas('kategori', function($q){ $q->where('nama', 'Geodiversity'); })->where('status', true)->whereNotNull('gambar_utama')->inRandomOrder()->value('gambar_utama');
        $cultureImage = Destinasi::whereHas('kategori', function($q){ $q->where('nama', 'Culture Diversity'); })->where('status', true)->whereNotNull('gambar_utama')->inRandomOrder()->value('gambar_utama');

        return view('destinasi.index', compact('destinasi', 'heroImage', 'bioImage', 'geoImage', 'cultureImage'));
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

        $heroImage = Destinasi::whereHas('kategori', function($query) {
            $query->where('nama', 'Geodiversity');
        })->where('status', true)->whereNotNull('gambar_utama')->inRandomOrder()->value('gambar_utama');

        return view('destinasi.kategori', compact('kategori','deskripsi','destinasi','heroImage'));
    }

    public function biodiversity()
    {
        $kategori = 'Biodiversity';
        $deskripsi = 'Keanekaragaman hayati, flora dan fauna endemik yang hidup dan dilindungi di kawasan Geosite Sibaganding.';

        $destinasi = Destinasi::whereHas('kategori', function($query) {
            $query->where('nama', 'Biodiversity');
        })->where('status', true)->get();

        $heroImage = Destinasi::whereHas('kategori', function($query) {
            $query->where('nama', 'Biodiversity');
        })->where('status', true)->whereNotNull('gambar_utama')->inRandomOrder()->value('gambar_utama');

        return view('destinasi.kategori', compact('kategori','deskripsi','destinasi','heroImage'));
    }

    public function cultureDiversity()
    {
        $kategori = 'Culture Diversity';
        $deskripsi = 'Keragaman budaya, adat istiadat, dan warisan leluhur masyarakat lokal yang hidup selaras dengan alam di Sibaganding.';

        $destinasi = Destinasi::whereHas('kategori', function($query) {
            $query->where('nama', 'Culture Diversity');
        })->where('status', true)->get();

        $heroImage = Destinasi::whereHas('kategori', function($query) {
            $query->where('nama', 'Culture Diversity');
        })->where('status', true)->whereNotNull('gambar_utama')->inRandomOrder()->value('gambar_utama');

        return view('destinasi.kategori', compact('kategori','deskripsi','destinasi','heroImage'));
    }

    public function show($id)
    {
        // Sekalian memuat data relasi kategori, galeri, dan review agar bisa ditampilkan di detail
        $data = Destinasi::with(['kategori', 'review'])->findOrFail($id);
        
        // Mengambil destinasi lain untuk bagian "Destinasi Lainnya"
        $otherDestinasi = Destinasi::where('id', '!=', $id)->where('status', true)->inRandomOrder()->limit(3)->get();
        
        return view('destinasi.detail', compact('data', 'otherDestinasi'));
    }


}
