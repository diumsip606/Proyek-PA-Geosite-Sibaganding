<?php

namespace Database\Seeders;

use App\Models\VideoYoutube;
use Illuminate\Database\Seeder;

class VideoYoutubeSeeder extends Seeder
{
    public function run()
    {
        $videos = [
            [
                'judul' => 'Pesona Alam Sibaganding',
                'deskripsi' => 'Pengalaman pertama menikmati suasana alam dan panorama kawasan Sibaganding.',
                'youtube_id' => 'gYiE6bQCoc',
                'urutan' => 1,
                'status' => true
            ],
            [
                'judul' => 'Wisata Edukasi Geopark',
                'deskripsi' => 'Cerita tentang belajar geologi, alam, dan budaya di kawasan Geopark Toba.',
                'youtube_id' => 'gYiE6bQCoc',
                'urutan' => 2,
                'status' => true
            ],
            [
                'judul' => 'Hutan dan Satwa Sibaganding',
                'deskripsi' => 'Kesan pengunjung saat melihat kekayaan hayati dan suasana hutan Sibaganding.',
                'youtube_id' => 'gYiE6bQCoc',
                'urutan' => 3,
                'status' => true
            ],
            [
                'judul' => 'Budaya dan Cerita Lokal',
                'deskripsi' => 'Pengalaman mengenal budaya Batak dan kehidupan masyarakat sekitar kawasan.',
                'youtube_id' => 'gYiE6bQCoc',
                'urutan' => 4,
                'status' => true
            ],
            [
                'judul' => 'Perjalanan Menuju Sibaganding',
                'deskripsi' => 'Cuplikan perjalanan wisata dan suasana terbaik saat menjelajahi Sibaganding.',
                'youtube_id' => 'gYiE6bQCoc',
                'urutan' => 5,
                'status' => true
            ]
        ];

        foreach ($videos as $video) {
            VideoYoutube::create($video);
        }
    }
}
