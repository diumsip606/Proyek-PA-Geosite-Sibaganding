@extends('layouts.app')

@section('title', 'Sejarah Caldera Toba - Geosite Danau Toba')

@section('content')

<style>
    /* ========== LOGO ========== */
    .logo-container {
        position: fixed;
        top: 20px;
        left: 20px;
        z-index: 9999;
        display: flex;
        align-items: center;
        gap: 20px;
        background: rgba(0, 51, 102, 0.98);
        padding: 8px 24px;
        border-radius: 60px;
        backdrop-filter: blur(8px);
        box-shadow: 0 8px 25px rgba(0, 51, 102, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
    }
    .logo-container:hover {
        background: #0a4a7a;
        box-shadow: 0 12px 30px rgba(0, 51, 102, 0.4);
        transform: translateY(-2px);
    }
    .flag-img { width: 100px; height: auto; border-radius: 6px; }
    .logo-divider { width: 2px; height: 35px; background: rgba(255,255,255,0.3); }
    .del-img { width: 50px; height: auto; border-radius: 8px; }
    .geotoba-text {
        font-size: 1.5rem;
        font-weight: 800;
        letter-spacing: 1px;
        color: white;
        font-family: 'Inter', 'Poppins', sans-serif;
    }
    .geotoba-sub {
        font-size: 0.7rem;
        font-weight: 500;
        color: rgba(255,255,255,0.8);
        letter-spacing: 0.5px;
    }
    @media (max-width: 768px) {
        .flag-img { width: 60px; }
        .del-img { width: 35px; }
        .geotoba-text { font-size: 1.2rem; }
    }
    @media (max-width: 576px) {
        .flag-img { width: 45px; }
        .del-img { width: 28px; }
        .geotoba-text { font-size: 0.9rem; }
    }

    /* ========== HERO ========== */
    .sejarah-hero {
        height: 45vh;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        padding-top: 76px;
    }
    .sejarah-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(rgba(0, 36, 65, 0.65), rgba(0, 36, 65, 0.45));
        z-index: 2;
    }
    .sejarah-hero > div {
        position: relative;
        z-index: 3;
        width: 90%;
        max-width: 800px;
    }
    .sejarah-hero h1 {
        font-family: 'Cinzel', serif !important;
        font-size: 3.5rem;
<<<<<<< HEAD
        font-family: 'Cinzel', serif;
        font-weight: 700;
        letter-spacing: 6px;
        text-transform: uppercase;
        text-shadow: 2px 4px 20px rgba(0,0,0,0.5);
=======
        font-weight: 700;
>>>>>>> eecf22f4b37cbfbee4f772e9d5e73fa933c271c9
        margin-bottom: 12px;
    }
    .sejarah-hero p {
<<<<<<< HEAD
        font-family: 'Cormorant Garamond', serif;
        font-size: 1rem;
        letter-spacing: 4px;
=======
        font-family: 'Raleway', sans-serif;
        font-size: 0.9rem;
        letter-spacing: 0.2em;
>>>>>>> eecf22f4b37cbfbee4f772e9d5e73fa933c271c9
        text-transform: uppercase;
        opacity: 0.9;
        font-weight: 600;
        line-height: 2;
    }

    /* ========== SECTION ========== */
    .section { padding: 60px 0; }
    .bg-light { background: linear-gradient(135deg, #e0ecf7 0%, #d4e4f2 100%); }
    .container { max-width: 1100px; margin: 0 auto; padding: 0 24px; }
    .section-title { text-align: center; margin-bottom: 45px; }
    .section-title h2 {
        font-size: 2rem;
        font-family: 'Cormorant Garamond', serif;
        color: #003366;
    }
    .divider { width: 50px; height: 2px; background: #c6a43b; margin: 10px auto 0; }
    .section-title p { color: #2c5f8a; margin-top: 15px; }

    /* ========== SEJARAH BERSILANG ========== */
    .sejarah-grid { display: flex; flex-direction: column; gap: 45px; }
    .sejarah-item { display: flex; align-items: center; gap: 50px; flex-wrap: wrap; }
    .sejarah-item.reverse { flex-direction: row-reverse; }
    .sejarah-text { flex: 1; line-height: 1.8; color: #2c5f8a; font-size: 0.95rem; }
    .sejarah-text p { margin-bottom: 15px; }
    .sejarah-image {
        flex: 1;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 51, 102, 0.15);
    }
    .sejarah-image img { width: 100%; height: 260px; object-fit: cover; transition: 0.3s; }
    .sejarah-image:hover img { transform: scale(1.02); }

    /* ========== TIMELINE ========== */
    .timeline {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 20px;
        margin-top: 30px;
    }
    .timeline-item {
        flex: 1;
        background: white;
        border-radius: 16px;
        padding: 20px;
        text-align: center;
        border: 1px solid rgba(0, 51, 102, 0.1);
        transition: 0.3s;
        box-shadow: 0 5px 15px rgba(0, 51, 102, 0.05);
    }
    .timeline-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 51, 102, 0.15);
        border-color: #c6a43b;
    }
    .timeline-year {
        font-size: 1.3rem;
        font-weight: 700;
        color: #c6a43b;
        margin-bottom: 8px;
    }
    .timeline-title {
        font-weight: 600;
        margin-bottom: 8px;
        color: #003366;
    }
    .timeline-desc { font-size: 0.75rem; color: #2c5f8a; }

    /* ========== FAKTA ========== */
    .fakta-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
        margin-top: 30px;
    }
    .fakta-card {
        background: white;
        border-radius: 16px;
        padding: 25px;
        text-align: center;
        border: 1px solid rgba(0, 51, 102, 0.1);
        transition: 0.3s;
        box-shadow: 0 5px 15px rgba(0, 51, 102, 0.05);
    }
    .fakta-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 51, 102, 0.15);
        background: linear-gradient(135deg, #ffffff 0%, #f0f7ff 100%);
    }
    .fakta-number {
        font-size: 2rem;
        font-weight: 700;
        color: #c6a43b;
        margin-bottom: 8px;
    }
    .fakta-title {
        font-weight: 600;
        margin-bottom: 8px;
        color: #003366;
    }
    .fakta-desc { font-size: 0.8rem; color: #2c5f8a; }

    /* ========== CAROUSEL SLIDER ========== */
    .slider-wrapper {
        position: relative;
        overflow: hidden;
        padding: 20px 40px;
    }
    .slider-container {
        display: flex;
        transition: transform 0.5s cubic-bezier(0.25, 1, 0.5, 1);
        gap: 20px;
    }
    .slider-card {
        flex: 0 0 calc((100% - 60px) / 4); /* 4 cards on desktop */
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0, 51, 102, 0.06);
        border: 1px solid rgba(0, 51, 102, 0.04);
        transition: all 0.3s ease;
        cursor: pointer;
        display: flex;
        flex-direction: column;
    }
    .slider-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 16px 35px rgba(0, 51, 102, 0.14);
        border-color: #c6a43b;
    }
    .slider-card-img-wrapper {
        width: 100%;
        height: 180px;
        overflow: hidden;
    }
    .slider-card-img {
        height: 100%;
        width: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1);
    }
    .slider-card:hover .slider-card-img {
        transform: scale(1.08);
    }
    .slider-card-body {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .slider-card-title {
        font-size: 1rem;
        font-weight: 700;
        color: #003366;
        margin-bottom: 8px;
        font-family: 'Poppins', sans-serif;
    }
    .slider-card-desc {
        font-size: 0.78rem;
        color: #4a6b82;
        line-height: 1.6;
        margin-bottom: 15px;
    }
    .slider-card-price {
        font-size: 0.9rem;
        font-weight: 700;
        color: #c6a43b;
    }
    .slider-card-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 1px solid rgba(0, 51, 102, 0.05);
        padding-top: 12px;
        margin-top: auto;
    }

    /* Nav Buttons */
    .slider-nav-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: white;
        border: 1px solid rgba(0, 51, 102, 0.1);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #003366;
        cursor: pointer;
        z-index: 10;
        transition: all 0.3s ease;
    }
    .slider-nav-btn:hover {
        background: #003366;
        color: white;
        box-shadow: 0 6px 16px rgba(0, 51, 102, 0.2);
    }
    .slider-nav-btn.prev-btn { left: 0px; }
    .slider-nav-btn.next-btn { right: 0px; }
    .slider-nav-btn:disabled {
        opacity: 0.3;
        cursor: not-allowed;
    }

    /* Responsiveness for Slider Cards */
    @media (max-width: 992px) {
        .slider-card {
            flex: 0 0 calc((100% - 40px) / 3); /* 3 cards on tablet */
        }
    }
    @media (max-width: 768px) {
        .slider-card {
            flex: 0 0 calc((100% - 20px) / 2); /* 2 cards on mobile */
        }
    }
    @media (max-width: 576px) {
        .slider-card {
            flex: 0 0 100%; /* 1 card on small devices */
        }
        .slider-wrapper {
            padding: 20px 10px;
        }
        .slider-nav-btn.prev-btn { left: -10px; }
        .slider-nav-btn.next-btn { right: -10px; }
    }

    /* ========== PREMIUM POPUP MODAL ========== */
    .premium-modal {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 20, 40, 0.6);
        backdrop-filter: blur(8px);
        z-index: 10000;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.35s ease;
    }
    .premium-modal.show {
        opacity: 1;
        pointer-events: auto;
    }
    .premium-modal-dialog {
        background: white;
        width: 90%;
        max-width: 600px;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 20px 50px rgba(0, 20, 40, 0.35);
        transform: scale(0.9);
        transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
    }
    .premium-modal.show .premium-modal-dialog {
        transform: scale(1);
    }
    .premium-modal-img {
        height: 240px;
        width: 100%;
        object-fit: cover;
    }
    .premium-modal-body {
        padding: 30px;
        position: relative;
    }
    .premium-modal-close {
        position: absolute;
        top: 20px;
        right: 20px;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.9);
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #003366;
        font-size: 1.1rem;
        cursor: pointer;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        transition: 0.3s;
        z-index: 10;
    }
    .premium-modal-close:hover {
        background: #ef4444;
        color: white;
        transform: scale(1.1);
    }
    .premium-modal-title {
        font-family: 'Poppins', sans-serif;
        font-size: 1.5rem;
        font-weight: 700;
        color: #003366;
        margin-top: 10px;
        margin-bottom: 8px;
    }
    .premium-modal-badge {
        display: inline-block;
        padding: 4px 12px;
        background: #e0f2fe;
        color: #0369a1;
        border-radius: 40px;
        font-size: 0.72rem;
        font-weight: 600;
        margin-bottom: 15px;
    }
    .premium-modal-desc {
        font-size: 0.85rem;
        color: #4a6b82;
        line-height: 1.7;
        margin-bottom: 20px;
        max-height: 120px;
        overflow-y: auto;
    }
    .premium-modal-info {
        margin-bottom: 25px;
        font-size: 0.82rem;
        color: #003366;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }
    .premium-modal-info span {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .premium-modal-info i {
        color: #c6a43b;
        width: 16px;
    }
    .premium-modal-footer {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        border-top: 1px solid rgba(0,0,0,0.05);
        padding-top: 20px;
    }
    .modal-wa-btn {
        background: #25d366;
        color: white !important;
        font-weight: 600;
        padding: 10px 24px;
        border-radius: 40px;
        display: flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        font-size: 0.82rem;
        transition: 0.3s;
        border: none;
    }
    .modal-wa-btn:hover {
        background: #20ba5a;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(37, 211, 102, 0.3);
    }

    /* ========== CTA BIRU ========== */
    .cta-section {
        background: linear-gradient(135deg, #003366 0%, #0a4a7a 50%, #005c8a 100%);
        padding: 60px 0;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .cta-section::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%);
        animation: rotate 20s linear infinite;
    }
    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    .cta-content {
        max-width: 600px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }
    .cta-content h3 {
        font-size: 2rem;
        font-family: 'Cormorant Garamond', serif;
        font-weight: 500;
        margin-bottom: 20px;
        color: white;
    }
    .cta-content .divider {
        width: 50px;
        height: 2px;
        background: #c6a43b;
        margin: 0 auto 25px;
    }
    .cta-content p {
        color: rgba(255, 255, 255, 0.8);
        margin-bottom: 35px;
        font-size: 0.9rem;
        line-height: 1.7;
    }
    .cta-btn {
        display: inline-block;
        background: #c6a43b;
        color: #003366;
        padding: 12px 35px;
        font-size: 0.7rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        transition: all 0.4s ease;
        text-decoration: none;
        border-radius: 40px;
        font-weight: 600;
    }
    .cta-btn:hover {
        background: white;
        transform: translateY(-3px);
        letter-spacing: 0.25em;
        color: #003366;
    }

    @media (max-width: 768px) {
        .sejarah-hero h1 { font-size: 2.2rem; }
        .section { padding: 40px 0; }
        .sejarah-item, .sejarah-item.reverse { flex-direction: column; text-align: center; }
        .sejarah-image img { height: 220px; }
        .timeline { flex-direction: column; }
        .fakta-grid { grid-template-columns: 1fr; }
        .cta-content h3 { font-size: 1.6rem; }
        .cta-btn { padding: 10px 28px; font-size: 0.65rem; }
    }
    @media (max-width: 576px) {
        .sejarah-hero h1 { font-size: 1.8rem; }
    }
</style>

<!-- HERO -->
<section class="sejarah-hero"
    @if($pageHeader && $pageHeader->gambar)
        style="background-image: linear-gradient(rgba(0,36,65,0.60), rgba(0,36,65,0.50)), url('{{ asset($pageHeader->gambar) }}'); background-size:cover; background-position:center;"
    @endif
    >
    <div data-aos="fade-up">
        <h1>{{ $pageHeader->title ?? 'Sejarah Caldera Toba' }}</h1>
        <p>{{ $pageHeader->subtitle ?? 'Warisan Geologi Kelas Dunia' }}</p>
    </div>
</section>

<!-- SEJARAH BERSILANG -->
<section class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Terbentuknya Danau Toba & Sibaganding</h2>
            <div class="divider"></div>
        </div>
        <div class="sejarah-grid">
            @forelse($informasi as $index => $item)
            <div class="sejarah-item {{ $index % 2 == 1 ? 'reverse' : '' }}" data-aos="fade-{{ $index % 2 == 1 ? 'left' : 'right' }}">
                <div class="sejarah-image">
                    @if($item->gambar)
                        <img src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}">
                    @else
                        <img src="/image/sejarah-hero.jpg" alt="{{ $item->judul }}">
                    @endif
                </div>
                <div class="sejarah-text">
                    <h3 style="font-family: 'Cormorant Garamond', serif; color: #003366; font-size: 1.6rem; margin-bottom: 12px; font-weight: 700;">{{ $item->judul }}</h3>
                    <div style="font-size: 0.95rem; line-height: 1.8;">
                        {!! $item->konten !!}
                    </div>
                </div>
            </div>
            @empty
            <div class="sejarah-item" data-aos="fade-right">
                <div class="sejarah-image"><img src="/image/sejarah1.jpg" alt="Letusan Supervolcano"></div>
                <div class="sejarah-text">
                    <h3 style="font-family: 'Cormorant Garamond', serif; color: #003366; font-size: 1.6rem; margin-bottom: 12px; font-weight: 700;">Terbentuknya Danau Toba</h3>
                    <p>Danau Toba terbentuk akibat letusan gunung berapi super (supervolcano) yang terjadi sekitar 74.000 tahun lalu. Letusan ini merupakan salah satu letusan terbesar dalam sejarah bumi yang meninggalkan kaldera raksasa yang kini dikenal sebagai Danau Toba. Material vulkanik dari letusan ini tersebar hingga ke berbagai belahan dunia, termasuk India dan Afrika.</p>
                </div>
            </div>
            <div class="sejarah-item reverse" data-aos="fade-left">
                <div class="sejarah-image"><img src="/image/sejarah2.jpg" alt="Kaldera Toba"></div>
                <div class="sejarah-text">
                    <h3 style="font-family: 'Cormorant Garamond', serif; color: #003366; font-size: 1.6rem; margin-bottom: 12px; font-weight: 700;">Kaldera Toba & Geosite Sibaganding</h3>
                    <p>Letusan supervolcano Toba menghasilkan kaldera dengan panjang 100 km dan lebar 30 km. Setelah letusan, kaldera perlahan terisi air dan membentuk Danau Toba yang kita kenal sekarang. Proses pengangkatan kembali dasar kaldera kemudian menciptakan Pulau Samosir di tengah danau, dan di pinggiran kaldera terbentuk tebing geologi indah seperti Geosite Sibaganding yang kaya akan fauna kera mulia.</p>
                </div>
            </div>
            <div class="sejarah-item" data-aos="fade-right">
                <div class="sejarah-image"><img src="/image/sejarah3.jpg" alt="Geopark Toba"></div>
                <div class="sejarah-text">
                    <h3 style="font-family: 'Cormorant Garamond', serif; color: #003366; font-size: 1.6rem; margin-bottom: 12px; font-weight: 700;">UNESCO Global Geopark</h3>
                    <p>Kawasan Danau Toba kini diakui UNESCO sebagai Global Geopark pada tahun 2020. Pengakuan ini diberikan karena nilai geologi yang luar biasa, keanekaragaman hayati, serta warisan budaya Batak yang masih terjaga hingga saat ini di seluruh Geosite, termasuk Sibaganding.</p>
                </div>
            </div>
            @endforelse
        </div>
        
        @if($informasi->count() > 0)
        <div class="d-flex justify-content-center mt-5">
            {{ $informasi->links() }}
        </div>
        @endif
    </div>
</section>

<!-- TIMELINE 4 LETUSAN -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>4 Periode Letusan</h2>
            <div class="divider"></div>
            <p>Proses pembentukan Kaldera Toba melalui 4 letusan besar</p>
        </div>
        <div class="timeline">
            <div class="timeline-item" data-aos="fade-up">
                <div class="timeline-year">1,2 Juta Tahun</div>
                <div class="timeline-title">Letusan Pertama</div>
                <div class="timeline-desc">Menghasilkan batuan Haranggaol Dacite Tuff (HDT) di Kaldera Haranggaol</div>
            </div>
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="50">
                <div class="timeline-year">840.000 Tahun</div>
                <div class="timeline-title">Letusan Kedua</div>
                <div class="timeline-desc">Menghasilkan batuan Tuff Toba Tertua (OTT) di Kaldera Porsea</div>
            </div>
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="100">
                <div class="timeline-year">450.000 Tahun</div>
                <div class="timeline-title">Letusan Ketiga</div>
                <div class="timeline-desc">Menghasilkan batuan Tuff Toba Tengah (MTT) di Kaldera Haranggaol</div>
            </div>
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="150">
                <div class="timeline-year">74.000 Tahun</div>
                <div class="timeline-title">Letusan Keempat</div>
                <div class="timeline-desc">Letusan supervolcano yang membentuk Kaldera Toba (YTT)</div>
            </div>
        </div>
    </div>
</section>

<!-- FAKTA UNIK -->
<section class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Fakta Unik Danau Toba</h2>
            <div class="divider"></div>
        </div>
        <div class="fakta-grid">
            <div class="fakta-card" data-aos="fade-up">
                <div class="fakta-number">#1</div>
                <div class="fakta-title">Danau Vulkanik Terbesar</div>
                <div class="fakta-desc">Danau Toba adalah danau vulkanik terbesar di dunia</div>
            </div>
            <div class="fakta-card" data-aos="fade-up" data-aos-delay="50">
                <div class="fakta-number">#2</div>
                <div class="fakta-title">Pulau di Tengah Danau</div>
                <div class="fakta-desc">Pulau Samosir adalah pulau di tengah danau terbesar di dunia</div>
            </div>
            <div class="fakta-card" data-aos="fade-up" data-aos-delay="100">
                <div class="fakta-number">#3</div>
                <div class="fakta-title">UNESCO Global Geopark</div>
                <div class="fakta-desc">Diakui UNESCO sejak tahun 2020</div>
            </div>
        </div>
    </div>
</section>

<!-- ========== SECTION UMKM ========== -->
<section class="section bg-light">
    <div class="container" style="position: relative;">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 px-2" data-aos="fade-up">
            <div class="section-title text-start mb-0" style="text-align: left !important; margin-bottom: 0px;">
                <h2 style="margin-bottom: 5px;">Produk UMKM Sibaganding</h2>
                <div class="divider" style="margin: 0;"></div>
                <p style="margin-top: 10px; font-size: 0.9rem; color: #2c5f8a;">Mendukung usaha kerajinan dan kuliner lokal warga Sibaganding</p>
            </div>
            <a href="{{ route('umkm.index') }}" class="cta-btn" style="padding: 10px 25px; margin: 0; background: #003366; color: white;">
                Lihat Selengkapnya <i class="fas fa-arrow-right ms-1"></i>
            </a>
        </div>
        
        <div class="slider-wrapper" data-aos="fade-up">
            <button class="slider-nav-btn prev-btn" id="umkmPrev" type="button"><i class="fas fa-chevron-left"></i></button>
            <button class="slider-nav-btn next-btn" id="umkmNext" type="button"><i class="fas fa-chevron-right"></i></button>
            
            <div class="slider-container" id="umkmSlider">
                @forelse($umkms as $item)
                @php
                    $descSnippet = str_replace(["\r", "\n"], ' ', $item->deskripsi);
                    $addrSnippet = str_replace(["\r", "\n"], ' ', $item->alamat);
                @endphp
                <div class="slider-card" onclick="openDetailsModal('{{ addslashes($item->nama) }}', '{{ asset($item->gambar) }}', '{{ addslashes($descSnippet) }}', '{{ addslashes($addrSnippet) }}', '{{ $item->kontak }}', null, 'umkm')">
                    <div class="slider-card-img-wrapper">
                        <img src="{{ asset($item->gambar) }}" class="slider-card-img" alt="{{ $item->nama }}">
                    </div>
                    <div class="slider-card-body">
                        <div>
                            <h4 class="slider-card-title">{{ $item->nama }}</h4>
                            <p class="slider-card-desc">{{ Str::limit($item->deskripsi, 80) }}</p>
                        </div>
                        <div class="slider-card-meta">
                            <span class="text-muted" style="font-size: 0.72rem;"><i class="fas fa-map-marker-alt text-warning me-1"></i> {{ Str::limit($item->alamat, 18) ?? '-' }}</span>
                            <span class="text-success font-weight-bold" style="font-size: 0.75rem;"><i class="fab fa-whatsapp me-1"></i> Hubungi</span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-4 w-100 text-muted">Belum ada data UMKM aktif. Silakan tambahkan melalui admin panel.</div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<!-- ========== SECTION HOTEL / PENGINAPAN ========== -->
<section class="section">
    <div class="container" style="position: relative;">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 px-2" data-aos="fade-up">
            <div class="section-title text-start mb-0" style="text-align: left !important; margin-bottom: 0px;">
                <h2 style="margin-bottom: 5px;">Hotel & Penginapan Sibaganding</h2>
                <div class="divider" style="margin: 0;"></div>
                <p style="margin-top: 10px; font-size: 0.9rem; color: #2c5f8a;">Rekomendasi tempat menginap dengan pemandangan kaldera indah</p>
            </div>
            <a href="{{ route('penginapan.index') }}" class="cta-btn" style="padding: 10px 25px; margin: 0; background: #c6a43b; color: #003366;">
                Lihat Selengkapnya <i class="fas fa-arrow-right ms-1"></i>
            </a>
        </div>
        
        <div class="slider-wrapper" data-aos="fade-up">
            <button class="slider-nav-btn prev-btn" id="hotelPrev" type="button"><i class="fas fa-chevron-left"></i></button>
            <button class="slider-nav-btn next-btn" id="hotelNext" type="button"><i class="fas fa-chevron-right"></i></button>
            
            <div class="slider-container" id="hotelSlider">
                @forelse($penginapans as $item)
                @php
                    $descSnippet = str_replace(["\r", "\n"], ' ', $item->deskripsi);
                    $addrSnippet = str_replace(["\r", "\n"], ' ', $item->alamat);
                @endphp
                <div class="slider-card" onclick="openDetailsModal('{{ addslashes($item->nama) }}', '{{ asset($item->gambar) }}', '{{ addslashes($descSnippet) }}', '{{ addslashes($addrSnippet) }}', '{{ $item->kontak }}', '{{ $item->harga ? number_format($item->harga) : null }}', 'hotel')">
                    <div class="slider-card-img-wrapper">
                        <img src="{{ asset($item->gambar) }}" class="slider-card-img" alt="{{ $item->nama }}">
                    </div>
                    <div class="slider-card-body">
                        <div>
                            <h4 class="slider-card-title">{{ $item->nama }}</h4>
                            <p class="slider-card-desc">{{ Str::limit($item->deskripsi, 80) }}</p>
                        </div>
                        <div class="slider-card-meta">
                            <span class="slider-card-price">
                                @if($item->harga)
                                    Rp {{ number_format($item->harga) }}<small style="font-size: 0.65rem; color: #557c9c; font-weight: normal;">/malam</small>
                                @else
                                    Hubungi Kontak
                                @endif
                            </span>
                            <span class="text-success font-weight-bold" style="font-size: 0.75rem;"><i class="fab fa-whatsapp me-1"></i> Hubungi</span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-4 w-100 text-muted">Belum ada data Hotel & Penginapan aktif. Silakan tambahkan melalui admin panel.</div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<!-- ========== DETAILS MODAL CONTAINER ========== -->
<div class="premium-modal" id="detailsModal" onclick="handleOutsideClick(event)">
    <div class="premium-modal-dialog">
        <div style="position: relative;">
            <button class="premium-modal-close" type="button" onclick="closeDetailsModal()"><i class="fas fa-times"></i></button>
            <img id="modalImage" class="premium-modal-img" src="" alt="Detail Gambar">
        </div>
        <div class="premium-modal-body">
            <h4 class="premium-modal-title" id="modalTitle">Detail Nama</h4>
            <div class="premium-modal-badge" id="modalBadge">Mitra Resmi Geosite Sibaganding</div>
            
            <p class="premium-modal-desc" id="modalDesc">Deskripsi detail...</p>
            
            <div class="premium-modal-info">
                <span><i class="fas fa-map-marker-alt"></i> <strong id="modalAddress">Alamat...</strong></span>
                <span id="modalPriceWrapper"><i class="fas fa-money-bill-wave"></i> Estimasi Harga: <strong class="text-success" style="font-size: 0.95rem;">Rp <span id="modalPrice"></span> / malam</strong></span>
            </div>
            
            <div class="premium-modal-footer">
                <a href="" id="modalWaBtn" target="_blank" class="modal-wa-btn">
                    <i class="fab fa-whatsapp" style="font-size: 1.1rem;"></i> Hubungi/Pesan via WhatsApp
                </a>
                <button type="button" class="btn btn-secondary px-4 py-2" style="border-radius: 40px; font-size: 0.82rem;" onclick="closeDetailsModal()">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- CTA SECTION -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content" data-aos="fade-up">
            <h3>Jelajahi Geosite Lainnya</h3>
            <div class="divider"></div>
            <p>Temukan keajaiban geologi lainnya di Geopark Danau Toba</p>
            <a href="{{ url('/') }}" class="cta-btn">Kembali ke Beranda</a>
        </div>
    </div>
</section>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 700, once: true, offset: 50 });

    // CAROUSEL SLIDING LOGIC
    function initSlider(containerId, prevBtnId, nextBtnId) {
        const container = document.getElementById(containerId);
        const prevBtn = document.getElementById(prevBtnId);
        const nextBtn = document.getElementById(nextBtnId);
        if (!container || !prevBtn || !nextBtn) return;
        
        let currentIdx = 0;
        
        function updateSlider() {
            const cards = container.children;
            if (cards.length === 0) {
                prevBtn.style.display = 'none';
                nextBtn.style.display = 'none';
                return;
            }
            const cardWidth = cards[0].getBoundingClientRect().width;
            const gap = 20; // grid-gap
            
            // Calculate max slide index
            const visibleCount = getVisibleCount();
            const maxIdx = Math.max(0, cards.length - visibleCount);
            
            if (currentIdx > maxIdx) currentIdx = maxIdx;
            if (currentIdx < 0) currentIdx = 0;
            
            container.style.transform = `translateX(-${currentIdx * (cardWidth + gap)}px)`;
            
            prevBtn.disabled = currentIdx === 0;
            nextBtn.disabled = currentIdx === maxIdx;

            // Hide arrows if visible count matches or exceeds total items
            if (maxIdx === 0) {
                prevBtn.style.display = 'none';
                nextBtn.style.display = 'none';
            } else {
                prevBtn.style.display = 'flex';
                nextBtn.style.display = 'flex';
            }
        }
        
        function getVisibleCount() {
            const width = window.innerWidth;
            if (width > 992) return 4;
            if (width > 768) return 3;
            if (width > 576) return 2;
            return 1;
        }
        
        prevBtn.addEventListener('click', () => {
            currentIdx--;
            updateSlider();
        });
        
        nextBtn.addEventListener('click', () => {
            currentIdx++;
            updateSlider();
        });
        
        window.addEventListener('resize', updateSlider);
        
        // Initial call after elements render
        setTimeout(updateSlider, 250);
    }

    // Initialize both sliders
    document.addEventListener('DOMContentLoaded', () => {
        initSlider('umkmSlider', 'umkmPrev', 'umkmNext');
        initSlider('hotelSlider', 'hotelPrev', 'hotelNext');
    });

    // DETAILS MODAL LOGIC
    function openDetailsModal(title, image, desc, address, phone, price = null, type = 'umkm') {
        const modal = document.getElementById('detailsModal');
        if (!modal) return;
        
        document.getElementById('modalTitle').textContent = title;
        document.getElementById('modalImage').src = image;
        document.getElementById('modalDesc').textContent = desc;
        document.getElementById('modalAddress').textContent = address || 'Sibaganding';
        
        const priceEl = document.getElementById('modalPriceWrapper');
        if (priceEl) {
            if (price && type === 'hotel') {
                priceEl.style.display = 'block';
                document.getElementById('modalPrice').textContent = price;
            } else {
                priceEl.style.display = 'none';
            }
        }

        const badgeEl = document.getElementById('modalBadge');
        if (badgeEl) {
            badgeEl.textContent = type === 'hotel' ? 'Akomodasi Resmi Sibaganding' : 'UMKM Resmi Binaan Sibaganding';
            badgeEl.style.background = type === 'hotel' ? '#fef3c7' : '#e0f2fe';
            badgeEl.style.color = type === 'hotel' ? '#b45309' : '#0369a1';
        }
        
        const waBtn = document.getElementById('modalWaBtn');
        if (waBtn) {
            if (phone) {
                let cleanPhone = phone.replace(/[^0-9]/g, '');
                if (cleanPhone.startsWith('0')) {
                    cleanPhone = '62' + cleanPhone.substring(1);
                }
                waBtn.href = `https://wa.me/${cleanPhone}?text=Halo%20saya%20tertarik%20dengan%20${encodeURIComponent(title)}%20di%20Geosite%20Sibaganding`;
                waBtn.style.display = 'inline-flex';
            } else {
                waBtn.style.display = 'none';
            }
        }
        
        modal.classList.add('show');
    }

    function closeDetailsModal() {
        const modal = document.getElementById('detailsModal');
        if (modal) {
            modal.classList.remove('show');
        }
    }

    function handleOutsideClick(event) {
        const dialog = document.querySelector('.premium-modal-dialog');
        if (dialog && !dialog.contains(event.target)) {
            closeDetailsModal();
        }
    }

    // Hero Slider
    document.addEventListener('DOMContentLoaded', function () {
        let heroCurrent = 0;
        const heroSlides = document.querySelectorAll('.slide');

        function showHeroSlide(index) {
            if (!heroSlides.length) return;
            heroSlides.forEach(function (slide) { slide.classList.remove('active'); });

            if (index < 0) {
                heroCurrent = heroSlides.length - 1;
            } else if (index >= heroSlides.length) {
                heroCurrent = 0;
            } else {
                heroCurrent = index;
            }
            heroSlides[heroCurrent].classList.add('active');
        }

        function nextHeroSlide() { showHeroSlide(heroCurrent + 1); }

        if (heroSlides.length) {
            showHeroSlide(0);
            setInterval(nextHeroSlide, 5000);
        }
    });
</script>

@endsection
