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
                'judul'       => 'Monyet Ekor Panjang Sibaganding',
                'slug'        => 'monyet-ekor-panjang-sibaganding',
                'deskripsi'   => 'Fauna endemik...',
                'gambar'      => '/image/monyet.jpg',
                'kategori_id' => $idBio, // <-- SUDAH BENAR
                'lokasi'      => 'Geosite Sibaganding',
                'status'      => true,
                'views'       => 150,
            ],
            // --- DATA 2 (Ini yang bikin error tadi) ---
            [
                'judul'       => 'Batu Gantung',
                'slug'        => 'batu-gantung',
                'deskripsi'   => 'Fenomena geologi berupa formasi batuan...',
                'gambar'      => '/image/batu_gantung.jpg',
                'kategori_id' => $idGeo, // disini buat ngubah kategori geo
                'lokasi'      => 'Geosite Sibaganding',
                'status'      => true,
                'views'       => 320,
            ],
            // --- DATA 3 (Kalau ada Legenda Batu Gantung, dsb) ---
            [
                'judul'       => 'Legenda Batu Gantung',
                'slug'        => 'legenda-batu-gantung',
                'deskripsi'   => 'Cerita rakyat...',
                'gambar'      => '/image/legenda.jpg',
                'kategori_id' => $idCulture, // <-- PASTIKAN INI JUGA DIUBAH
                'lokasi'      => 'Geosite Sibaganding',
                'status'      => true,
                'views'       => 200,
            ],
        ];

        // 3. Simpan ke database
        foreach ($galeris as $item) {
            Galeri::create($item);
        }
    }

}