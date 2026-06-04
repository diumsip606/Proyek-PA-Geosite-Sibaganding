<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GaleriSeeder extends Seeder
{
    public function run()
    {
        // 1. Ambil ID dari masing-masing kategori dulu
        $idBio = \App\Models\Kategori::where('nama', 'Biodiversity')->first()->id;
        $idGeo = \App\Models\Kategori::where('nama', 'Geodiversity')->first()->id;
        $idCulture = \App\Models\Kategori::where('nama', 'Culture diversity')->first()->id;

        // 2. Masukkan ke dalam array data galeri
        $galeris = [
            // --- DATA 1 ---
            [
                'judul'       => 'Monyet Ekor Panjang',
                'deskripsi'   => 'Monyet ekor panjang (Macaca fascicularis) merupakan salah satu spesies primata yang menghuni kawasan Geosite Sibaganding, tepatnya di Monkey Forest Sibaganding. Kehadiran satwa ini menjadi salah satu daya tarik utama bagi para wisatawan yang berkunjung karena mereka memiliki perilaku yang unik di habitatnya.',
                'gambar'      => '/image/monyet.jpg',
                'kategori_id' => $idBio, // <-- SUDAH BENAR
                'lokasi'      => 'Monkey Forest',
                'status'      => true,
            ],
            // --- DATA 2 (Ini yang bikin error tadi) ---
            [
                'judul'       => 'Batu Sabak',
                'deskripsi'   => 'Jarak dekat pecahan batu sabak berukuran kecil. Patahan batu ini memperlihatkan pola alami yang menarik pada bagian dalamnya, menyerupai kerang atau jejak struktur geologi yang menjadi salah satu daya tarik kawasan Geosite Sibaganding.',
                'gambar'      => '/image/batu_gantung.jpg',
                'kategori_id' => $idGeo, // disini buat ngubah kategori geo
                'lokasi'      => 'Geosite Sibaganding',
                'status'      => true,
            ],
            // --- DATA 3 (Kalau ada Legenda Batu Gantung, dsb) ---
            [
                'judul'       => 'Jabu Bolon',
                'deskripsi'   => 'Jabu Bolon atau Rumah Bolon merupakan rumah adat tradisional masyarakat Batak. Ciri khas utamanya sangat terlihat dari bentuk atap segitiga lancip yang menjulang tinggi serta struktur bangunannya yang berupa rumah panggung dan ditopang oleh tiang-tiang penyangga.',
                'gambar'      => '/image/legenda.jpg',
                'kategori_id' => $idCulture, // <-- PASTIKAN INI JUGA DIUBAH
                'lokasi'      => 'Geosite Sibaganding, Parapat',
                'status'      => true,
            ],
        ];

        // 3. Simpan ke database
        foreach ($galeris as $item) {
            Galeri::create($item);
        }
    }

}
