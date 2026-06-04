<?php

namespace Database\Seeders;

use App\Models\Informasi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class InformasiSeeder extends Seeder
{
    public function run()
    {
        $informasi = [
            [
                'judul' => 'Sejarah Danau Toba',
                'slug' => 'sejarah-danau-toba',
                'konten' => '<p>Danau Toba terbentuk dari letusan supervolcano sekitar 74.000 tahun yang lalu. Letusan ini merupakan salah satu letusan terbesar dalam sejarah bumi.</p><p>Danau Toba memiliki panjang sekitar 100 km dan lebar 30 km, menjadikannya danau vulkanik terbesar di dunia.</p>',
                'gambar' => '/image/toba.jpg',
                'kategori' => 'Geologi',
                'penulis' => 'Admin GeoToba',
                'status' => true,
                'views' => 0
            ],
            [
                'judul' => 'Budaya Batak Toba',
                'slug' => 'budaya-batak-toba',
                'konten' => '<p>Masyarakat Batak Toba memiliki kekayaan budaya yang luar biasa. Mulai dari tarian tortor, musik gondang, hingga upacara adat yang masih dilestarikan.</p><p>Rumah adat Batak dengan arsitektur khasnya juga menjadi daya tarik tersendiri bagi wisatawan.</p>',
                'gambar' => '/image/meat.jpg',
                'kategori' => 'Budaya',
                'penulis' => 'Admin GeoToba',
                'status' => true,
                'views' => 0
            ],
            [
                'judul' => 'Transportasi Menuju Danau Toba',
                'slug' => 'transportasi-danau-toba',
                'konten' => '<p>Danau Toba dapat diakses melalui Bandara Internasional Silangit atau perjalanan darat dari Medan sekitar 4-5 jam.</p><p>Tersedia berbagai pilihan transportasi seperti bus, travel, rental mobil, dan kapal feri untuk menuju pulau Samosir.</p>',
                'gambar' => null,
                'kategori' => 'Transportasi',
                'penulis' => 'Admin GeoToba',
                'status' => true,
                'views' => 0
            ],
            [
                'judul' => 'Andy Agustian Manik',
                'slug' => 'andy-agustian-manik',
                'konten' => '<p>Bertanggung jawab mengoordinasikan seluruh pengelolaan kawasan Geosite Sibaganding termasuk pengembangan sarana prasarana, program edukasi, konservasi lingkungan, serta kemitraan strategis dengan berbagai pihak eksternal untuk kemajuan geowisata di Danau Toba.</p>',
                'gambar' => 'uploads/informasi/1780493952_pak andy.jpg',
                'kategori' => 'Pengurus',
                'penulis' => 'MANAGER PUSAT INFORMASI GEOPARK CALDERA TOBA',
                'status' => true,
                'views' => 0
            ],
            [
                'judul' => 'Corry Paroma Panjaitan,S.H.',
                'slug' => 'corry-paroma-panjaitan-sh',
                'konten' => '<p>Bertugas mendampingi seluruh kegiatan lapangan di kawasan Geosite Sibaganding, memimpin pemberdayaan kelompok sadar wisata (Pokdarwis) setempat, serta mengoordinasikan program kebersihan, keamanan, dan pelayanan demi kenyamanan pengunjung.</p>',
                'gambar' => 'uploads/informasi/1780493852_bu corry.jpg',
                'kategori' => 'Pengurus',
                'penulis' => 'KORDINATOR POKJA GEOPARK KALDERA TOBA',
                'status' => true,
                'views' => 0
            ]
        ];

        foreach ($informasi as $item) {
            Informasi::updateOrCreate(['slug' => $item['slug']], $item);
        }
    }
}