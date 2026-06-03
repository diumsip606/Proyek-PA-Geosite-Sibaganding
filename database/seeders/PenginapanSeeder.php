<?php

namespace Database\Seeders;

use App\Models\Penginapan;
use Illuminate\Database\Seeder;

class PenginapanSeeder extends Seeder
{
    public function run()
    {
        $penginapans = [
            [
                'nama' => 'Grand Kaldera Hotel Parapat',
                'slug' => 'grand-kaldera-hotel-parapat-' . time(),
                'gambar' => '/image/sejarah2.jpg',
                'deskripsi' => 'Hotel modern bintang 3 yang menawarkan pemandangan menakjubkan Danau Toba dan perbukitan pinus Sibaganding. Menyediakan fasilitas kamar lengkap, kolam renang outdoor, restoran, dan akses cepat ke lokasi wisata.',
                'alamat' => 'Jl. Parapat Raya No. 102, Sibaganding',
                'harga' => 450000.00,
                'kontak' => '6281234567890',
                'status' => true,
            ],
            [
                'nama' => 'Toba Eco Cottage Sibaganding',
                'slug' => 'toba-eco-cottage-sibaganding-' . time(),
                'gambar' => '/image/sejarah3.jpg',
                'deskripsi' => 'Penginapan unik bertema alam yang dibangun di tepi Danau Toba dengan perpaduan desain tradisional Batak dan gaya modern. Cocok bagi wisatawan yang mendambakan suasana damai, tenang, dan menyatu dengan alam.',
                'alamat' => 'Tepi Pantai Sibaganding, Parapat',
                'harga' => 320000.00,
                'kontak' => '6281234567890',
                'status' => true,
            ],
            [
                'nama' => 'Sibaganding Forest Homestay',
                'slug' => 'sibaganding-forest-homestay-' . time(),
                'gambar' => '/image/sejarah1.jpg',
                'deskripsi' => 'Homestay keluarga yang asri dan terjangkau di dekat Hutan Lindung Sibaganding. Dikelilingi pohon pinus dengan udara pegunungan yang sejuk. Sangat cocok bagi para pecinta petualangan geowisata.',
                'alamat' => 'Desa Wisata Sibaganding Atas',
                'harga' => 200000.00,
                'kontak' => '6281234567890',
                'status' => true,
            ],
            [
                'nama' => 'Villa Samosir Breeze',
                'slug' => 'villa-samosir-breeze-' . time(),
                'gambar' => '/image/sejarah2.jpg',
                'deskripsi' => 'Villa pribadi eksklusif yang tenang dengan dermaga perahu kecil pribadi di tepi danau. Dilengkapi fasilitas dapur bersama, taman hijau yang luas, dan area bakar ikan (barbeque) di tepi pantai.',
                'alamat' => 'Jl. Lintas Danau Toba, Sibaganding',
                'harga' => 750000.00,
                'kontak' => '6281234567890',
                'status' => true,
            ],
            [
                'nama' => 'Penginapan Monkey Forest View',
                'slug' => 'penginapan-monkey-forest-view-' . time(),
                'gambar' => '/image/sejarah3.jpg',
                'deskripsi' => 'Akomodasi sederhana dan bersih yang terletak sangat strategis dekat dengan pos pemantauan konservasi kera Sibaganding. Memberikan pemandangan hutan kaldera langsung dari jendela kamar.',
                'alamat' => 'Kawasan Konservasi Kera Sibaganding',
                'harga' => 180000.00,
                'kontak' => '6281234567890',
                'status' => true,
            ],
            [
                'nama' => 'Pinus Valley Resort & Spa',
                'slug' => 'pinus-valley-resort-spa-' . time(),
                'gambar' => '/image/sejarah1.jpg',
                'deskripsi' => 'Resor peristirahatan premium dengan fasilitas spa tradisional Batak dan terapi relaksasi. Terletak di dataran tinggi Sibaganding, menyajikan panorama sunset terindah di atas hamparan air Danau Toba.',
                'alamat' => 'Bukit Pinus Sibaganding, Simalungun',
                'harga' => 900000.00,
                'kontak' => '6281234567890',
                'status' => true,
            ],
        ];

        foreach ($penginapans as $item) {
            Penginapan::create($item);
        }
    }
}
