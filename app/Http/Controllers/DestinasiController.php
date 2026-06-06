<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Destinasi;
use App\Models\Review;
class DestinasiController extends Controller
{
public function index()
{
    $destinasi = Destinasi::with('kategori')->where('status', 1)->get();

    // Ambil 1 gambar representatif per kategori
    $gambarBio = Destinasi::whereHas('kategori', fn($q) => $q->where('nama', 'Biodiversity'))
        ->where('status', 1)->whereNotNull('gambar_utama')
        ->inRandomOrder()->value('gambar_utama');

    $gambarGeo = Destinasi::whereHas('kategori', fn($q) => $q->where('nama', 'Geodiversity'))
        ->where('status', 1)->whereNotNull('gambar_utama')
        ->inRandomOrder()->value('gambar_utama');

    $gambarCulture = Destinasi::whereHas('kategori', fn($q) => $q->where('nama', 'Culture diversity'))
        ->where('status', 1)->whereNotNull('gambar_utama')
        ->inRandomOrder()->value('gambar_utama');

    $pageHeader = \App\Models\PageHeader::where('page_name', 'destinasi')->first();

    return view('pages.destinasi.index', compact(
        'destinasi', 'gambarBio', 'gambarGeo', 'gambarCulture', 'pageHeader'
    ));
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

        return view('pages.destinasi.kategori', compact('kategori','deskripsi','destinasi','heroImage'));
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

        return view('pages.destinasi.kategori', compact('kategori','deskripsi','destinasi','heroImage'));
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

        return view('pages.destinasi.kategori', compact('kategori','deskripsi','destinasi','heroImage'));
    }

    public function show($id)
    {
        // Sekalian memuat data relasi kategori, galeri, dan review agar bisa ditampilkan di detail
        $data = Destinasi::with(['kategori', 'review'])->findOrFail($id);

        // Mengambil destinasi lain untuk bagian "Destinasi Lainnya"
        $otherDestinasi = Destinasi::where('id', '!=', $id)->where('status', true)->inRandomOrder()->limit(3)->get();

        return view('pages.destinasi.detail', compact('data', 'otherDestinasi'));
    }


}
