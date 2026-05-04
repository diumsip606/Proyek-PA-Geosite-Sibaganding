<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GaleriSeeder extends Seeder
{
    public function run()
    {
        $galeri = [
            // --- BIODIVERSITY ---
            [
                'judul' => 'Monyet Ekor Panjang Sibaganding',
                'slug' => 'monyet-ekor-panjang-sibaganding',
                'deskripsi' => 'Fauna endemik yang menjadi daya tarik utama di kawasan hutan Sibaganding.',
                'gambar' => '/image/monyet.jpg', // Pastikan file ini nanti ada, atau pakai gambar dummy sementara
                'kategori' => 'Biodiversity',
                'lokasi' => 'Geosite Sibaganding',
                'status' => true,
                'views' => 150
            ],

            // --- GEODIVERSITY ---
            [
                'judul' => 'Batu Gantung',
                'slug' => 'batu-gantung',
                'deskripsi' => 'Fenomena geologi berupa formasi batuan yang tampak menggantung di tebing.',
                'gambar' => '/image/batu_gantung.jpg',
                'kategori' => 'Geodiversity',
                'lokasi' => 'Geosite Sibaganding',
                'status' => true,
                'views' => 320
            ],

            // --- CULTURE DIVERSITY ---
            [
                'judul' => 'Legenda Batu Gantung',
                'slug' => 'legenda-batu-gantung',
                'deskripsi' => 'Situs yang erat kaitannya dengan cerita rakyat dan budaya lokal masyarakat sekitar.',
                'gambar' => '/image/budaya.jpg',
                'kategori' => 'Culture diversity',
                'lokasi' => 'Geosite Sibaganding',
                'status' => true,
                'views' => 200
            ],
        ];

        foreach ($galeri as $item) {
            Galeri::create($item);
        }
    }
}