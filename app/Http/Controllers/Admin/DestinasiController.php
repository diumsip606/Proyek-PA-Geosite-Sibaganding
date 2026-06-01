<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destinasi;
use Illuminate\Http\Request;

class DestinasiController extends Controller
{
    public function index()
    {
        $destinasi = Destinasi::all();
        // Nanti kamu harus buat file view ini di resources/views/admin/destinasi/index.blade.php
        return view('admin.destinasi.index', compact('destinasi'));
    }

    /**
     * Menampilkan destinasi berdasarkan kategori dari database.
     */
    private function showKategori(string $kategoriNama, string $deskripsi)
    {
        // Menggunakan whereHas karena di migration kamu menggunakan relasi kategori_id
        $destinasi = Destinasi::whereHas('kategori', function($query) use ($kategoriNama) {
            $query->where('nama', $kategoriNama);
        })->where('status', true)->get();

        // Pastikan view mengarah ke folder admin
        return view('admin.destinasi.kategori', compact('destinasi'))
            ->with('kategori', $kategoriNama)
            ->with('deskripsi', $deskripsi);
    }

    // Pilar Geodiversity
    public function geodiversity()
    {
        return $this->showKategori(
            'Geodiversity',
            'Keragaman geologi, seperti batuan, mineral, fosil, dan struktur geologi yang menjadi jejak sejarah bumi di Sibaganding.'
        );
    }

    // Pilar Biodiversity
    public function biodiversity()
    {
        return $this->showKategori(
            'Biodiversity',
            'Keanekaragaman hayati, flora dan fauna endemik yang hidup dan dilindungi di kawasan Geosite Sibaganding.'
        );
    }

    // Pilar Culture Diversity
    public function cultureDiversity()
    {
        return $this->showKategori(
            'Culture Diversity',
            'Keragaman budaya, adat istiadat, dan warisan leluhur masyarakat lokal yang hidup selaras dengan alam di Sibaganding.'
        );
    }

    /**
     * Menampilkan halaman detail destinasi berdasarkan slug.
     */
    public function detail(string $slug)
    {
        $destinasi = Destinasi::where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        // Pastikan view mengarah ke folder admin
        return view('admin.destinasi.detail', compact('destinasi'));
    }
}
