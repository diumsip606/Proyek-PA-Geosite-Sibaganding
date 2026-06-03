@extends('layouts.app')

@section('title', 'Hotel & Penginapan Sibaganding - Geosite Danau Toba')

@section('content')

<style>
    .hotel-hero {
        height: 35vh;
        background: linear-gradient(rgba(0,51,102,0.7), rgba(0,80,130,0.5)), url('/image/sejarah2.jpg');
        background-size: cover; background-position: center;
        display: flex; align-items: center; justify-content: center;
        text-align: center; color: white; margin-top: 76px;
    }
    .hotel-hero h1 {
        font-size: 3rem; font-family: 'Cormorant Garamond', serif;
        text-shadow: 0 2px 15px rgba(0,0,0,0.3); margin-bottom: 10px;
    }
    .hotel-hero p { font-size:.85rem; letter-spacing:.2em; text-transform:uppercase; opacity:.85; }
    .hotel-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 28px;
        padding: 60px 24px;
        max-width: 1100px; margin: 0 auto;
    }
    .hotel-card {
        background: white; border-radius: 20px; overflow: hidden;
        box-shadow: 0 6px 24px rgba(0,51,102,0.07);
        border: 1px solid rgba(0,51,102,0.06);
        transition: all 0.35s ease; display: flex; flex-direction: column;
    }
    .hotel-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 44px rgba(0,51,102,0.14);
        border-color: #c6a43b;
    }
    .hotel-card-img { height: 200px; overflow: hidden; position: relative; }
    .hotel-card-img img { width:100%; height:100%; object-fit:cover; transition: transform .5s ease; }
    .hotel-card:hover .hotel-card-img img { transform: scale(1.07); }
    .hotel-price-badge {
        position: absolute; bottom: 12px; left: 12px;
        background: rgba(0,20,50,0.82); color: #c6a43b;
        padding: 5px 12px; border-radius: 20px;
        font-size: 0.78rem; font-weight: 700;
        backdrop-filter: blur(6px);
    }
    .hotel-card-body { padding: 22px; flex-grow:1; display:flex; flex-direction:column; }
    .hotel-card-title {
        font-size: 1.05rem; font-weight: 700; color: #003366;
        margin-bottom: 6px;
    }
    .hotel-addr { font-size:.72rem; color:#888; margin-bottom:10px;
        display:flex; align-items:center; gap:5px; }
    .hotel-card-desc { font-size:.82rem; color:#4a6b82; line-height:1.7; margin-bottom:16px; flex-grow:1; }
    .hotel-card-footer {
        display:flex; gap:10px; align-items:center;
        border-top: 1px solid rgba(0,51,102,0.07);
        padding-top: 14px; margin-top: auto;
    }
    .btn-wa {
        display:inline-flex; align-items:center; gap:6px;
        background:#25d366; color:white; text-decoration:none;
        padding:8px 16px; border-radius:30px; font-size:.78rem;
        font-weight:600; transition:.3s; flex-shrink:0;
    }
    .btn-wa:hover { background:#20ba5a; color:white; transform:translateY(-2px); }
    .btn-detail {
        display:inline-flex; align-items:center; gap:6px;
        background:#003366; color:white; text-decoration:none;
        padding:8px 16px; border-radius:30px; font-size:.78rem;
        font-weight:600; transition:.3s;
    }
    .btn-detail:hover { background:#0a4a7a; color:white; }
    @media(max-width:768px) { .hotel-grid { grid-template-columns: repeat(2,1fr); } }
    @media(max-width:480px) {
        .hotel-grid { grid-template-columns: 1fr; }
        .hotel-hero h1 { font-size: 2rem; }
    }
</style>

<section class="hotel-hero">
    <div data-aos="fade-up">
        <h1>Hotel & Penginapan</h1>
        <p>Rekomendasi Akomodasi Terbaik di Sekitar Geosite Sibaganding</p>
    </div>
</section>

<div style="background:#f8fbff; min-height:60vh;">
    <div class="hotel-grid">
        @forelse($penginapans as $hotel)
        @php
            $cleanPhone = preg_replace('/[^0-9]/', '', $hotel->kontak ?? '');
            if(strlen($cleanPhone) > 0 && $cleanPhone[0] === '0') {
                $cleanPhone = '62' . substr($cleanPhone, 1);
            }
        @endphp
        <div class="hotel-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
            <div class="hotel-card-img">
                <img src="{{ $hotel->gambar ? asset($hotel->gambar) : '/image/sejarah2.jpg' }}" alt="{{ $hotel->nama }}">
                @if($hotel->harga)
                <div class="hotel-price-badge">
                    <i class="fas fa-moon me-1"></i>Rp {{ number_format($hotel->harga) }}/malam
                </div>
                @endif
            </div>
            <div class="hotel-card-body">
                <h3 class="hotel-card-title">{{ $hotel->nama }}</h3>
                @if($hotel->alamat)
                <p class="hotel-addr"><i class="fas fa-map-marker-alt" style="color:#c6a43b;"></i> {{ Str::limit($hotel->alamat, 45) }}</p>
                @endif
                <p class="hotel-card-desc">{{ Str::limit($hotel->deskripsi, 100) }}</p>
                <div class="hotel-card-footer">
                    <a href="{{ route('penginapan.show', $hotel->slug) }}" class="btn-detail">
                        <i class="fas fa-info-circle"></i> Detail
                    </a>
                    @if($hotel->kontak)
                    <a href="https://wa.me/{{ $cleanPhone }}?text=Halo%2C%20saya%20ingin%20informasi%20mengenai%20{{ urlencode($hotel->nama) }}" target="_blank" class="btn-wa">
                        <i class="fab fa-whatsapp"></i> Pesan
                    </a>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div style="grid-column:1/-1; text-align:center; padding:60px 0; color:#888;">
            <i class="fas fa-hotel" style="font-size:3rem; opacity:.3; display:block; margin-bottom:15px;"></i>
            <p>Belum ada data Hotel & Penginapan aktif saat ini.</p>
        </div>
        @endforelse
    </div>
</div>

@endsection