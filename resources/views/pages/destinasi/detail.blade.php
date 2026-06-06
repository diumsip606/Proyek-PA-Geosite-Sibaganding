@extends('layouts.app')

@section('title', $data->nama . ' - Geosite Danau Toba')

@section('content')

<style>
/* Hero Detail Section */
.destinasi-detail-hero {
    height: auto;
    min-height: 480px;
    background: linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.7)), 
                url('{{ $data->gambar_utama ? asset($data->gambar_utama) : asset('images/sibaganding1.jpg') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
    margin-top: 76px;
    padding: 100px 20px;
}

.destinasi-detail-hero::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100px;
    background: linear-gradient(to top, #ffffff, transparent);
    z-index: 1;
}

.hero-content-wrapper {
    position: relative;
    z-index: 2;
    max-width: 900px;
    animation: fadeInUp 1.2s cubic-bezier(0.16, 1, 0.3, 1);
}

.hero-badge-pill {
    display: inline-block;
    padding: 6px 22px;
    background: rgba(198, 164, 59, 0.2);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(198, 164, 59, 0.4);
    border-radius: 50px;
    font-size: 0.78rem;
    color: #ffd863;
    letter-spacing: 3px;
    text-transform: uppercase;
    font-weight: 600;
    margin-bottom: 24px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.15);
}

.destinasi-detail-hero h1 {
    font-family: 'Cinzel', serif !important;
    font-size: 3.8rem;
    font-weight: 700;
    letter-spacing: 2px;
    line-height: 1.2;
    text-shadow: 0 4px 25px rgba(0, 0, 0, 0.7);
    margin-bottom: 20px;
}

.hero-meta-info {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 25px;
    font-family: 'Raleway', sans-serif;
    font-size: 0.95rem;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.9);
}

.hero-meta-item {
    display: flex;
    align-items: center;
    gap: 8px;
}

.hero-meta-item i {
    color: #c6a43b;
    font-size: 1.1rem;
}

/* Floating navigation button */
.nav-back-float {
    position: absolute;
    top: 30px;
    left: 40px;
    z-index: 10;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.25);
    color: #fff;
    padding: 10px 24px;
    border-radius: 50px;
    font-size: 0.82rem;
    font-weight: 500;
    letter-spacing: 1px;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.nav-back-float:hover {
    background: #c6a43b;
    border-color: #c6a43b;
    color: #1a1a1a;
    transform: translateX(-5px);
    box-shadow: 0 5px 15px rgba(198, 164, 59, 0.4);
}

/* Page Layout */
.content-wrapper {
    position: relative;
    z-index: 5;
    margin-top: -40px;
    padding-bottom: 80px;
}

.card-premium {
    background: #ffffff;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    border: 1px solid rgba(0, 0, 0, 0.03);
    padding: 40px;
    margin-bottom: 40px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card-premium:hover {
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
}

.card-premium h3 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2.2rem;
    font-weight: 700;
    color: #1a3c5e;
    position: relative;
    padding-bottom: 15px;
    margin-bottom: 30px;
    border-bottom: 1px solid #eef2f6;
}

.card-premium h3::after {
    content: '';
    position: absolute;
    bottom: -1px;
    left: 0;
    width: 60px;
    height: 3px;
    background: linear-gradient(90deg, #c6a43b, #ffd863);
    border-radius: 3px;
}

.about-text {
    font-family: 'Poppins', sans-serif;
    font-size: 1.05rem;
    line-height: 1.95;
    color: #4a5568;
    text-align: justify;
}

.about-text::first-letter {
    font-family: 'Cinzel', serif;
    font-size: 3.5rem;
    font-weight: 700;
    float: left;
    line-height: 1;
    margin-right: 12px;
    color: #1a3c5e;
    text-shadow: 1px 1px 0px #c6a43b;
}

/* Sidebar Widgets */
.sidebar-widget {
    background: #ffffff;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    border: 1px solid rgba(0, 0, 0, 0.03);
    padding: 30px;
    margin-bottom: 30px;
}

.sidebar-widget h4 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.6rem;
    font-weight: 700;
    color: #1a3c5e;
    margin-bottom: 20px;
    padding-bottom: 12px;
    border-bottom: 1px solid #eef2f6;
    position: relative;
}

.sidebar-widget h4::after {
    content: '';
    position: absolute;
    bottom: -1px;
    left: 0;
    width: 40px;
    height: 2.5px;
    background: #c6a43b;
}

.info-list {
    list-style: none;
    padding: 0;
    margin: 0 0 25px 0;
}

.info-item {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    padding: 15px 0;
    border-bottom: 1px dashed #eef2f6;
}

.info-item:last-child {
    border-bottom: none;
}

.info-icon {
    width: 38px;
    height: 38px;
    background: #f0f5fa;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #1a3c5e;
    font-size: 1rem;
    flex-shrink: 0;
    transition: all 0.3s ease;
}

.info-item:hover .info-icon {
    background: #c6a43b;
    color: white;
    transform: rotate(5deg);
}

.info-details {
    display: flex;
    flex-direction: column;
}

.info-label {
    font-size: 0.78rem;
    color: #8898aa;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 500;
}

.info-value {
    font-size: 0.95rem;
    font-weight: 600;
    color: #2d3748;
}

/* Share Widget */
.share-buttons {
    display: flex;
    gap: 10px;
}

.btn-share {
    flex: 1;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 10px;
    border-radius: 12px;
    font-size: 0.85rem;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-fb { background: #eef2f6; color: #3b5998; border: 1px solid #dee2e6; }
.btn-fb:hover { background: #3b5998; color: white; border-color: #3b5998; }

.btn-wa { background: #eef2f6; color: #25d366; border: 1px solid #dee2e6; }
.btn-wa:hover { background: #25d366; color: white; border-color: #25d366; }

/* Visual & Gallery card */
.featured-image-container {
    position: relative;
    border-radius: 15px;
    overflow: hidden;
    margin-bottom: 25px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.12);
}

.featured-image-container img {
    width: 100%;
    height: 420px;
    object-fit: cover;
    transition: transform 0.6s ease;
}

.featured-image-container:hover img {
    transform: scale(1.04);
}

.img-caption {
    background: #f8fafc;
    border-left: 3px solid #c6a43b;
    padding: 15px 20px;
    border-radius: 0 8px 8px 0;
    font-size: 0.9rem;
    color: #718096;
    font-style: italic;
}

/* Map Widget styling */
.map-iframe-container {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    border: 1px solid #eef2f6;
}

/* Destinasi Lainnya (Related) */
.related-section {
    background: #f8fafc;
    padding: 80px 0;
    border-top: 1px solid #eef2f6;
}

.related-title-wrapper {
    text-align: center;
    margin-bottom: 50px;
}

.related-title-wrapper span {
    font-size: 0.75rem;
    letter-spacing: 3px;
    color: #c6a43b;
    text-transform: uppercase;
    font-weight: 600;
}

.related-title-wrapper h2 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2.8rem;
    font-weight: 700;
    color: #1a3c5e;
}

.related-card {
    border: none;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0,0,0,0.04);
    transition: all 0.4s ease;
    height: 100%;
}

.related-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
}

.related-img-box {
    position: relative;
    height: 220px;
    overflow: hidden;
}

.related-img-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}

.related-card:hover .related-img-box img {
    transform: scale(1.06);
}

.related-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: rgba(26, 60, 94, 0.85);
    color: white;
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
    font-size: 0.68rem;
    font-weight: 600;
    letter-spacing: 1px;
    text-transform: uppercase;
    padding: 5px 14px;
    border-radius: 20px;
}

.related-body {
    padding: 24px;
    display: flex;
    flex-direction: column;
}

.related-card-title {
    font-family: 'Poppins', sans-serif;
    font-size: 1.15rem;
    font-weight: 600;
    color: #1a3c5e;
    margin-bottom: 10px;
    transition: color 0.3s;
}

.related-card:hover .related-card-title {
    color: #c6a43b;
}

.related-text {
    font-size: 0.88rem;
    color: #718096;
    line-height: 1.6;
    margin-bottom: 20px;
}

.btn-jelajahi {
    align-self: flex-start;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 0.82rem;
    font-weight: 600;
    color: #1a3c5e;
    text-decoration: none;
    border-bottom: 1px solid #1a3c5e;
    padding-bottom: 2px;
    transition: all 0.3s ease;
}

.btn-jelajahi:hover {
    color: #c6a43b;
    border-color: #c6a43b;
    padding-left: 5px;
}

/* Back Button Footer */
.action-footer {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.btn-back-footer {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: #1a3c5e;
    color: white;
    padding: 14px 36px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    box-shadow: 0 6px 20px rgba(26, 60, 94, 0.25);
    transition: all 0.3s ease;
}

.btn-back-footer:hover {
    background: #c6a43b;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(198, 164, 59, 0.35);
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ==================== RESPONSIVE ==================== */
@media (max-width: 992px) {
    .destinasi-detail-hero {
        min-height: 380px;
        padding: 80px 20px;
    }
    .destinasi-detail-hero h1 {
        font-size: 2.8rem;
    }
    .hero-meta-info {
        gap: 15px;
        font-size: 0.88rem;
    }
    .card-premium {
        padding: 30px;
    }
    .featured-image-container img {
        height: 320px;
    }
}

@media (max-width: 768px) {
    .destinasi-detail-hero {
        min-height: 300px;
        padding: 60px 16px;
    }
    .destinasi-detail-hero h1 {
        font-size: 2.2rem;
    }
    .hero-meta-info {
        flex-direction: column;
        gap: 8px;
    }
    .nav-back-float {
        top: 20px;
        left: 20px;
        padding: 8px 18px;
        font-size: 0.78rem;
    }
    .content-wrapper {
        margin-top: -20px;
        padding-bottom: 50px;
    }
    .card-premium {
        padding: 24px;
    }
    .card-premium h3 {
        font-size: 1.8rem;
    }
    .featured-image-container img {
        height: 240px;
    }
    .related-title-wrapper h2 {
        font-size: 2.2rem;
    }
    .about-text {
        font-size: 0.98rem;
    }
}

@media (max-width: 576px) {
    .destinasi-detail-hero {
        min-height: 250px;
    }
    .destinasi-detail-hero h1 {
        font-size: 1.8rem;
    }
    .hero-badge-pill {
        padding: 4px 16px;
        font-size: 0.7rem;
        margin-bottom: 16px;
    }
    .nav-back-float {
        display: none; /* Hide floating button on tiny screen to avoid overlap */
    }
    .related-img-box {
        height: 180px;
    }
}
</style>

<!-- HERO -->
<div class="destinasi-detail-hero">
    <!-- Floating Back Button -->
    <a href="{{ url('/destinasi') }}" class="nav-back-float">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
    
    <div class="hero-content-wrapper">
        <span class="hero-badge-pill">{{ $data->kategori->nama ?? 'Geosite Danau Toba' }}</span>
        <h1>{{ $data->nama }}</h1>
        <div class="hero-meta-info">
            <div class="hero-meta-item">
                <i class="fas fa-map-marker-alt"></i>
                <span>{{ $data->lokasi ?? 'Sibaganding' }}</span>
            </div>
            <div class="hero-meta-item">
                <i class="fas fa-globe"></i>
                <span>Danau Toba, Indonesia</span>
            </div>
        </div>
    </div>
</div>

<!-- CONTENT -->
<div class="container content-wrapper">
    <div class="row">
        <!-- Main Column -->
        <div class="col-lg-8">
            <!-- Deskripsi Section -->
            <div class="card-premium">
                <h3>Tentang Geosite</h3>
                <div class="about-text">
                    {{ $data->deskripsi }}
                </div>
            </div>

            <!-- Visual / Image Section -->
            <div class="card-premium">
                <h3>Visual Geosite</h3>
                <div class="featured-image-container">
                <img src="{{ $data->gambar_utama ? asset($data->gambar_utama) : asset('images/sibaganding1.jpg') }}" 
                    alt="{{ $data->nama }}"
                    onerror="this.onerror=null;this.src='{{ asset('images/sibaganding1.jpg') }}';">                </div>
                <div class="img-caption">
                    <i class="fas fa-info-circle me-2"></i>Keindahan alam panorama {{ $data->nama }} di kawasan Geosite Sibaganding, Danau Toba.
                </div>
            </div>
        </div>

        <!-- Sidebar Column -->
        <div class="col-lg-4">
            <!-- Quick Facts Widget -->
            <div class="sidebar-widget">
                <h4>Informasi Singkat</h4>
                <ul class="info-list">
                    <li class="info-item">
                        <div class="info-icon">
                            <i class="fa-solid fa-layer-group"></i>
                        </div>
                        <div class="info-details">
                            <span class="info-label">Kategori Pilar</span>
                            <span class="info-value">{{ $data->kategori->nama ?? 'Geosite' }}</span>
                        </div>
                    </li>
                    <li class="info-item">
                        <div class="info-icon">
                            <i class="fa-solid fa-map-pin"></i>
                        </div>
                        <div class="info-details">
                            <span class="info-label">Lokasi Wilayah</span>
                            <span class="info-value">{{ $data->lokasi ?? 'Sibaganding' }}</span>
                        </div>
                    </li>
                    <li class="info-item">
                        <div class="info-icon">
                            <i class="fa-solid fa-circle-check text-success"></i>
                        </div>
                        <div class="info-details">
                            <span class="info-label">Status Akses</span>
                            <span class="info-value text-success">Terbuka Untuk Umum</span>
                        </div>
                    </li>
                </ul>

                <h5 class="font-size-sm text-uppercase text-muted fw-bold mb-3" style="font-size: 0.75rem; letter-spacing: 1px;">Bagikan Keindahan</h5>
                <div class="share-buttons">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="btn-share btn-fb">
                        <i class="fab fa-facebook-f"></i> Facebook
                    </a>
                    <a href="https://api.whatsapp.com/send?text={{ urlencode($data->nama . ' - Jelajahi Geosite Sibaganding: ' . request()->fullUrl()) }}" target="_blank" class="btn-share btn-wa">
                        <i class="fab fa-whatsapp"></i> WhatsApp
                    </a>
                </div>
            </div>

            <!-- Map Location Widget -->
            <div class="sidebar-widget">
                <h4>Peta Lokasi</h4>
                <div class="map-iframe-container">
                    <iframe 
                        src="https://www.google.com/maps?q={{ urlencode($data->lokasi ?? $data->nama) }}&output=embed"
                        width="100%" 
                        height="300" 
                        style="border:none; display: block;"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- RELATED DESTINATIONS -->
@if(isset($otherDestinasi) && count($otherDestinasi) > 0)
<section class="related-section">
    <div class="container">
        <div class="related-title-wrapper">
            <span>Rekomendasi Lainnya</span>
            <h2>Destinasi Geosite Terkait</h2>
        </div>

        <div class="row">
            @foreach($otherDestinasi as $other)
            <div class="col-md-4 mb-4">
                <div class="card related-card">
                    <div class="related-img-box">
            <img src="{{ $data->gambar_utama ? asset($data->gambar_utama) : asset('images/sibaganding1.jpg') }}" 
                alt="{{ $data->nama }}"
                onerror="this.onerror=null;this.src='{{ asset('images/sibaganding1.jpg') }}';">                        <span class="related-badge">{{ $other->kategori->nama ?? 'Geosite' }}</span>
                    </div>
                    <div class="card-body related-body">
                        <h5 class="related-card-title">{{ $other->nama }}</h5>
                        <p class="related-text">{{ Str::limit($other->deskripsi, 100) }}</p>
                        <a href="{{ route('destinasi.show', $other->id) }}" class="btn-jelajahi">
                            Jelajahi <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="action-footer">
            <a href="{{ url('/destinasi') }}" class="btn-back-footer">
                <i class="fas fa-arrow-left"></i> Kembali ke Semua Destinasi
            </a>
        </div>
    </div>
</section>
@endif

@endsection
