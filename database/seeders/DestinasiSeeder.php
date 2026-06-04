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
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Monyet Ekor Panjang',
                'slug' => 'monyet-ekor-panjang',
                'kategori_id' => 1,
                'lokasi' => 'Sibaganding, Parapat',
                'deskripsi' => 'Monyet ekor panjang (Macaca fascicularis) merupakan salah satu spesies primata yang menghuni kawasan Geosite Sibaganding, tepatnya di Monkey Forest Sibaganding. Kehadiran satwa ini menjadi salah satu daya tarik utama bagi para wisatawan yang berkunjung karena mereka memiliki perilaku yang unik di habitatnya.
                                Di dalam kawasan ini, pergerakan monyet ekor panjang cukup terbatasi oleh keberadaan beruk yang berstatus lebih dominan. Oleh karena itu, pengunjung yang ingin memberi makan disarankan untuk melempar makanan tersebut ke arah mereka. Apabila makanan diberikan dari jarak dekat, justru kawanan beruklah yang akan menghampiri. Selain itu, pengunjung dilarang keras memberikan makanan secara langsung dari tangan. Sebagai satwa liar, monyet ekor panjang tidak terbiasa dengan sentuhan manusia dan secara alami memiliki insting rasa takut. Jika didekati, monyet ini akan berusaha melindungi diri dengan cara melarikan diri atau berteriak seolah-olah hendak menyerang. Pengunjung juga diimbau untuk selalu berhati-hati, sebab satwa ini dapat memunculkan reaksi marah apabila makanan tidak dilempar tepat ke arahnya.
                                Kebutuhan pakan satwa di kawasan ini juga dikelola secara rutin oleh pengelola setempat, yaitu Bang Detim Manik. Makanan yang umumnya diberikan kepada kawanan primata ini berupa pisang berukuran kecil serta kacang-kacangan murni tanpa tambahan perasa, salah satunya adalah kacang Sihobuk yang merupakan penganan khas dari daerah Tarutung. Monyet ekor panjang menjadi daya tarik utama kawasan karena hidup bebas di habitat alaminya.',
                'gambar_utama' => null,
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
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}