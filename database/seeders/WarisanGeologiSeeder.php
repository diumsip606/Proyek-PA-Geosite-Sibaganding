<?php

namespace Database\Seeders;

use App\Models\WarisanGeologi;
use Illuminate\Database\Seeder;

class WarisanGeologiSeeder extends Seeder
{
    public function run()
    {
        $slides = [
            [
                'sub_judul' => 'SLIDE 01 — TERBENTUKNYA DANAU TOBA',
                'judul' => 'Letusan Purba yang Melahirkan Danau Toba',
                'deskripsi' => 'Sekitar 74.000 tahun lalu, letusan supervolcano membentuk kaldera raksasa yang kemudian dikenal sebagai Danau Toba. Dari peristiwa inilah lahir bentang alam megah yang menjadi dasar cerita geologi kawasan ini.',
                'gambar' => 'images/danau toba home.jpg',
                'card_angka' => '74k',
                'card_teks' => 'Tahun lalu letusan supervolcano melahirkan Danau Toba purba.',
                'urutan' => 1,
                'status' => true
            ],
            [
                'sub_judul' => 'SLIDE 02 — KALDERA GEOPARK',
                'judul' => 'Kaldera Besar yang Menjadi Identitas Geopark Toba',
                'deskripsi' => 'Tebing, perbukitan, batuan, dan panorama Danau Toba memperlihatkan jejak geologi yang bernilai tinggi. Kawasan ini bukan hanya indah dipandang, tetapi juga menyimpan pengetahuan tentang sejarah bumi.',
                'gambar' => 'images/caldera.jpg',
                'card_angka' => '2020',
                'card_teks' => 'Danau Toba resmi diakui dunia sebagai UNESCO Global Geopark.',
                'urutan' => 2,
                'status' => true
            ],
            [
                'sub_judul' => 'SLIDE 03 — SIBAGANDING',
                'judul' => 'Sibaganding, Ruang Kecil dengan Cerita Alam yang Besar',
                'deskripsi' => 'Sibaganding menjadi bagian dari wajah Geopark Toba yang dekat dengan masyarakat. Di sini, cerita tentang alam, satwa, budaya Batak, dan kehidupan lokal bertemu dalam satu kawasan yang dapat dijelajahi.',
                'gambar' => 'images/sibaganding1.JPG',
                'card_angka' => '3',
                'card_teks' => 'Pilar utama bertemu di sini: Geodiversity, Biodiversity, dan Culturediversity.',
                'urutan' => 3,
                'status' => true
            ],
            [
                'sub_judul' => 'SLIDE 04 — UNESCO GLOBAL GEOPARK',
                'judul' => 'Danau Toba Diakui Dunia sebagai Warisan Geologi',
                'deskripsi' => 'Pengakuan UNESCO Global Geopark memperkuat posisi Danau Toba sebagai kawasan bernilai dunia. Sibaganding menjadi salah satu ruang untuk mengenalkan warisan alam, edukasi, konservasi, dan budaya kepada pengunjung.',
                'gambar' => 'images/unesco-toba.jpg',
                'card_angka' => '1',
                'card_teks' => 'Toba diakui sebagai warisan dunia terpenting bagi peradaban geologi.',
                'urutan' => 4,
                'status' => true
            ]
        ];

        foreach ($slides as $slide) {
            WarisanGeologi::create($slide);
        }
    }
}
