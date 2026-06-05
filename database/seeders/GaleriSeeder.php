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
                'gambar'      => 'https://calderatobageopark.org/wp-content/uploads/2025/05/Geosite-Sibaganding-Simalungun-Aspek-Biologi-scaled.jpg#8414',
                'kategori_id' => $idBio,
                'lokasi'      => 'Monkey Forest, Parapat',
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

            [
                'judul'       => 'Buah Ara',
                'deskripsi'   => 'Detail buah ara kemerahan yang tumbuh bergerombol di batang utama pohon Hariara. Tanaman ini memiliki peran vital dalam rantai makanan ekosistem Geosite Sibaganding karena buahnya merupakan asupan utama bagi kawanan primata yang hidup di kawasan tersebut.',
                'gambar'      => 'https://calderatobageopark.org/wp-content/uploads/2025/05/Geosite-Sibaganding-Simalungun-Biologi-3-scaled.jpg',
                'kategori_id' => $idBio, // <-- PASTIKAN INI JUGA DIUBAH
                'lokasi'      => 'Geosite Sibaganding, Parapat',
                'status'      => true,
            ],

            [
                'judul'       => 'Pohon Hariara',
                'deskripsi'   => 'Pada zaman dahulu, pohon ini berfungsi sebagai penanda awal mula berdirinya sebuah perkampungan (huta) Batak. Ini merupakan pohon huta (perkampungan) marga Sinaga yang ada di daerah Pelabuhan Ajibata, Parapat.',
                'gambar'      => '',
                'kategori_id' => $idCulture, // <-- PASTIKAN INI JUGA DIUBAH
                'lokasi'      => 'Pelabuhan Ajibata, Parapat',
                'status'      => true,
            ],

            [
                'judul'       => 'Beruk',
                'deskripsi'   => 'Kawanan beruk (Macaca nemestrina) di kawasan Geosite Sibaganding tepatnya di Monkey Forest. Tampak seekor beruk duduk tenang di atas batang pohon tumbang, dikelilingi oleh anggota kawanan lainnya di habitat alami mereka.',
                'gambar'      => '',
                'kategori_id' => $idBio, // <-- PASTIKAN INI JUGA DIUBAH
                'lokasi'      => 'Monkey Forest, Parapat',
                'status'      => true,
            ],

            [
                'judul'       => 'Siamang',
                'deskripsi'   => 'Siamang (Symphalangus syndactylus) adalah primata berbulu hitam pekat dengan kantong suara besar di tenggorokan yang menghasilkan suara nyaring khas. Siamang merupakan salah satu penghuni utama Monkey Forest Sibaganding — hutan lindung 50 hektar yang menjadi rumah berbagai primata seperti siamang, kera, kukang, dan monyet ekor panjang. Keberadaan siamang di kawasan ini merupakan hasil nyata dari tradisi konservasi yang dirintis oleh Umar Manik.',
                'gambar'      => '',
                'kategori_id' => $idBio, // <-- PASTIKAN INI JUGA DIUBAH
                'lokasi'      => 'Monkey Forest, Parapat',
                'status'      => true,
            ],

            [
                'judul'       => 'Batu Gantung',
                'deskripsi'   => 'Batu Gantung merupakan salah satu daya tarik utama di kawasan Geosite Sibaganding yang merepresentasikan perpaduan sempurna antara kekayaan geologi (geodiversity) dan warisan budaya (culture diversity).',
                'gambar'      => 'https://calderatobageopark.org/wp-content/uploads/2025/05/Geosite-Sibaganding-Simalungun-Aspek-Geologi.jpg#8413',
                'kategori_id' => $idGeo, // <-- PASTIKAN INI JUGA DIUBAH
                'lokasi'      => 'Parapat',
                'status'      => true,
            ],

            [
                'judul'       => 'Batu Gamping Purba',
                'deskripsi'   => 'Batu Gamping ini terbentuk sejak zaman purba hingga masa supervolcano Toba. Ciri khasnya berwarna keunguan, menandakan kandungan besi dan proses oksidasi alami yang berlangsung sangat lama.',
                'gambar'      => '',
                'kategori_id' => $idGeo, // <-- PASTIKAN INI JUGA DIUBAH
                'lokasi'      => 'Geosite Sibaganding',
                'status'      => true,
            ],

            [
                'judul'       => 'Batu Gamping Sekarang',
                'deskripsi'   => 'Batu Gamping yang terbentuk pada masa sekarang yang memiliki warna putih, menunjukkan komposisi mineral yang berbeda dan usia yang lebih baru.',
                'gambar'      => '',
                'kategori_id' => $idGeo, // <-- PASTIKAN INI JUGA DIUBAH
                'lokasi'      => 'Geosite Sibaganding',
                'status'      => true,
            ],

            [
                'judul'       => 'Monkey Forest',
                'deskripsi'   => 'Monkey Forest Sibaganding, merupakan salah satu contoh wilayah yang memiliki biodiversity fauna yang cukup beragam. Di kawasan ini terdapat beberapa jenis primata seperti siamang, kera, beruk, dan kia-kia yang hidup berkelompok di habitat hutan sekitar Danau Toba.',
                'gambar'      => '',
                'kategori_id' => $idCulture, // <-- PASTIKAN INI JUGA DIUBAH
                'lokasi'      => 'Taman Wisata Kera Sibaganding',
                'status'      => true,
            ],

            [
                'judul'       => 'Terowongan Batuan',
                'deskripsi'   => 'Terowongan yang dibuat untuk jalur utama Pematang Siantar menuju Parapat pada zaman Belanda, sekarang sudah dibangun jalur baru untuk menuju Parapat',
                'gambar'      => 'https://calderatobageopark.org/wp-content/uploads/2025/05/Geosite-Sibaganding-Simalungun-Geologi-3-scaled.jpg',
                'kategori_id' => $idCulture, // <-- PASTIKAN INI JUGA DIUBAH
                'lokasi'      => 'Pintu Masuk Taman Wisata Kera Sibaganding',
                'status'      => true,
            ],

            [
                'judul'       => 'Persinggahan Soekarno',
                'deskripsi'   => 'Lokasi bersejarah yang pernah disinggahi oleh Presiden Republik Indonesia. Tempat ini memiliki nilai historis dan menjadi salah satu objek wisata budaya yang menarik perhatian wisatawan di kawasan Sibaganding.',
                'gambar'      => '',
                'kategori_id' => $idCulture, // <-- PASTIKAN INI JUGA DIUBAH
                'lokasi'      => 'Pesanggrahan Bung Karno, Parapat',
                'status'      => true,
            ],

        ];

        // 3. Simpan ke database
        foreach ($galeris as $item) {
            Galeri::create($item);
        }
    }

}
