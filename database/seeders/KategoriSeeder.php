<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $kategori = [
            [
                'nama' => 'Biodiversity', 
                'slug' => 'biodiversity', 
                'deskripsi' => 'Keanekaragaman hayati di Geosite Sibaganding'
            ],
            [
                'nama' => 'Geodiversity', 
                'slug' => 'geodiversity', 
                'deskripsi' => 'Keanekaragaman geologi dan formasi batuan'
            ],
            [
                'nama' => 'Culture diversity', 
                'slug' => 'culture-diversity', 
                'deskripsi' => 'Warisan budaya dan tradisi masyarakat lokal'
            ],
        ];

        foreach ($kategori as $item) {
            Kategori::updateOrCreate(['slug' => $item['slug']], $item);
        }
    }
}