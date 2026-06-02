<?php

namespace Database\Seeders;

use App\Models\FaktaUnik;
use Illuminate\Database\Seeder;

class FaktaUnikSeeder extends Seeder
{
    public function run()
    {
        $faktas = [
            [
                'nomor' => '01',
                'judul' => 'Taman Wisata Kera Sibaganding',
                'deskripsi' => 'Pengunjung dapat melihat monyet ekor panjang dan siamang yang hidup di kawasan hutan sekitar Sibaganding. Area ini menjadi salah satu daya tarik alam yang dekat dengan jalur wisata Danau Toba.',
                'tag' => 'Satwa Liar,Hutan,Ekowisata',
                'x_koordinat' => 38.0,
                'y_koordinat' => 35.0,
                'status' => true
            ],
            [
                'nomor' => '02',
                'judul' => 'Kampung Warna-Warni Tigarihit',
                'deskripsi' => 'Kawasan Tigarihit dikenal dengan rumah-rumah berwarna cerah yang mempercantik lereng Parapat. Tempat ini menarik untuk foto, wisata keluarga, dan menikmati suasana tepi Danau Toba.',
                'tag' => 'Spot Foto,Kampung Wisata,Parapat',
                'x_koordinat' => 52.0,
                'y_koordinat' => 49.0,
                'status' => true
            ],
            [
                'nomor' => '03',
                'judul' => 'Akses Strategis Danau Toba',
                'deskripsi' => 'Sibaganding berada dekat dengan Parapat, salah satu pintu masuk utama menuju Danau Toba dan Pulau Samosir. Lokasinya cocok menjadi titik singgah wisatawan.',
                'tag' => 'Akses Wisata,Danau Toba,Parapat',
                'x_koordinat' => 47.0,
                'y_koordinat' => 63.0,
                'status' => true
            ],
            [
                'nomor' => '04',
                'judul' => 'Legenda Batu Gantung',
                'deskripsi' => 'Batu Gantung merupakan ikon cerita rakyat di kawasan Danau Toba. Bentuk batu yang menjorok dari tebing membuatnya menjadi destinasi yang kuat dari sisi geologi, legenda, dan budaya.',
                'tag' => 'Legenda,Budaya,Geosite',
                'x_koordinat' => 66.0,
                'y_koordinat' => 42.0,
                'status' => true
            ],
            [
                'nomor' => '05',
                'judul' => 'Panorama Lereng dan Danau',
                'deskripsi' => 'Bentang alam Sibaganding memperlihatkan perpaduan lereng hijau, kawasan hutan, dan pemandangan Danau Toba. Area ini cocok untuk menikmati udara sejuk dan fotografi alam.',
                'tag' => 'Panorama,Landscape,Alam',
                'x_koordinat' => 32.0,
                'y_koordinat' => 58.0,
                'status' => true
            ],
            [
                'nomor' => '06',
                'judul' => 'Kawasan Edukasi Geopark',
                'deskripsi' => 'Sibaganding dapat dikembangkan sebagai ruang edukasi mengenai konservasi, geologi Danau Toba, dan kekayaan hayati. Pengunjung tidak hanya berwisata, tetapi juga belajar tentang alam dan budaya lokal.',
                'tag' => 'Edukasi,Geopark,Konservasi',
                'x_koordinat' => 56.0,
                'y_koordinat' => 29.0,
                'status' => true
            ],
            [
                'nomor' => '07',
                'judul' => 'Hutan Lindung Sibaganding',
                'deskripsi' => 'Merupakan bagian dari sabuk hijau penyangga ekosistem Danau Toba. Hutan alam ini menjadi rumah bagi flora khas pegunungan dan tempat petualangan trekking yang menantang.',
                'tag' => 'Trekking,Sabuk Hijau,Eksplorasi',
                'x_koordinat' => 45.0,
                'y_koordinat' => 22.0,
                'status' => true
            ],
            [
                'nomor' => '08',
                'judul' => 'Pusat Kuliner Tradisional',
                'deskripsi' => 'Menyajikan makanan khas Batak pemanggang ikan mas dan nila segar langsung dari Danau Toba. Lokasi kuliner yang menghadap langsung ke arah perairan biru.',
                'tag' => 'Kuliner Lokal,Ikan Bakar,Tradisi',
                'x_koordinat' => 60.0,
                'y_koordinat' => 72.0,
                'status' => true
            ],
            [
                'nomor' => '09',
                'judul' => 'Goa Purba Liang Sipege',
                'deskripsi' => 'Goa eksotis alami yang dihiasi dengan stalaktit dan stalakmit aktif berumur ribuan tahun. Menyimpan misteri arkeologi dan sejarah letusan Toba purba.',
                'tag' => 'Arkeologi,Goa Alami,Sejarah Purba',
                'x_koordinat' => 62.0,
                'y_koordinat' => 15.0,
                'status' => true
            ],
            [
                'nomor' => '10',
                'judul' => 'Spot Sunset Bukit Sibaganding',
                'deskripsi' => 'Titik tertinggi di tebing Sibaganding untuk menyaksikan matahari terbenam keemasan (golden hour) di balik perbukitan Danau Toba yang megah.',
                'tag' => 'Sunset,Spot Foto,Golden Hour',
                'x_koordinat' => 75.0,
                'y_koordinat' => 53.0,
                'status' => true
            ]
        ];

        foreach ($faktas as $fakta) {
            FaktaUnik::create($fakta);
        }
    }
}
