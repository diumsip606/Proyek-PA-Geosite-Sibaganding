<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ResetAdminPasswordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Jalankan dengan: php artisan db:seed --class=ResetAdminPasswordSeeder
     */
    public function run(): void
    {
        $email  = 'geositesibaganding@gmail.com'; // ganti dengan email admin kamu
        $newPassword = 'admin123'; // ganti dengan password baru yang kamu inginkan

        $user = User::where('email', $email)->first();

        if ($user) {
            $user->update([
                'password' => Hash::make($newPassword),
            ]);
            $this->command->info("✅ Password untuk {$email} berhasil direset ke: {$newPassword}");
        } else {
            $this->command->error("❌ User dengan email {$email} tidak ditemukan!");
            $this->command->info("Daftar email yang ada:");
            User::all()->each(function ($u) {
                $this->command->line("  - {$u->email}");
            });
        }
    }
}
