<?php

namespace Database\Seeders;

use App\Models\HeroSlider;
use Illuminate\Database\Seeder;

class HeroSliderSeeder extends Seeder
{
    public function run()
    {
        $sliders = [
            ['gambar' => 'images/sibaganding1.jpg', 'urutan' => 1, 'status' => true],
            ['gambar' => 'images/sibaganding2.jpg', 'urutan' => 2, 'status' => true],
            ['gambar' => 'images/sibaganding3.jpg', 'urutan' => 3, 'status' => true],
            ['gambar' => 'images/sibaganding4.jpg', 'urutan' => 4, 'status' => true],
            ['gambar' => 'images/sibaganding5.jpg', 'urutan' => 5, 'status' => true],
            ['gambar' => 'images/sibaganding6.jpg', 'urutan' => 6, 'status' => true],
            ['gambar' => 'images/sibaganding7.jpg', 'urutan' => 7, 'status' => true],
            ['gambar' => 'images/sibaganding8.jpg', 'urutan' => 8, 'status' => true],
            ['gambar' => 'images/sibaganding9.jpg', 'urutan' => 9, 'status' => true],
            ['gambar' => 'images/sibaganding10.jpg', 'urutan' => 10, 'status' => true],
        ];

        foreach ($sliders as $slider) {
            HeroSlider::create($slider);
        }
    }
}
