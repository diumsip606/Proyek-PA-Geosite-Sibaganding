<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\KontakInfo;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share contact info to app layout and contact page for dynamic content
        view()->composer(['layouts.app', 'pages.kontak'], function ($view) {
            if (Schema::hasTable('kontak_info')) {
                $kontakInfo = KontakInfo::active()->orderBy('urutan')->get();
                $alamat = $kontakInfo->where('tipe', 'alamat');
                $telepon = $kontakInfo->where('tipe', 'telepon');
                $email = $kontakInfo->where('tipe', 'email');
                $sosialMedia = $kontakInfo->where('tipe', 'sosial_media');
                $jamOperasional = $kontakInfo->where('tipe', 'jam_operasional');
            } else {
                $alamat = collect();
                $telepon = collect();
                $email = collect();
                $sosialMedia = collect();
                $jamOperasional = collect();
            }

            $view->with(compact('alamat', 'telepon', 'email', 'sosialMedia', 'jamOperasional'));
        });
    }
}
