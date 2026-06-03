@extends('layouts.app')

@section('title', 'Kontak - Geosite Danau Toba')

@section('content')

<style>
    /* ==================== LOGO SECTION ==================== */
    .logo-container {
        position: fixed;
        top: 20px;
        left: 20px;
        z-index: 9999;
        display: flex;
        align-items: center;
        gap: 20px;
        background: rgba(255, 255, 255, 0.98);
        padding: 8px 24px;
        border-radius: 60px;
        backdrop-filter: blur(8px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        border: 1px solid rgba(255, 255, 255, 0.8);
    }

    .logo-container:hover {
        background: white;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        transform: translateY(-2px);
    }

    .flag-logo-wrapper {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .flag-img {
        width: 100px;
        height: auto;
        border-radius: 6px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.15);
        transition: transform 0.2s ease;
        border: 1px solid rgba(255,255,255,0.3);
    }

    .flag-img:hover {
        transform: scale(1.05);
    }

    .logo-divider {
        width: 2px;
        height: 35px;
        background: #e0e0e0;
        border-radius: 2px;
    }

    .del-logo-wrapper {
        display: flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .del-logo-wrapper:hover {
        transform: scale(1.02);
    }

    .del-img {
        width: 50px;
        height: auto;
        border-radius: 8px;
        transition: transform 0.2s ease;
    }

    .del-img:hover {
        transform: scale(1.05);
    }

    .geotoba-wrapper {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .geotoba-text {
        font-size: 1.5rem;
        font-weight: 800;
        letter-spacing: 1px;
        background: linear-gradient(135deg, #1a3c5e, #2c5f8a);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-family: 'Inter', 'Poppins', sans-serif;
        line-height: 1.2;
    }

    .geotoba-sub {
        font-size: 0.7rem;
        font-weight: 500;
        color: #5a6e7c;
        letter-spacing: 0.5px;
    }

    @media (max-width: 768px) {
        .logo-container {
            top: 12px;
            left: 12px;
            padding: 6px 18px;
            gap: 14px;
        }
        .flag-img {
            width: 60px;
        }
        .del-img {
            width: 35px;
        }
        .geotoba-text {
            font-size: 1.2rem;
        }
        .geotoba-sub {
            font-size: 0.6rem;
        }
        .logo-divider {
            height: 28px;
        }
    }

    @media (max-width: 576px) {
        .logo-container {
            padding: 5px 14px;
            gap: 10px;
        }
        .flag-img {
            width: 45px;
        }
        .del-img {
            width: 28px;
        }
        .geotoba-text {
            font-size: 0.9rem;
        }
        .geotoba-sub {
            font-size: 0.5rem;
        }
        .logo-divider {
            height: 24px;
        }
    }

    /* ==================== HERO ==================== */
    .kontak-hero {
        height: 45vh;
        background: linear-gradient(135deg, rgba(0,0,0,0.65), rgba(0,0,0,0.4)),
                    url('/image/kontak-hero.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        margin-top: 76px;
        position: relative;
    }

    .kontak-hero::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 80px;
        background: linear-gradient(to top, #fafaf8, transparent);
    }

    .kontak-hero h1 {
        font-size: 3.5rem;
        font-weight: 400;
        font-family: 'Cormorant Garamond', serif;
        letter-spacing: 0.02em;
        margin-bottom: 15px;
    }

    .kontak-hero p {
        font-size: 1rem;
        opacity: 0.85;
        letter-spacing: 0.2em;
        text-transform: uppercase;
    }

    /* ==================== KONTAK SECTION ==================== */
    .kontak-section {
        padding: 60px 0;
    }

    .kontak-card {
        background: white;
        border-radius: 20px;
        padding: 30px 20px;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 5px 20px rgba(0,0,0,0.04);
        border: 1px solid #f0f0f0;
        height: 100%;
    }

    .kontak-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    }

    .kontak-icon {
        width: 65px;
        height: 65px;
        background: rgba(198, 164, 59, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 18px;
    }

    .kontak-icon i {
        font-size: 28px;
        color: #c6a43b;
    }

    .kontak-card h4 {
        font-size: 1.15rem;
        font-weight: 600;
        margin-bottom: 12px;
        color: #1a1a1a;
    }

    .kontak-card p {
        color: #666;
        margin-bottom: 5px;
        font-size: 0.85rem;
        line-height: 1.5;
    }

    /* ==================== FORM ==================== */
    .form-card {
        background: white;
        border-radius: 24px;
        padding: 35px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.04);
        border: 1px solid #f0f0f0;
        height: 100%;
    }

    .form-card h3 {
        font-size: 1.5rem;
        font-family: 'Cormorant Garamond', serif;
        font-weight: 500;
        margin-bottom: 20px;
        color: #1a1a1a;
    }

    .form-control, .form-select {
        border: 1px solid #e0e0e0;
        border-radius: 12px;
        padding: 12px 16px;
        font-size: 0.85rem;
        transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: #c6a43b;
        box-shadow: 0 0 0 3px rgba(198, 164, 59, 0.08);
        outline: none;
    }

    .btn-send {
        background: #1a1a1a;
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 600;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        width: 100%;
        font-size: 0.75rem;
        text-transform: uppercase;
    }

    .btn-send:hover {
        background: #c6a43b;
        color: #1a1a1a;
        transform: translateY(-2px);
    }

    /* ==================== MAPS ==================== */
    .map-card {
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.04);
        border: 1px solid #f0f0f0;
        background: white;
        height: 100%;
    }

    .map-card iframe {
        width: 100%;
        height: 280px;
        border: 0;
    }

    .map-info {
        padding: 20px;
        text-align: center;
    }

    .map-info h4 {
        font-size: 1.15rem;
        font-weight: 600;
        margin-bottom: 15px;
        color: #1a1a1a;
    }

    .social-icons {
        display: flex;
        justify-content: center;
        gap: 12px;
        margin-bottom: 20px;
    }

    .social-icons a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background: #f5f4f0;
        border-radius: 50%;
        color: #1a1a1a;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .social-icons a:hover {
        background: #c6a43b;
        color: white;
        transform: translateY(-3px);
    }

    .jam-operasional p {
        margin-bottom: 5px;
        font-size: 0.85rem;
        color: #666;
    }

    .jam-operasional h5 {
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 8px;
        color: #1a1a1a;
    }

    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 768px) {
        .kontak-hero h1 {
            font-size: 2.2rem;
        }
        .kontak-hero p {
            font-size: 0.8rem;
        }
        .kontak-section {
            padding: 40px 0;
        }
        .form-card {
            margin-bottom: 25px;
        }
    }

    @media (max-width: 576px) {
        .kontak-hero h1 {
            font-size: 1.8rem;
        }
        .kontak-card {
            padding: 20px 15px;
        }
        .form-card {
            padding: 25px;
        }
    }

    /* ==================== PENGURUS/TEAM SECTION ==================== */
    .team-section {
        padding: 80px 0;
        background: linear-gradient(180deg, #ffffff 0%, #f4f8fc 100%);
        overflow: hidden;
    }

    .team-title {
        margin-bottom: 50px;
        text-align: center;
    }

    .team-kicker {
        display: inline-block;
        color: #c6a43b;
        font-size: 0.72rem;
        font-weight: 800;
        letter-spacing: 0.22em;
        text-transform: uppercase;
        margin-bottom: 12px;
    }

    .team-title h2 {
        font-family: 'Cormorant Garamond', serif;
        font-size: 2.8rem;
        color: #003366;
        margin: 0;
    }

    .team-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 34px;
        max-width: 820px;
        margin: 0 auto;
    }

    @media (max-width: 768px) {
        .team-grid {
            grid-template-columns: 1fr;
            max-width: 420px;
        }
    }

    .team-card {
        position: relative;
        border-radius: 34px;
        overflow: hidden;
        background: #ffffff;
        box-shadow: 0 28px 70px rgba(0, 51, 102, 0.14);
        border: 8px solid rgba(255,255,255,0.68);
        transition: all 0.35s ease;
        cursor: pointer;
        text-align: left;
    }

    .team-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 35px 90px rgba(0, 51, 102, 0.22);
    }

    .team-image {
        height: 390px;
        position: relative;
        overflow: hidden;
    }

    .team-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.6s cubic-bezier(0.2, 0.9, 0.4, 1.1);
    }

    .team-card:hover .team-image img {
        transform: scale(1.04);
    }

    .team-info {
        padding: 30px;
        background: linear-gradient(180deg, rgba(255,255,255,0.95) 0%, #ffffff 100%);
    }

    .team-info span {
        color: #c6a43b;
        font-size: 0.72rem;
        font-weight: 800;
        letter-spacing: 0.16em;
        text-transform: uppercase;
        display: block;
        margin-bottom: 10px;
    }

    .team-info h3 {
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.85rem;
        color: #003366;
        margin: 0 0 12px;
    }

    .team-info p {
        color: #556c80;
        line-height: 1.7;
        font-size: 0.85rem;
        margin: 0;
    }

    .team-card-click-hint {
        position: absolute;
        bottom: 24px;
        right: 24px;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: #c6a43b;
        color: #003366;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.88rem;
        box-shadow: 0 8px 20px rgba(198,164,59,0.3);
        z-index: 5;
        opacity: 0;
        transform: translateY(8px);
        transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
    }

    .team-card:hover .team-card-click-hint {
        opacity: 1;
        transform: translateY(0);
    }

    .team-modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 35, 70, 0.82);
        backdrop-filter: blur(12px);
        z-index: 99999;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 24px;
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .team-modal-overlay.open {
        display: flex;
        opacity: 1;
    }

    .team-modal-box {
        background: #ffffff;
        width: 100%;
        max-width: 780px;
        border-radius: 36px;
        overflow: hidden;
        box-shadow: 0 35px 95px rgba(0, 51, 102, 0.35);
        border: 1px solid rgba(255,255,255,0.2);
        display: flex;
        position: relative;
        max-height: 90vh;
        animation: modalPop 0.45s cubic-bezier(0.2, 0.9, 0.4, 1.05) forwards;
    }

    @keyframes modalPop {
        from { opacity: 0; transform: scale(0.9) translateY(15px); }
        to { opacity: 1; transform: scale(1) translateY(0); }
    }

    .team-modal-close {
        position: absolute;
        top: 24px;
        right: 24px;
        background: rgba(0,0,0,0.05);
        border: none;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        color: #003366;
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.25s;
        z-index: 10;
    }

    .team-modal-close:hover {
        background: #c6a43b;
        color: #ffffff;
        transform: rotate(90deg);
    }

    .team-modal-img {
        width: 42%;
        flex-shrink: 0;
        position: relative;
    }

    .team-modal-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .team-modal-body {
        flex: 1;
        padding: 48px;
        overflow-y: auto;
        text-align: left;
    }

    .team-modal-role {
        display: inline-block;
        color: #c6a43b;
        font-size: 0.72rem;
        font-weight: 800;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        margin-bottom: 12px;
    }

    .team-modal-body h2 {
        font-family: 'Cormorant Garamond', serif;
        font-size: 2.3rem;
        color: #003366;
        line-height: 1.1;
        margin: 0 0 18px;
    }

    .team-modal-divider {
        width: 60px;
        height: 2px;
        background: #c6a43b;
        margin-bottom: 24px;
    }

    .team-modal-bio-row {
        display: flex;
        align-items: flex-start;
        gap: 16px;
        margin-bottom: 16px;
    }

    .bio-icon {
        font-size: 1.25rem;
        color: #c6a43b;
        width: 24px;
        text-align: center;
    }

    .bio-text {
        display: flex;
        flex-direction: column;
    }

    .bio-label {
        font-size: 0.68rem;
        font-weight: 800;
        color: #9ab4cc;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        margin-bottom: 2px;
    }

    .bio-value {
        font-size: 0.88rem;
        color: #334e68;
        font-weight: 600;
    }

    .team-modal-desc {
        margin-top: 28px;
        color: #556c80;
        line-height: 1.8;
        font-size: 0.9rem;
        border-top: 1px dashed rgba(0, 51, 102, 0.1);
        padding-top: 22px;
        margin-bottom: 0;
    }

    @media (max-width: 768px) {
        .team-modal-box {
            flex-direction: column;
            max-height: 85vh;
        }
        .team-modal-img {
            width: 100%;
            height: 240px;
        }
        .team-modal-body {
            padding: 30px;
        }
    }
</style>

<!-- HERO -->
<section class="kontak-hero">
    <div class="container">
        <h1 data-aos="fade-up">Hubungi Kami</h1>
        <p data-aos="fade-up" data-aos-delay="100">Senang mendengar dari Anda</p>
    </div>
</section>

<!-- KONTAK SECTION -->
<section class="kontak-section">
    <div class="container">
        <div class="row g-4 mb-5">
            <!-- ALAMAT -->
            <div class="col-md-4" data-aos="fade-up">
                <div class="kontak-card">
                    <div class="kontak-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h4>Alamat</h4>
                    <p>Geosite Danau Toba</p>
                    <p>Pulau Sibandang, Danau Toba</p>
                    <p>Sumatera Utara, Indonesia</p>
                </div>
            </div>

            <!-- TELEPON -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="kontak-card">
                    <div class="kontak-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h4>Telepon</h4>
                    <p>+62 812 3456 7890</p>
                    <p>+62 813 9876 5432</p>
                    <p>(0622) 12345</p>
                </div>
            </div>

            <!-- EMAIL -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="kontak-card">
                    <div class="kontak-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h4>Email</h4>
                    <p>info@geotoba.com</p>
                    <p>reservasi@geotoba.com</p>
                    <p>support@geotoba.com</p>
                </div>
            </div>
        </div>

        <!-- PENGURUS/TEAM SECTION -->
        <div class="team-section mb-5" data-aos="fade-up">
            <div class="team-title">
                <span class="team-kicker">Tim Pengelola</span>
                <h2>Pengurus Sibaganding</h2>
                <div class="divider" style="width: 50px; height: 2px; background: #c6a43b; margin: 10px auto 0;"></div>
            </div>

            <div class="team-grid">
                @forelse($pengurus as $i => $item)
                    @php
                        $rawImg = $item->gambar ? ltrim($item->gambar, '/') : null;
                        if ($rawImg) {
                            if (str_starts_with($rawImg, 'http://') || str_starts_with($rawImg, 'https://')) {
                                $imgUrl = $rawImg;
                            } elseif (str_starts_with($rawImg, 'storage/')) {
                                $imgUrl = asset($rawImg);
                            } else {
                                $imgUrl = asset('storage/' . $rawImg);
                            }
                        } else {
                            $imgUrl = asset('images/pengurus-' . (($i % 2) + 1) . '.jpg');
                        }
                    @endphp
                    <div class="team-card" 
                         onclick="openTeamModal({
                             img: '{{ $imgUrl }}',
                             role: '{{ $item->penulis ?? 'Tim Pengelola' }}',
                             name: '{{ $item->judul }}',
                             instansi: 'Geosite Sibaganding',
                             bidang: '{{ $item->penulis ?? 'Pengembang Kawasan' }}',
                             kontak: '{{ $item->slug }}',
                             desc: '{{ addslashes(str_replace(["\r", "\n"], " ", strip_tags($item->konten))) }}'
                         })">
                        <div class="team-image">
                            <img src="{{ $imgUrl }}" alt="{{ $item->judul }}" onerror="this.onerror=null; this.src='{{ asset('images/pengurus-' . (($i % 2) + 1) . '.jpg') }}';">
                        </div>
                        <div class="team-info">
                            <span>{{ $item->penulis ?? 'Tim Pengelola' }}</span>
                            <h3>{{ $item->judul }}</h3>
                            <p>{{ Str::limit(strip_tags($item->konten), 120) }}</p>
                        </div>
                        <div class="team-card-click-hint">👁</div>
                    </div>
                @empty
                    <!-- Fallback Static Pengurus 1 -->
                    <div class="team-card" 
                         onclick="openTeamModal({
                             img: '{{ asset('images/pengurus-1.jpg') }}',
                             role: 'Ketua Pengelola',
                             name: 'Pengelola Sibaganding',
                             instansi: 'Geosite Sibaganding — Geopark Danau Toba',
                             bidang: 'Manajemen & Pengembangan Kawasan',
                             kontak: 'sibaganding@geotoba.id',
                             desc: 'Bertanggung jawab mengoordinasikan seluruh pengelolaan kawasan Geosite Sibaganding, termasuk pengembangan program wisata, kerja sama kelembagaan, dan peningkatan fasilitas pengunjung. Memimpin tim dalam menjaga kelestarian alam, budaya, dan nilai geologi kawasan sebagai bagian dari Geopark Danau Toba UNESCO Global Geopark.'
                         })">
                        <div class="team-image">
                            <img src="{{ asset('images/pengurus-1.jpg') }}" alt="Pengurus Sibaganding 1">
                        </div>
                        <div class="team-info">
                            <span>Ketua Pengelola</span>
                            <h3>Pengelola Sibaganding</h3>
                            <p>Bertanggung jawab mengoordinasikan pengelolaan kawasan, pengembangan program, dan kerja sama terkait Geosite Sibaganding.</p>
                        </div>
                        <div class="team-card-click-hint">👁</div>
                    </div>

                    <!-- Fallback Static Pengurus 2 -->
                    <div class="team-card" 
                         onclick="openTeamModal({
                             img: '{{ asset('images/pengurus-2.jpg') }}',
                             role: 'Koordinator Lapangan',
                             name: 'Koordinator Wisata',
                             instansi: 'Geosite Sibaganding — Lapangan Operasional',
                             bidang: 'Operasional Wisata & Pelayanan Pengunjung',
                             kontak: 'wisata.sibaganding@geotoba.id',
                             desc: 'Bertugas mendampingi seluruh kegiatan lapangan di kawasan Geosite Sibaganding, membantu dan melayani pengunjung, serta memastikan semua aktivitas wisata berjalan aman, nyaman, dan optimal. Berkoordinasi langsung dengan tim pengelola dan pemandu wisata lokal.'
                         })">
                        <div class="team-image">
                            <img src="{{ asset('images/pengurus-2.jpg') }}" alt="Pengurus Sibaganding 2">
                        </div>
                        <div class="team-info">
                            <span>Koordinator Lapangan</span>
                            <h3>Koordinator Wisata</h3>
                            <p>Bertugas mendampingi kegiatan lapangan, membantu pengunjung, dan memastikan aktivitas wisata berjalan optimal.</p>
                        </div>
                        <div class="team-card-click-hint">👁</div>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="row g-4">
            <!-- FORM KONTAK -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="form-card">
                    <h3>Kirim Pesan</h3>
                    <form action="#" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <input type="tel" class="form-control" placeholder="Nomor Telepon">
                        </div>
                        <div class="mb-3">
                            <select class="form-select">
                                <option selected disabled>-- Pilih Subjek --</option>
                                <option>Informasi Wisata</option>
                                <option>Reservasi Tiket</option>
                                <option>Kerjasama</option>
                                <option>Saran & Masukan</option>
                                <option>Lainnya</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <textarea class="form-control" rows="5" placeholder="Pesan Anda..."></textarea>
                        </div>
                        <button type="submit" class="btn-send">
                            Kirim Pesan <i class="fas fa-paper-plane ms-2"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- MAPS & SOSIAL -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="map-card">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0!2d99.0835095!3d2.3339262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e0415b8f7da39%3A0xc6beb74287f355a5!2sBalige%2C%20Toba%20Samosir%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>
                    <div class="map-info">
                        <h4>Ikuti Kami</h4>
                        <div class="social-icons">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                            <a href="#"><i class="fab fa-tiktok"></i></a>
                        </div>
                        <div class="jam-operasional">
                            <h5>Jam Operasional</h5>
                            <p>Senin - Jumat: 08:00 - 17:00</p>
                            <p>Sabtu - Minggu: 08:00 - 18:00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<!-- AOS -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true
    });
</script>

<!-- Team Biodata Modal -->
<div class="team-modal-overlay" id="teamModalOverlay" onclick="if(event.target===this) closeTeamModal()">
    <div class="team-modal-box">
        <button class="team-modal-close" onclick="closeTeamModal()">&#10005;</button>
        <div class="team-modal-img">
            <img id="teamModalImg" src="" alt="">
        </div>
        <div class="team-modal-body">
            <span class="team-modal-role" id="teamModalRole"></span>
            <h2><span id="teamModalName"></span></h2>
            <div class="team-modal-divider"></div>
            <div class="team-modal-bio-row">
                <div class="bio-icon">🏛</div>
                <div class="bio-text">
                    <span class="bio-label">Instansi</span>
                    <span class="bio-value" id="teamModalInstansi"></span>
                </div>
            </div>
            <div class="team-modal-bio-row">
                <div class="bio-icon">📋</div>
                <div class="bio-text">
                    <span class="bio-label">Bidang Tugas</span>
                    <span class="bio-value" id="teamModalBidang"></span>
                </div>
            </div>
            <div class="team-modal-bio-row">
                <div class="bio-icon">✉</div>
                <div class="bio-text">
                    <span class="bio-label">Kontak</span>
                    <span class="bio-value" id="teamModalKontak"></span>
                </div>
            </div>
            <p class="team-modal-desc" id="teamModalDesc"></p>
        </div>
    </div>
</div>

<script>
function openTeamModal(data) {
    const overlay = document.getElementById('teamModalOverlay');
    if (!overlay) return;
    document.getElementById('teamModalImg').src = data.img || '';
    document.getElementById('teamModalRole').textContent = data.role || '';
    document.getElementById('teamModalName').textContent = data.name || '';
    document.getElementById('teamModalInstansi').textContent = data.instansi || '-';
    document.getElementById('teamModalBidang').textContent = data.bidang || '-';
    
    // Parse contact
    const kontakVal = data.kontak || '-';
    const kontakEl = document.getElementById('teamModalKontak');
    if (kontakEl) {
        if (kontakVal.includes('@')) {
            kontakEl.innerHTML = `<a href="mailto:${kontakVal}" style="color:#c6a43b; text-decoration:none; font-weight: 600;">${kontakVal}</a>`;
        } else if (kontakVal.match(/^\+?[0-9\s\-]{7,}$/)) {
            const cleanPhone = kontakVal.replace(/[^0-9+]/g, '');
            kontakEl.innerHTML = `<a href="tel:${cleanPhone}" style="color:#c6a43b; text-decoration:none; font-weight: 600;">${kontakVal}</a>`;
        } else {
            kontakEl.textContent = kontakVal;
        }
    }
    
    document.getElementById('teamModalDesc').textContent = data.desc || '';
    overlay.classList.add('open');
    document.body.style.overflow = 'hidden';
}

function closeTeamModal() {
    const overlay = document.getElementById('teamModalOverlay');
    if (overlay) overlay.classList.remove('open');
    document.body.style.overflow = '';
}

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeTeamModal();
    }
});
</script>

@endsection
