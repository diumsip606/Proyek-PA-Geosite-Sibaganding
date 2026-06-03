@extends('layouts.app')

@section('title', $umkm->nama . ' - UMKM Sibaganding')

@section('content')
<style>
    .detail-hero {
        height: 380px;
        position: relative;
        overflow: hidden;
        margin-top: 76px;
    }
    .detail-hero img {
        width: 100%; height: 100%; object-fit: cover;
        transition: transform 8s ease;
    }
    .detail-hero:hover img { transform: scale(1.05); }
    .detail-hero-overlay {
        position: absolute; inset: 0;
        background: linear-gradient(to top, rgba(0,20,50,0.82) 0%, rgba(0,30,70,0.2) 60%, transparent 100%);
        display: flex; align-items: flex-end; padding: 36px;
    }
    .detail-hero-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: 2.8rem; color: white; font-weight: 700;
        text-shadow: 0 2px 16px rgba(0,0,0,0.4);
    }
    .detail-badge {
        display: inline-block; padding: 5px 14px;
        background: rgba(198,164,59,0.2); color: #c6a43b;
        border: 1px solid rgba(198,164,59,0.4);
        border-radius: 30px; font-size: 0.75rem; font-weight: 600;
        letter-spacing: .05em; margin-bottom: 12px;
    }
    .detail-body {
        max-width: 860px; margin: 0 auto; padding: 50px 24px 80px;
    }
    .detail-card {
        background: white; border-radius: 20px;
        padding: 32px; margin-bottom: 24px;
        box-shadow: 0 4px 24px rgba(0,51,102,0.07);
        border: 1px solid rgba(0,51,102,0.06);
    }
    .detail-card h4 {
        font-size: 1rem; font-weight: 700; color: #003366;
        margin-bottom: 12px; display: flex; align-items: center; gap: 8px;
    }
    .detail-card h4 i { color: #c6a43b; }
    .detail-desc { font-size: 0.92rem; color: #4a6b82; line-height: 1.85; }
    .info-row {
        display: flex; align-items: flex-start; gap: 12px;
        padding: 12px 0; border-bottom: 1px solid rgba(0,51,102,0.06);
        font-size: 0.88rem; color: #2c5f8a;
    }
    .info-row:last-child { border-bottom: none; }
    .info-row i { color: #c6a43b; margin-top: 2px; width: 16px; flex-shrink: 0; }
    .wa-cta {
        display: inline-flex; align-items: center; gap: 10px;
        background: linear-gradient(135deg, #25d366, #128c50);
        color: white; text-decoration: none; padding: 15px 36px;
        border-radius: 50px; font-size: 0.92rem; font-weight: 700;
        box-shadow: 0 8px 24px rgba(37,211,102,0.3);
        transition: all 0.3s ease;
    }
    .wa-cta:hover {
        color: white; transform: translateY(-3px);
        box-shadow: 0 12px 32px rgba(37,211,102,0.4);
    }
    .back-link {
        display: inline-flex; align-items: center; gap: 8px;
        color: #003366; text-decoration: none; font-size: 0.85rem;
        font-weight: 600; padding: 10px 20px; border-radius: 30px;
        border: 1px solid rgba(0,51,102,0.2); transition: 0.3s;
        margin-bottom: 30px;
    }
    .back-link:hover { background: #003366; color: white; }
    @media(max-width: 576px) {
        .detail-hero { height: 260px; }
        .detail-hero-title { font-size: 1.9rem; }
        .detail-hero-overlay { padding: 22px; }
    }
</style>

<div class="detail-hero">
    @if($umkm->gambar)
        <img src="{{ asset($umkm->gambar) }}" alt="{{ $umkm->nama }}">
    @else
        <img src="/image/sejarah-hero.jpg" alt="{{ $umkm->nama }}">
    @endif
    <div class="detail-hero-overlay">
        <div>
            <div class="detail-badge"><i class="fas fa-store me-2"></i>UMKM Mitra Sibaganding</div>
            <h1 class="detail-hero-title">{{ $umkm->nama }}</h1>
        </div>
    </div>
</div>

<div style="background: #f8fbff;">
    <div class="detail-body">

        <a href="{{ route('umkm.index') }}" class="back-link">
            <i class="fas fa-arrow-left"></i> Kembali ke Daftar UMKM
        </a>

        {{-- Deskripsi --}}
        <div class="detail-card">
            <h4><i class="fas fa-align-left"></i> Tentang UMKM</h4>
            <p class="detail-desc">{{ $umkm->deskripsi }}</p>
        </div>

        {{-- Info Detail --}}
        <div class="detail-card">
            <h4><i class="fas fa-info-circle"></i> Informasi Kontak</h4>
            @if($umkm->alamat)
            <div class="info-row">
                <i class="fas fa-map-marker-alt"></i>
                <div><strong>Alamat</strong><br>{{ $umkm->alamat }}</div>
            </div>
            @endif
            @if($umkm->kontak)
            <div class="info-row">
                <i class="fas fa-phone-alt"></i>
                <div><strong>Kontak</strong><br>{{ $umkm->kontak }}</div>
            </div>
            @endif
        </div>

        {{-- CTA WA --}}
        @if($umkm->kontak)
        @php
            $phone = preg_replace('/[^0-9]/', '', $umkm->kontak);
            if(strlen($phone) > 0 && $phone[0] === '0') {
                $phone = '62' . substr($phone, 1);
            }
            $waMsg = 'Halo%2C%20saya%20tertarik%20dengan%20produk%20' . urlencode($umkm->nama) . '%20di%20Geosite%20Sibaganding';
        @endphp
        <div class="detail-card text-center" style="background: linear-gradient(135deg, #f0f9f0, #e8f8f0);">
            <p style="font-size:.9rem; color:#2c5f8a; margin-bottom:20px;">
                Tertarik dengan produk ini? Hubungi langsung melalui WhatsApp untuk informasi lebih lanjut dan pemesanan.
            </p>
            <a href="https://wa.me/{{ $phone }}?text={{ $waMsg }}" target="_blank" class="wa-cta">
                <i class="fab fa-whatsapp" style="font-size:1.3rem;"></i>
                Hubungi via WhatsApp
            </a>
        </div>
        @endif

    </div>
</div>
@endsection