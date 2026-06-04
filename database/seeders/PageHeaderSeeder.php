<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageHeader;

class PageHeaderSeeder extends Seeder
{
    public function run(): void
    {
        $headers = [
            [
                'page_name' => 'informasi',
                'label'     => 'Halaman Informasi',
                'title'     => 'Sejarah Caldera Toba',
                'subtitle'  => 'Warisan Geologi Kelas Dunia',
                'gambar'    => 'images/sibaganding1.JPG',
            ],
            [
                'page_name' => 'galeri',
                'label'     => 'Halaman Galeri',
                'title'     => 'SIBAGANDING',
                'subtitle'  => 'Dokumentasi keindahan alam dan keanekaragaman Geosite Sibaganding',
                'gambar'    => 'images/galleri-1.jpg',
            ],
            [
                'page_name' => 'berita',
                'label'     => 'Halaman Berita',
                'title'     => 'Berita & Event',
                'subtitle'  => 'Informasi terkini seputar Geopark Danau Toba',
                'gambar'    => 'images/sibaganding3.jpg',
            ],
            [
                'page_name' => 'kontak',
                'label'     => 'Halaman Kontak',
                'title'     => 'Hubungi Kami',
                'subtitle'  => 'Senang mendengar dari Anda',
                'gambar'    => 'images/sibaganding2.JPG',
            ],
            [
                'page_name' => 'destinasi',
                'label'     => 'Halaman Destinasi (Utama)',
                'title'     => 'Destinasi Sibaganding',
                'subtitle'  => 'Jelajahi tiga pilar utama Geosite Sibaganding — Biodiversity, Geodiversity, dan Culture Diversity',
                'gambar'    => 'images/sibaganding4.jpg',
            ],
            [
                'page_name' => 'biodiversity',
                'label'     => 'Destinasi Biodiversity',
                'title'     => 'Destinasi Biodiversity',
                'subtitle'  => 'Keanekaragaman hayati, flora dan fauna endemik yang hidup dan dilindungi di kawasan Geosite Sibaganding.',
                'gambar'    => 'images/sibaganding5.JPG',
            ],
            [
                'page_name' => 'geodiversity',
                'label'     => 'Destinasi Geodiversity',
                'title'     => 'Destinasi Geodiversity',
                'subtitle'  => 'Keragaman geologi, seperti batuan, mineral, fosil, dan struktur geologi yang menjadi jejak sejarah bumi di Sibaganding.',
                'gambar'    => 'images/sibaganding6.jpg',
            ],
            [
                'page_name' => 'culture-diversity',
                'label'     => 'Destinasi Culture Diversity',
                'title'     => 'Destinasi Culture Diversity',
                'subtitle'  => 'Keragaman budaya, adat istiadat, dan warisan leluhur masyarakat lokal yang hidup selaras dengan alam di Sibaganding.',
                'gambar'    => 'images/sibaganding7.JPG',
            ],
        ];

        foreach ($headers as $data) {
            PageHeader::updateOrCreate(
                ['page_name' => $data['page_name']],
                $data
            );
        }
    }
}
