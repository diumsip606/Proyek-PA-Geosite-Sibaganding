<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destinasi;

class DestinasiSeeder extends Seeder
{
    public function run()
    {
        Destinasi::insert([

            // ===== GEODIVERSITY (kategori_id: 2) =====
            [
                'nama' => 'Batu Gamping 70 Ribu Tahun',
                'slug' => 'batu-gamping-70-ribu-tahun',
                'kategori_id' => 2,
                'lokasi' => 'Sibaganding, Parapat',
                'deskripsi' => 'Batuan sedimen karbonat yang terbentuk sekitar 70.000 tahun yang lalu dari endapan organisme laut. Keberadaannya di Sibaganding menjadi bukti nyata perubahan geologi kawasan Caldera Danau Toba.',
                'gambar_utama' => null,
                'tags' => json_encode(['batuan', 'sedimen', 'geologi']),
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Batu Gamping 800 Ribu Tahun',
                'slug' => 'batu-gamping-800-ribu-tahun',
                'kategori_id' => 2,
                'lokasi' => 'Sibaganding, Parapat',
                'deskripsi' => 'Terbentuk dari material vulkanik hasil letusan supervolcano Toba sekitar 800.000 tahun yang lalu. Batuan ini menyimpan jejak sejarah geologi yang sangat berharga bagi ilmu pengetahuan.',
                'gambar_utama' => null,
                'tags' => json_encode(['vulkanik', 'supervolcano', 'geologi']),
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Batu Gantung',
                'slug' => 'batu-gantung',
                'kategori_id' => 2,
                'lokasi' => 'Sibaganding, Parapat',
                'deskripsi' => 'Formasi batuan unik yang tampak "menggantung" di tepi tebing Danau Toba. Batu Gantung memiliki nilai legenda dan geologi yang tinggi, menjadi salah satu ikon wisata Sibaganding.',
                'gambar_utama' => null,
                'tags' => json_encode(['formasi', 'legenda', 'ikon']),
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Batu Padas',
                'slug' => 'batu-padas',
                'kategori_id' => 2,
                'lokasi' => 'Sibaganding, Parapat',
                'deskripsi' => 'Batuan keras berwarna kecoklatan yang terbentuk dari proses pemadatan material vulkanik. Batu padas banyak ditemukan di tebing-tebing sekitar kawasan Geosite Sibaganding.',
                'gambar_utama' => null,
                'tags' => json_encode(['batuan', 'vulkanik', 'tebing']),
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Batu Sabak',
                'slug' => 'batu-sabak',
                'kategori_id' => 2,
                'lokasi' => 'SSibaganding, Parapat',
                'deskripsi' => 'Pada batuan ini ditemukan fosil kerang purba yang menjadi bukti bahwa kawasan Sibaganding dahulu pernah berada di bawah permukaan laut. Batu sabak menjadi salah satu keunikan geologi kawasan Sibaganding yang bernilai tinggi bagi ilmu pengetahuan.',
                'gambar_utama' => null,
                'tags' => json_encode(['fosil', 'kerang', 'purba']),
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Goa Monkey Forest',
                'slug' => 'goa-monkey-forest',
                'kategori_id' => 2,
                'lokasi' => 'Sibaganding, Parapat',
                'deskripsi' => 'Goa alami yang terbentuk dari proses erosi dan pelarutan batuan kapur selama ribuan tahun. Goa ini menjadi habitat alami berbagai primata dan menjadi daya tarik wisata geologi yang unik.',
                'gambar_utama' => null,
                'tags' => json_encode(['goa', 'primata', 'karst']),
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ===== BIODIVERSITY (kategori_id: 1) =====
            [
                'nama' => 'Buah Ara',
                'slug' => 'buah-ara',
                'kategori_id' => 1,
                'lokasi' => 'Sibaganding, Parapat',
                'deskripsi' => 'Pohon Ara (Ficus sp.) tumbuh subur di kawasan Geosite Sibaganding dan menjadi sumber pakan penting bagi berbagai satwa liar, termasuk primata dan burung endemik Danau Toba.',
                'gambar_utama' => null,
                'tags' => json_encode(['flora', 'pohon', 'endemik']),
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Monyet Beruk',
                'slug' => 'monyet-beruk',
                'kategori_id' => 1,
                'lokasi' => 'Sibaganding, Parapat',
                'deskripsi' => 'Beruk (Macaca nemestrina) adalah primata besar yang menghuni hutan tropis Sibaganding. Dikenal cerdas dan lincah, beruk menjadi salah satu daya tarik satwa liar yang dapat diamati pengunjung.',
                'gambar_utama' => null,
                'tags' => json_encode(['primata', 'fauna', 'satwa']),
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Monyet Ekor Panjang',
                'slug' => 'monyet-ekor-panjang',
                'kategori_id' => 1,
                'lokasi' => 'Sibaganding, Parapat',
                'deskripsi' => 'Primata endemik yang hidup liar di kawasan hutan Geosite Sibaganding. Monyet ekor panjang (Macaca fascicularis) sering dijumpai berkelompok di tepi danau dan pepohonan sekitar kawasan wisata.',
                'gambar_utama' => null,
                'tags' => json_encode(['primata', 'endemik', 'fauna']),
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Siamang',
                'slug' => 'siamang',
                'kategori_id' => 1,
                'lokasi' => 'Sibaganding, Parapat',
                'deskripsi' => 'Siamang (Symphalangus syndactylus) adalah primata berbulu hitam dengan suara keras yang khas. Keberadaannya di Sibaganding menjadi indikator ekosistem hutan yang masih terjaga dengan baik.',
                'gambar_utama' => null,
                'tags' => json_encode(['primata', 'siamang', 'ekosistem']),
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}