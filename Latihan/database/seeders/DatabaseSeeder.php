<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            GaleriSeeder::class,
            //ini tambahin kalau data mau ada berita sama informasinya
#            BeritaSeeder::class,
#            KategoriSeeder::class,
#            InformasiSeeder::class,
        ]);
    }
}