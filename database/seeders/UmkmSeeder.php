<?php

namespace Database\Seeders;

use App\Models\Umkm;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UmkmSeeder extends Seeder
{
    public function run()
    {
        $umkms = [
            [
                'nama' => 'Kopi Arabika Sibaganding',
                'slug' => 'kopi-arabika-sibaganding-' . time(),
                'gambar' => '/image/sejarah1.jpg', // Menggunakan gambar yang ada
                'deskripsi' => 'Kopi arabika organik premium yang ditanam langsung di lereng bukit Sibaganding. Diproses secara higienis oleh petani lokal untuk menghasilkan cita rasa khas Toba yang harum dan eksotis dengan sedikit aroma rempah.',
                'alamat' => 'Desa Sibaganding, Kec. Girsang Sipangan Bolon',
                'kontak' => '6281234567890',
                'status' => true,
            ],
            [
                'nama' => 'Tenun Ulos Songket Sibaganding',
                'slug' => 'tenun-ulos-songket-sibaganding-' . time(),
                'gambar' => '/image/sejarah2.jpg',
                'deskripsi' => 'Ulos tenunan tangan tradisional bermutu tinggi yang dibuat oleh kelompok perajin wanita di Desa Sibaganding. Menggunakan pewarna alami dan benang berkualitas tinggi, cocok sebagai cinderamata eksklusif.',
                'alamat' => 'Dusun II Sibaganding, Simalungun',
                'kontak' => '6281234567890',
                'status' => true,
            ],
            [
                'nama' => 'Kuliner Olahan Mangga Toba',
                'slug' => 'kuliner-olahan-mangga-toba-' . time(),
                'gambar' => '/image/sejarah3.jpg',
                'deskripsi' => 'Menyediakan aneka camilan olahan dari buah mangga khas Sibaganding yang manis dan segar. Mulai dari dodol mangga, keripik mangga, hingga selai mangga organik tanpa pengawet buatan.',
                'alamat' => 'Jl. Parapat No. 45, Sibaganding',
                'kontak' => '6281234567890',
                'status' => true,
            ],
            [
                'nama' => 'Kerajinan Ukir Kayu Batak',
                'slug' => 'kerajinan-ukir-kayu-batak-' . time(),
                'gambar' => '/image/sejarah1.jpg',
                'deskripsi' => 'Miniatur rumah adat Batak (Ruma Bolon), ukiran Gorga, dan gantungan kunci khas Toba buatan tangan seniman ukir lokal. Menjaga kelestarian seni tradisional lewat karya bernilai estetika tinggi.',
                'alamat' => 'Dusun I Sibaganding, Parapat',
                'kontak' => '6281234567890',
                'status' => true,
            ],
            [
                'nama' => 'Sambal Andaliman Citarasa Toba',
                'slug' => 'sambal-andaliman-citarasa-toba-' . time(),
                'gambar' => '/image/sejarah2.jpg',
                'deskripsi' => 'Sambal khas Batak dengan bahan utama Andaliman segar (merica Batak) pilihan. Memberikan sensasi rasa pedas getir yang khas, cocok dipadukan dengan ikan mas arsik atau panggangan.',
                'alamat' => 'Simpang Tiga Sibaganding, Parapat',
                'kontak' => '6281234567890',
                'status' => true,
            ],
            [
                'nama' => 'Cinderamata Kaos Geosite Sibaganding',
                'slug' => 'cinderamata-kaos-geosite-sibaganding-' . time(),
                'gambar' => '/image/sejarah3.jpg',
                'deskripsi' => 'Menyediakan cinderamata kaos premium dengan desain grafis orisinal bertema Geosite Sibaganding, Danau Toba, dan UNESCO Global Geopark. Bahan kaos adem dan sablonan awet.',
                'alamat' => 'Pusat Informasi Geosite Sibaganding',
                'kontak' => '6281234567890',
                'status' => true,
            ],
        ];

        foreach ($umkms as $item) {
            Umkm::create($item);
        }
    }
}
