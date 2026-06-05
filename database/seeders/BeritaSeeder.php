<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    public function run()
    {
        $berita = [
            [
                'judul' => 'Pengukuhan Personil Badan Pengelola Geopark Danau Toba',
                'slug' => Str::slug('Pengukuhan Personil Badan Pengelola Geopark Danau Toba'),
                'konten' => '<p>Susunan personil Badan Pengelola Geopark Kaldera Toba (BP-GKT) secara resmi dikukuhkan di Ruang Kenanga, Kantor Gubernur Sumatera Utara, Medan, pada Selasa (23/1/2018).</p><p>Pengukuhan para pengurus badan pengelola ini dilaksanakan berdasarkan Peraturan Gubernur (Pergub) Nomor 88 Tahun 2017 tentang Badan Pengelola Geopark Kaldera Toba Provinsi Sumut. Pembentukan dan pengukuhan susunan pengurus ini merupakan langkah strategis pemerintah daerah untuk memaksimalkan pengelolaan kawasan Danau Toba secara terpadu. Tujuannya adalah untuk memperkuat perlindungan, manajemen, dan pemanfaatan berbagai geosite yang berada di bawah naungan kaldera, termasuk Geosite Sibaganding, agar sesuai dengan standar UNESCO Global Geopark.</p><p>Kehadiran kepengurusan BP-GKT yang resmi ini diharapkan mampu memberikan dampak positif bagi Geosite Sibaganding. Dengan adanya badan pengelola khusus, koordinasi program terkait pelestarian keragaman geologi, edukasi, serta pengembangan ekonomi masyarakat lokal di sekitar Sibaganding diharapkan dapat berjalan lebih terarah. Daftar nama personil yang dikukuhkan dapat dilihat pada tautan sumber selengkapnya.</p>',
                'gambar' => 'https://www.hetanews.com/storage/images/20180124/20180124120303-img-20180123-wa0013-696x464.jpg', 
                'penulis' => 'Admin',
                'tanggal_terbit' => '06/04/2026',
                'status' => true,
                'views' => 0,
                'link' => 'https://www.hetanews.com/article/119127/ini-nama-personil-badan-pengelola-geopark-danau-toba-yang-dikukuhkan'
            ],
            [
                'judul' => 'Wagub Musa Rajekshah Apresiasi Taman Wisata Kera Sibaganding',
                'slug' => Str::slug('Wagub Musa Rajekshah Apresiasi Taman Wisata Kera Sibaganding'),
                'konten' => '<p>Wakil Gubernur Sumatera Utara (Wagubsu), Musa Rajekshah, mengunjungi dan memberikan apresiasi tinggi kepada Taman Wisata Kera Sibaganding di Simalungun pada Kamis (20/8/2020). Beliau secara khusus memuji dedikasi Abdurrahman, pengelola yang meneruskan jejak ayahnya dalam menjaga kera dan siamang di kawasan yang merupakan bagian dari Geopark Kaldera Toba tersebut.</p><p>Saat kunjungan, Wagubsu dibuat takjub melihat kera dan siamang bermunculan dari pepohonan setelah Abdurrahman meniupkan tanduk kerbau khas miliknya. Menyadari tantangan minimnya pakan yang membuat satwa primata ini sering turun ke jalan raya, Wagubsu menyatakan bahwa pemerintah provinsi bersama kementerian terkait akan berupaya memberikan bantuan logistik pangan dan infrastruktur penunjang.</p><p>Pengembangan dan perhatian terhadap Taman Wisata Kera ini dinilai sangat penting. Diharapkan dengan ketersediaan makanan yang cukup di dalam kawasan wisata, kera dan monyet yang selama ini berada di pinggir jalan raya menuju Parapat dapat ditarik kembali ke habitat aslinya di dalam hutan.</p>',
                'gambar' => 'https://diskominfo.sumutprov.go.id/img_artikel/72wagubsu%20simalungun.%201jpg.jpg',
                'penulis' => 'Admin',
                'tanggal_terbit' => '06/04/2026',
                'status' => true,
                'views' => 0,
                'link' => 'https://diskominfo.sumutprov.go.id/page/berita/wagub-musa-rajekshah-apresiasi-taman-wisata-kera-sibaganding#'
            ],
            [
                'judul' => 'Upaya Rahman Manik Jaga Primata di Tengah Pakan Hutan Sibaganding Terbatas',
                'slug' => Str::slug('Upaya Rahman Manik Jaga Primata di Tengah Pakan Hutan Sibaganding Terbatas'),
                'konten' => '<p>Krisis pakan alami di kawasan Hutan Sibaganding memaksa kawanan primata liar turun ke jalan raya lintas Sumatera untuk mencari makan. Kondisi ini sangat membahayakan nyawa satwa akibat tingginya risiko tertabrak kendaraan pelintas, sekaligus berpotensi memicu konflik dengan kebun warga di sekitar kawasan.</p><p>Menghadapi situasi tersebut, Rahman Manik mendedikasikan dirinya untuk melanjutkan jejak sang ayah dalam melindungi primata di Geosite Sibaganding. Dengan menggunakan tiupan tanduk kerbau yang khas, ia memanggil kawanan kera dan siamang agar berkumpul di lokasi konservasi. Secara swadaya, ia rutin menyediakan belasan tandan pisang setiap harinya untuk memastikan satwa tersebut kenyang dan tidak lagi turun mengemis di pinggir jalan raya.</p><p>Upaya pelestarian mandiri ini sangat membutuhkan dukungan kesadaran dari masyarakat luas. Para pengendara dan wisatawan yang melintasi kawasan Geosite Sibaganding diimbau secara tegas untuk tidak memberi makan primata di pinggir jalan raya, demi meredam potensi kecelakaan dan menjaga agar satwa tetap berada di dalam ekosistem hutan yang aman.</p>',
                'gambar' => 'https://calderatobageopark.org/wp-content/uploads/2025/05/Geosite-Sibaganding-Simalungun-Biologi-5.jpg',
                'penulis' => 'Admin',
                'tanggal_terbit' => '06/04/2026',
                'status' => true,
                'views' => 0,
                'link' => 'https://mongabay.co.id/2023/05/08/upaya-rahman-manik-jaga-primata-di-tengah-pakan-hutan-sibaganding-terbatas/'
            ],
            [
                'judul' => 'Hutan Lindung Sibaganding Terbakar',
                'slug' => Str::slug('Hutan Lindung Sibaganding Terbakar'),
                'konten' => '<p>Kawasan Hutan Lindung Sibaganding yang merupakan bagian penting dari ekosistem penyangga di sekitar Danau Toba dilanda musibah kebakaran. Titik api terpantau menghanguskan area perbukitan yang didominasi oleh semak belukar dan pepohonan kering di kawasan tersebut.</p><p>Kondisi cuaca panas disertai tiupan angin membuat api merambat dengan cepat. Selain itu, medan perbukitan yang cukup terjal dan sulit dijangkau menjadi tantangan tersendiri dalam upaya memadamkan titik api agar tidak menyebar semakin luas.</p><p>Peristiwa terbakarnya Hutan Lindung Sibaganding ini menjadi peringatan keras bagi semua pihak. Kelestarian kawasan hutan ini sangat krusial karena merupakan bagian yang tidak terpisahkan dari daya tarik ekowisata Geosite Sibaganding. Masyarakat diimbau untuk selalu waspada dan tidak melakukan aktivitas pembakaran atau membuang sumber api sembarangan di area hutan.</p>',
                'gambar' => 'https://cdn1-production-images-kly.akamaized.net/cfIxZbYuFkgXTpMTuerjtu4GFY8=/2560x1440/smart/filters:quality(75):strip_icc()/kly-media-production/medias/148608/original/110616akebakaran-hutan.jpg', 
                'penulis' => 'Admin',
                'tanggal_terbit' => '06/04/2026',
                'status' => true,
                'views' => 0,
                'link' => 'https://www.liputan6.com/news/read/339543/hutan-lindung-sibaganding-terbakar#google_vignette'
            ],
            [
                'judul' => 'Wagubsu: Jadikan Geosite di Kawasan Danau Toba Situs Destinasi Wisata Internasional',
                'slug' => Str::slug('Wagubsu Jadikan Geosite di Kawasan Danau Toba Situs Destinasi Wisata Internasional'),
                'konten' => '<p>Saat melakukan kunjungan kerja ke Parapat, Wakil Gubernur Sumatera Utara (Wagubsu) Musa Rajekshah secara khusus menyempatkan diri berkunjung ke Pusat Informasi Geopark Kaldera Toba yang berada di open stage Geosite Sibaganding pada Sabtu (12/1/2019). Dalam kunjungan tersebut, Wagubsu menegaskan pentingnya sinergi seluruh pihak untuk menjadikan geosite di kawasan Danau Toba sebagai destinasi wisata bertaraf internasional demi mendukung status UNESCO Global Geopark.</p><p>Wagubsu memberikan arahan agar promosi Geosite Sibaganding dan belasan geosite lainnya di kawasan Danau Toba terus ditingkatkan melalui cara-cara yang kreatif. Promosi yang bervariasi, baik melalui media sosial, leaflet, brosur, maupun penyebaran agenda pariwisata di hotel-hotel, diharapkan mampu menarik minat lebih banyak wisatawan domestik maupun mancanegara.</p><p>Lebih lanjut, untuk mendukung edukasi geowisata, Wagubsu juga berharap ke depannya dapat direncanakan pembangunan museum khusus tentang Kaldera Toba. Fasilitas ini ditujukan agar para pengunjung yang singgah di Pusat Informasi Geopark Kaldera Toba bisa mendapatkan wawasan yang lebih mendalam mengenai sejarah dan kekayaan geologi kawasan tersebut.</p>',
                'gambar' => 'https://sumutprov.go.id/images/situsdestinasi2.jpg',
                'penulis' => 'Admin',
                'tanggal_terbit' => '06/04/2026',
                'status' => true,
                'views' => 0,
                'link' => 'https://sumutprov.go.id/artikel/artikel/wagubsu-jadikan-geosite-di-kawasan-danau-toba-situs-destinasi-wisata-internasional'
            ]
        ];

        foreach ($berita as $item) {
            Berita::create($item);
        }
    }
}