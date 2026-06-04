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
                'judul' => 'Wagubsu: Jadikan Geosite di Kawasan Danau Toba Situs Destinasi Wisata Internasional',
                'slug' => Str::slug('Wagubsu Jadikan Geosite di Kawasan Danau Toba Situs Destinasi Wisata Internasional'),
                'konten' => '<p>Saat melakukan kunjungan kerja ke Parapat, Wakil Gubernur Sumatera Utara (Wagubsu) Musa Rajekshah menargetkan pengembangan geosite-geosite yang berada di kawasan Danau Toba agar naik kelas menjadi situs destinasi wisata bertaraf internasional. Hal ini selaras dengan pengakuan kawasan Danau Toba sebagai bagian dari UNESCO Global Geopark.</p><p>Salah satu lokasi yang menjadi sorotan adalah Geosite Sibaganding, bersama dengan geosite lain di sekitarnya. Keberadaan geosite di kawasan ini memiliki potensi kekayaan geologi, serta keragaman flora, fauna, dan budaya yang sangat unik. Wagubsu menekankan pentingnya peran serta masyarakat lokal untuk terus menjaga kebersihan, kelestarian lingkungan, dan menjaga hutan di sekitar Danau Toba agar tetap asri.</p><p>Melalui sinergi pemerintah dan masyarakat, pengembangan geosite ini diharapkan tidak hanya menjaga kelestarian alam dan warisan geologi, tetapi juga mampu memberikan dampak positif yang signifikan bagi peningkatan ekonomi masyarakat lokal serta menarik lebih banyak minat wisatawan mancanegara.</p>',
                'gambar' => 'https://sumutprov.go.id/images/situsdestinasi2.jpg', 
                'kategori_id' => 1,
                'penulis' => 'Admin',
                'tanggal_terbit' => '2019-01-13 00:00:00',
                'status' => true,
                'views' => 0,
                'komentar' => 0,
                'link' => 'https://sumutprov.go.id/artikel/artikel/wagubsu-jadikan-geosite-di-kawasan-danau-toba-situs-destinasi-wisata-internasional'
            ],
            [
                'judul' => 'Karhutla Sibaganding Berhasil Dipadamkan, Polisi Imbau Warga Tak Bakar Lahan',
                'slug' => Str::slug('Karhutla Sibaganding Berhasil Dipadamkan Polisi Imbau Warga Tak Bakar Lahan'),
                'konten' => '<p>Tim reaksi cepat gabungan yang terdiri dari personel Polsek Parapat, petugas pemadam kebakaran, aparatur desa (Pangulu), dan warga setempat berhasil memadamkan kebakaran hutan dan lahan (karhutla) di kawasan perbukitan Nagori Sibaganding. Kebakaran yang terjadi di sekitar jalan umum Pematangsiantar–Parapat tersebut berhasil diatasi berkat kerja keras tim, meskipun lokasi titik api cukup sulit dijangkau oleh mobil pemadam kebakaran.</p><p>Kapolsek Parapat, AKP Manguni WD Sinulingga, mengonfirmasi bahwa api telah berhasil dipadamkan. Pihaknya juga telah turun langsung melakukan pengecekan ke lokasi titik koordinat kebakaran untuk memastikan situasi aman dan terkendali, serta melaporkannya ke dalam sistem pemantauan karhutla.</p><p>Menindaklanjuti kejadian ini, pihak kepolisian bersama Forum Koordinasi Pimpinan Kecamatan (Forkopimcam) mengimbau dengan tegas agar masyarakat, khususnya di sekitar kawasan Geosite Sibaganding dan Danau Toba, tidak melakukan pembakaran untuk membuka lahan pertanian. Hal ini sangat penting dihindari, terutama saat memasuki musim kemarau, demi menjaga kelestarian alam dan mencegah bencana lingkungan.</p>',
                'gambar' => 'https://www.waspada.id/uploads/media/2026/04/img-20250710-wa0096-1776537854887-d64cb7ce.jpg?w=1200',
                'kategori_id' => 1,
                'penulis' => 'Admin',
                'tanggal_terbit' => '2025-07-10 00:00:00',
                'status' => true,
                'views' => 0,
                'komentar' => 0,
                'link' => 'https://www.waspada.id/artikel/karhutla-sibaganding-berhasil-dipadamkan-polisi-imbau-warga-tak-bakar-lahan'
            ],
            [
                'judul' => 'Upaya Rahman Manik Jaga Primata di Tengah Pakan Hutan Sibaganding Terbatas',
                'slug' => Str::slug('Upaya Rahman Manik Jaga Primata di Tengah Pakan Hutan Sibaganding Terbatas'),
                'konten' => '<p>Menipisnya ketersediaan pakan alami di Hutan Sibaganding telah memaksa primata liar di kawasan tersebut turun ke jalan raya untuk mencari makan. Kondisi krisis pakan ini memicu interaksi negatif dengan kebun warga, serta tingginya risiko kecelakaan tabrak lari yang mencederai satwa akibat primata yang berkumpul di pinggir jalan.</p><p>Merespons situasi tersebut, Rahman Manik, seorang penggerak konservasi lokal, berdedikasi penuh melanjutkan perjuangan mendiang ayahnya untuk melindungi kawanan primata di Sibaganding. Setiap harinya, ia secara swadaya menyediakan minimal 11 tandan pisang dan memberi makan satwa-satwa tersebut di lokasi khusus, dengan tujuan agar mereka tidak lagi mengemis di pinggir jalan raya yang membahayakan nyawa satwa maupun pengendara.</p><p>Selain apresiasi terhadap upaya pelestarian mandiri ini, dukungan dan kesadaran dari masyarakat luas sangat dibutuhkan. Para pengendara dan wisatawan yang melintasi kawasan Geosite Sibaganding diimbau secara tegas untuk mematuhi plang peringatan dengan tidak memberi makan primata di pinggir jalan, demi meredam konflik satwa dan menjaga ekosistem hutan.</p>',
                'gambar' => 'https://calderatobageopark.org/wp-content/uploads/2025/05/Geosite-Sibaganding-Simalungun-Biologi-5.jpg',
                'kategori_id' => 1,
                'penulis' => 'Admin',
                'tanggal_terbit' => '2023-05-08 00:00:00',
                'status' => true,
                'views' => 0,
                'komentar' => 0,
                'link' => 'https://mongabay.co.id/2023/05/08/upaya-rahman-manik-jaga-primata-di-tengah-pakan-hutan-sibaganding-terbatas/'
            ],
            [
                'judul' => 'Wagub Musa Rajekshah Apresiasi Taman Wisata Kera Sibaganding',
                'slug' => Str::slug('Wagub Musa Rajekshah Apresiasi Taman Wisata Kera Sibaganding'),
                'konten' => '<p>Wakil Gubernur Sumatera Utara (Wagubsu), Musa Rajekshah, mengunjungi dan memberikan apresiasi tinggi kepada Taman Wisata Kera Sibaganding di Simalungun pada Kamis (20/8/2020). Beliau secara khusus memuji dedikasi Abdurrahman, pengelola yang meneruskan jejak ayahnya dalam menjaga kera dan siamang di kawasan yang merupakan bagian dari Geopark Kaldera Toba tersebut.</p><p>Saat kunjungan, Wagubsu dibuat takjub melihat kera dan siamang bermunculan dari pepohonan setelah Abdurrahman meniupkan tanduk kerbau khas miliknya. Menyadari tantangan minimnya pakan yang membuat satwa primata ini sering turun ke jalan raya, Wagubsu menyatakan bahwa pemerintah provinsi bersama kementerian terkait akan berupaya memberikan bantuan logistik pangan dan infrastruktur penunjang.</p><p>Pengembangan dan perhatian terhadap Taman Wisata Kera ini dinilai sangat penting. Diharapkan dengan ketersediaan makanan yang cukup di dalam kawasan wisata, kera dan monyet yang selama ini berada di pinggir jalan raya menuju Parapat dapat ditarik kembali ke habitat aslinya di dalam hutan.</p>',
                'gambar' => 'https://diskominfo.sumutprov.go.id/img_artikel/72wagubsu%20simalungun.%201jpg.jpg',
                'kategori_id' => 1,
                'penulis' => 'Admin',
                'tanggal_terbit' => '2020-08-21 00:00:00',
                'status' => true,
                'views' => 0,
                'komentar' => 0,
                'link' => 'https://diskominfo.sumutprov.go.id/page/berita/wagub-musa-rajekshah-apresiasi-taman-wisata-kera-sibaganding#'
            ],
            [
    'judul' => 'Pengukuhan Personil Badan Pengelola Geopark Danau Toba',
    'slug' => Str::slug('Pengukuhan Personil Badan Pengelola Geopark Danau Toba'),
    'konten' => '<p>Susunan personil Badan Pengelola Geopark Kaldera Toba (BP-GKT) secara resmi dikukuhkan di Ruang Kenanga, Kantor Gubernur Sumatera Utara, Medan, pada Selasa (23/1/2018).</p><p>Pengukuhan para pengurus badan pengelola ini dilaksanakan berdasarkan Peraturan Gubernur (Pergub) Nomor 88 Tahun 2017 tentang Badan Pengelola Geopark Kaldera Toba Provinsi Sumut. Pembentukan dan pengukuhan susunan pengurus ini merupakan langkah strategis pemerintah daerah untuk memaksimalkan pengelolaan kawasan Danau Toba secara terpadu. Tujuannya adalah untuk memperkuat perlindungan, manajemen, dan pemanfaatan berbagai geosite yang berada di bawah naungan kaldera, termasuk Geosite Sibaganding, agar sesuai dengan standar UNESCO Global Geopark.</p><p>Kehadiran kepengurusan BP-GKT yang resmi ini diharapkan mampu memberikan dampak positif bagi Geosite Sibaganding. Dengan adanya badan pengelola khusus, koordinasi program terkait pelestarian keragaman geologi, edukasi, serta pengembangan ekonomi masyarakat lokal di sekitar Sibaganding diharapkan dapat berjalan lebih terarah. Daftar nama personil yang dikukuhkan dapat dilihat pada tautan sumber selengkapnya.</p>',
    'gambar' => 'https://www.hetanews.com/storage/images/20180124/20180124120303-img-20180123-wa0013-696x464.jpg', 
    'kategori_id' => 1,
    'penulis' => 'Admin',
    'tanggal_terbit' => '2018-01-23 00:00:00',
    'status' => true,
    'views' => 0,
    'komentar' => 0,
    'link' => 'https://www.hetanews.com/article/119127/ini-nama-personil-badan-pengelola-geopark-danau-toba-yang-dikukuhkan'
],
        ];

        foreach ($berita as $item) {
            Berita::create($item);
        }
    }
}