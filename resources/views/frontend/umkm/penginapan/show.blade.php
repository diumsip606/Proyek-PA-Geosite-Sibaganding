@extends('layouts.app')

@section('title', $penginapan->nama . ' - Penginapan Sibaganding')

@section('content')
<style>
    .hotel-detail-hero {
        height: 400px; position: relative; overflow: hidden; margin-top: 76px;
    }
    .hotel-detail-hero img {
        width:100%; height:100%; object-fit:cover; transition: transform 8s ease;
    }
    .hotel-detail-hero:hover img { transform: scale(1.05); }
    .hotel-detail-overlay {
        position: absolute; inset:0;
        background: linear-gradient(to top, rgba(0,20,50,0.85) 0%, rgba(0,30,70,0.25) 55%, transparent 100%);
        display: flex; align-items: flex-end; padding: 40px;
    }
    .hotel-detail-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: 3rem; color: white; font-weight: 700;
        text-shadow: 0 2px 16px rgba(0,0,0,0.4); line-height: 1.2;
    }
    .hotel-detail-badge {
        display: inline-block; padding: 5px 14px;
        background: rgba(198,164,59,0.25); color: #c6a43b;
        border: 1px solid rgba(198,164,59,0.5);
        border-radius: 30px; font-size: 0.75rem; font-weight: 600;
        letter-spacing:.05em; margin-bottom: 12px;
    }
    .hotel-detail-body {
        max-width: 880px; margin: 0 auto; padding: 50px 24px 80px;
    }
    .detail-card {
        background: white; border-radius: 20px; padding: 32px;
        margin-bottom: 22px;
        box-shadow: 0 4px 24px rgba(0,51,102,0.07);
        border: 1px solid rgba(0,51,102,0.06);
    }
    .detail-card h4 {
        font-size: 1rem; font-weight: 700; color: #003366;
        margin-bottom: 14px; display:flex; align-items:center; gap:8px;
    }
    .detail-card h4 i { color: #c6a43b; }
    .detail-desc { font-size:.92rem; color:#4a6b82; line-height:1.88; }
    .info-row {
        display:flex; align-items:flex-start; gap:12px;
        padding:13px 0; border-bottom:1px solid rgba(0,51,102,0.06);
        font-size:.88rem; color:#2c5f8a;
    }
    .info-row:last-child { border-bottom:none; }
    .info-row i { color:#c6a43b; margin-top:2px; width:16px; flex-shrink:0; }
    .price-highlight {
        font-size: 1.6rem; font-weight: 800; color: #c6a43b;
        display:flex; align-items:baseline; gap:6px;
    }
    .price-highlight small { font-size:.85rem; color:#888; font-weight:400; }
    .wa-cta {
        display:inline-flex; align-items:center; gap:10px;
        background: linear-gradient(135deg, #25d366, #128c50);
        color:white; text-decoration:none; padding:15px 36px;
        border-radius:50px; font-size:.92rem; font-weight:700;
        box-shadow: 0 8px 24px rgba(37,211,102,0.3); transition: all .3s ease;
    }
    .wa-cta:hover { color:white; transform:translateY(-3px); box-shadow:0 12px 32px rgba(37,211,102,.4); }
    .back-link {
        display:inline-flex; align-items:center; gap:8px;
        color:#003366; text-decoration:none; font-size:.85rem;
        font-weight:600; padding:10px 20px; border-radius:30px;
        border:1px solid rgba(0,51,102,0.2); transition:.3s; margin-bottom:30px;
    }
    .back-link:hover { background:#003366; color:white; }
    @media(max-width:576px) {
        .hotel-detail-hero { height: 270px; }
        .hotel-detail-title { font-size: 2rem; }
        .hotel-detail-overlay { padding: 24px; }
    }
</style>

<div class="hotel-detail-hero">
    @if($penginapan->gambar)
        <img src="{{ asset($penginapan->gambar) }}" alt="{{ $penginapan->nama }}">
    @else
        <img src="/image/sejarah2.jpg" alt="{{ $penginapan->nama }}">
    @endif
    <div class="hotel-detail-overlay">
        <div>
            <div class="hotel-detail-badge"><i class="fas fa-hotel me-2"></i>Akomodasi Sibaganding</div>
            <h1 class="hotel-detail-title">{{ $penginapan->nama }}</h1>
        </div>
    </div>
</div>

<div style="background:#f8fbff;">
    <div class="hotel-detail-body">

        <a href="{{ route('penginapan.index') }}" class="back-link">
            <i class="fas fa-arrow-left"></i> Kembali ke Daftar Penginapan
        </a>

        {{-- Harga --}}
        @if($penginapan->harga)
        <div class="detail-card" style="background: linear-gradient(135deg,#fffbef,#fdf6e0); border-color: rgba(198,164,59,0.2);">
            <h4><i class="fas fa-money-bill-wave"></i> Estimasi Harga</h4>
            <div class="price-highlight">
                Rp {{ number_format($penginapan->harga) }}
                <small>/ malam</small>
            </div>
            <p style="font-size:.78rem; color:#888; margin-top:8px; margin-bottom:0;">*Harga dapat berubah sewaktu-waktu. Konfirmasi langsung dengan penginapan.</p>
        </div>
        @endif

        {{-- Deskripsi --}}
        <div class="detail-card">
            <h4><i class="fas fa-align-left"></i> Tentang Penginapan</h4>
            <p class="detail-desc">{{ $penginapan->deskripsi }}</p>
        </div>

        {{-- Info & Kontak --}}
        <div class="detail-card">
            <h4><i class="fas fa-info-circle"></i> Informasi & Lokasi</h4>
            @if($penginapan->alamat)
            <div class="info-row">
                <i class="fas fa-map-marker-alt"></i>
                <div><strong>Alamat</strong><br>{{ $penginapan->alamat }}</div>
            </div>
            @endif
            @if($penginapan->kontak)
            <div class="info-row">
                <i class="fas fa-phone-alt"></i>
                <div><strong>Nomor Kontak / WhatsApp</strong><br>{{ $penginapan->kontak }}</div>
            </div>
            @endif
        </div>

        {{-- WA CTA --}}
        @if($penginapan->kontak)
        @php
            $phone = preg_replace('/[^0-9]/', '', $penginapan->kontak);
            if(strlen($phone) > 0 && $phone[0] === '0') {
                $phone = '62' . substr($phone, 1);
            }
            $msg = 'Halo%2C%20saya%20ingin%20memesan%20kamar%20di%20' . urlencode($penginapan->nama) . '%20Geosite%20Sibaganding';
        @endphp
        <div class="detail-card text-center" style="background: linear-gradient(135deg,#f0faf2,#e6f7ec); border-color: rgba(37,211,102,0.2);">
            <p style="font-size:.9rem; color:#2c5f8a; margin-bottom:22px;">
                Siap untuk menginap? Hubungi langsung via WhatsApp untuk reservasi dan informasi ketersediaan kamar.
            </p>
            <a href="https://wa.me/{{ $phone }}?text={{ $msg }}" target="_blank" class="wa-cta">
                <i class="fab fa-whatsapp" style="font-size:1.3rem;"></i>
                Pesan / Hubungi via WhatsApp
            </a>
        </div>
        @endif

    </div>
</div>
@endsection
