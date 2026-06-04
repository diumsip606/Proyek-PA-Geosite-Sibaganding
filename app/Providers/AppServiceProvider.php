<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\KontakInfo;
use App\Models\PageHeader;
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

        // Share active sliders to pages requiring sliding hero backgrounds
        view()->composer([
            'pages.destinasi.index',
            'pages.berita',
            'pages.kontak',
            'pages.informasi',
            'pages.galeri'
        ], function ($view) {
            if (Schema::hasTable('hero_sliders')) {
                $sliders = \App\Models\HeroSlider::where('status', true)
                    ->orderBy('urutan', 'asc')
                    ->get();
            } else {
                $sliders = collect();
            }
            $view->with('sliders', $sliders);
        });

        // Share page_header to each individual page view
        $pageMap = [
            'pages.informasi'          => 'informasi',
            'pages.galeri'             => 'galeri',
            'pages.berita'             => 'berita',
            'pages.kontak'             => 'kontak',
            'pages.destinasi.index'    => 'destinasi',
            'pages.destinasi.kategori' => null, // handled dynamically in controller via $kategoriSlug
            'pages.destinasi.detail'   => null, // individual destinasi, no page_header needed
        ];

        foreach ($pageMap as $viewName => $pageName) {
            if ($pageName) {
                view()->composer($viewName, function ($view) use ($pageName) {
                    $header = null;
                    if (Schema::hasTable('page_headers')) {
                        $header = PageHeader::where('page_name', $pageName)->first();
                    }
                    $view->with('pageHeader', $header);
                });
            }
        }

        // For kategori page (biodiversity, geodiversity, culture-diversity) — share based on page_name
        view()->composer('pages.destinasi.kategori', function ($view) {
            // $kategori is already passed by controller, map it to page_name
            $data = $view->getData();
            $kategori = $data['kategori'] ?? '';
            $pageName = match (strtolower(str_replace(' ', '-', $kategori))) {
                'biodiversity'      => 'biodiversity',
                'geodiversity'      => 'geodiversity',
                'culture-diversity', 'culture diversity' => 'culture-diversity',
                default             => null,
            };

            $header = null;
            if ($pageName && Schema::hasTable('page_headers')) {
                $header = PageHeader::where('page_name', $pageName)->first();
            }
            $view->with('pageHeader', $header);
        });
    }
}
