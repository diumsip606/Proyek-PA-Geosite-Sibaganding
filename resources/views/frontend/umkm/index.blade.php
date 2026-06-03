@extends('layouts.app')

@section('title', 'Daftar UMKM Sibaganding - Geosite Danau Toba')

@section('content')

<style>
    .umkm-hero {
        height: 35vh;
        background: linear-gradient(rgba(0,51,102,0.7), rgba(0,102,153,0.5)), url('/image/sejarah-hero.jpg');
        background-size: cover;
        background-position: center;
        display: flex; align-items: center; justify-content: center;
        text-align: center; color: white; margin-top: 76px;
    }
    .umkm-hero h1 {
        font-size: 3rem; font-family: 'Cormorant Garamond', serif;
        text-shadow: 0 2px 15px rgba(0,0,0,0.3);
    }
    .umkm-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 28px;
        padding: 60px 24px;
        max-width: 1100px;
        margin: 0 auto;
    }
    .umkm-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 6px 24px rgba(0,51,102,0.07);
        border: 1px solid rgba(0,51,102,0.06);
        transition: all 0.35s ease;
        display: flex; flex-direction: column;
    }
    .umkm-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 18px 40px rgba(0,51,102,0.14);
        border-color: #c6a43b;
    }
    .umkm-card-img-wrap {
        height: 200px; overflow: hidden;
    }
    .umkm-card-img-wrap img {
        width: 100%; height: 100%; object-fit: cover;
        transition: transform 0.5s ease;
    }
    .umkm-card:hover .umkm-card-img-wrap img { transform: scale(1.07); }
    .umkm-card-body { padding: 22px; flex-grow: 1; display: flex; flex-direction: column; }
    .umkm-card-title {
        font-size: 1.05rem; font-weight: 700; color: #003366;
        margin-bottom: 8px; font-family: 'Poppins', sans-serif;
    }
    .umkm-card-desc {
        font-size: 0.82rem; color: #4a6b82; line-height: 1.7;
        margin-bottom: 16px; flex-grow: 1;
    }
    .umkm-card-footer {
        display: flex; gap: 10px; align-items: center;
        border-top: 1px solid rgba(0,51,102,0.07);
        padding-top: 14px; margin-top: auto;
    }
    .btn-wa {
        display: inline-flex; align-items: center; gap: 6px;
        background: #25d366; color: white; text-decoration: none;
        padding: 8px 16px; border-radius: 30px; font-size: 0.78rem;
        font-weight: 600; transition: 0.3s; flex-shrink: 0;
    }
    .btn-wa:hover { background: #20ba5a; color: white; transform: translateY(-2px); }
    .btn-detail {
        display: inline-flex; align-items: center; gap: 6px;
        background: #003366; color: white; text-decoration: none;
        padding: 8px 16px; border-radius: 30px; font-size: 0.78rem;
        font-weight: 600; transition: 0.3s;
    }
    .btn-detail:hover { background: #0a4a7a; color: white; }
    .addr-badge {
        font-size: 0.7rem; color: #888; margin-bottom: 14px;
        display: flex; align-items: center; gap: 5px;
    }
    @media(max-width: 768px) {
        .umkm-grid { grid-template-columns: repeat(2,1fr); }
    }
    @media(max-width: 480px) {
        .umkm-grid { grid-template-columns: 1fr; }
        .umkm-hero h1 { font-size: 2rem; }
    }
</style>

<section class="umkm-hero">
    <div data-aos="fade-up">
        <h1>UMKM Sibaganding</h1>
        <p style="letter-spacing:.2em; font-size:.85rem; text-transform:uppercase; opacity:.85;">Produk Lokal Unggulan Geosite Danau Toba</p>
    </div>
</section>

<div style="background:#f8fbff; min-height:60vh;">
    <div class="umkm-grid">
        @forelse($umkms as $umkm)
        @php
            $cleanPhone = preg_replace('/[^0-9]/', '', $umkm->kontak ?? '');
            if(strlen($cleanPhone) > 0 && $cleanPhone[0] === '0') {
                $cleanPhone = '62' . substr($cleanPhone, 1);
            }
        @endphp
        <div class="umkm-card" data-aos="fade-up">
            <div class="umkm-card-img-wrap">
                <img src="{{ $umkm->gambar ? asset($umkm->gambar) : '/image/sejarah1.jpg' }}" alt="{{ $umkm->nama }}">
            </div>
            <div class="umkm-card-body">
                <h3 class="umkm-card-title">{{ $umkm->nama }}</h3>
                @if($umkm->alamat)
                <p class="addr-badge"><i class="fas fa-map-marker-alt" style="color:#c6a43b;"></i> {{ Str::limit($umkm->alamat, 45) }}</p>
                @endif
                <p class="umkm-card-desc">{{ Str::limit($umkm->deskripsi, 110) }}</p>
                <div class="umkm-card-footer">
                    <a href="{{ route('umkm.show', $umkm->slug) }}" class="btn-detail"><i class="fas fa-info-circle"></i> Detail</a>
                    @if($umkm->kontak)
                    <a href="https://wa.me/{{ $cleanPhone }}?text=Halo%2C%20saya%20tertarik%20dengan%20{{ urlencode($umkm->nama) }}" target="_blank" class="btn-wa"><i class="fab fa-whatsapp"></i> WA</a>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div style="grid-column: 1/-1; text-align:center; padding: 60px 0; color: #888;">
            <i class="fas fa-store" style="font-size:3rem; opacity:.3; display:block; margin-bottom:15px;"></i>
            <p>Belum ada data UMKM aktif saat ini.</p>
        </div>
        @endforelse
    </div>
</div>

@endsection