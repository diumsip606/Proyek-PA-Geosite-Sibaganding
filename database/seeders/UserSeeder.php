<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::UpdateOrCreate(
            // Parameter 1: Kunci pencarian (Cari user dengan email ini)
            ['email' => 'geositesibaganding@gmail.com'],

            // Parameter 2: Data yang diisi jika user baru, atau di-update jika user sudah ada
            ['name' => 'Admin Geosite',
            'password' => Hash::make('sibaganding_6eosite'),
        ]);
    }
}
