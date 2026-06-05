@extends('layouts.app')

@section('title', 'Berita - Geosite Danau Toba')

@section('content')

<style>
   * {
    box-sizing: border-box;
}

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
    border: 1px solid rgba(255, 255, 255, 0.8);
}

.flag-img {
    width: 100px;
    height: auto;
    border-radius: 6px;
}

.logo-divider {
    width: 2px;
    height: 35px;
    background: #e0e0e0;
}

.del-img {
    width: 50px;
    height: auto;
    border-radius: 8px;
}

.geotoba-text {
    font-size: 1.5rem;
    font-weight: 800;
    letter-spacing: 1px;
    background: linear-gradient(135deg, #1a3c5e, #2c5f8a);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.geotoba-sub {
    font-size: 0.7rem;
    font-weight: 500;
    color: #5a6e7c;
}

/* HERO dengan background berita.jpg - TIDAK TERPOTONG */
.berita-hero {
    height: 55vh;
    min-height: 450px;
    position: relative;
    overflow: hidden;
    text-align: center;
    color: white;
    margin-top: 76px;
}

.slides-container {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.slide {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    opacity: 0;
    transform: scale(1.08);
    transition: opacity 1.5s ease-in-out, transform 6s ease-out;
}

.slide.active {
    opacity: 1;
    transform: scale(1);
}

/* Overlay tipis agar teks terbaca */
.berita-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.55);
    z-index: 2;
}

.berita-hero::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100px;
    background: linear-gradient(to top, #ffffff, transparent);
    z-index: 3;
}

.berita-hero > div {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 4;
    width: 90%;
    max-width: 800px;
}

.berita-hero h1 {
    font-size: 3rem;
    font-family: 'Cormorant Garamond', serif;
    margin-bottom: 10px;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
}

.berita-hero p {
    font-size: 0.9rem;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    text-shadow: 0 1px 5px rgba(0, 0, 0, 0.5);
}

.section {
    padding: 60px 0;
}

.container {
    max-width: 1100px;
    margin: 0 auto;
    padding: 0 20px;
}

/* BERITA GRID */
.berita-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

.berita-card {
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s, box-shadow 0.3s;
    cursor: pointer;
}

.berita-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.berita-image {
    width: 100%;
    height: 200px;
    overflow: hidden;
}

.berita-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: 0.3s;
}

.berita-card:hover .berita-image img {
    transform: scale(1.05);
}

.berita-content {
    padding: 20px;
}

.berita-date {
    font-size: 0.7rem;
    color: #c6a43b;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    margin-bottom: 8px;
    display: block;
}

.berita-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: #1a3c5e;
    margin-bottom: 10px;
    line-height: 1.4;
}

.berita-excerpt {
    font-size: 0.85rem;
    color: #666;
    line-height: 1.6;
    margin-bottom: 15px;
}

.berita-readmore {
    font-size: 0.7rem;
    color: #c6a43b;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    font-weight: 600;
    transition: 0.3s;
    display: inline-block;
}

.berita-readmore:hover {
    color: #1a3c5e;
    transform: translateX(5px);
}

/* EMPTY STATE */
.empty-state {
    grid-column: 1 / -1;
    text-align: center;
    padding: 80px 20px;
    background: white;
    border-radius: 16px;
}

.empty-state-icon {
    font-size: 4rem;
    margin-bottom: 20px;
}

.empty-state h3 {
    font-size: 1.5rem;
    color: #1a3c5e;
    margin-bottom: 10px;
}

.empty-state p {
    color: #888;
    margin-bottom: 20px;
}

/* PAGINATION */
.pagination {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 40px;
    flex-wrap: wrap;
}

.pagination button {
    background: transparent;
    border: 1px solid #ddd;
    padding: 8px 16px;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
    color: #555;
}

.pagination button:hover {
    background: #c6a43b;
    border-color: #c6a43b;
    color: white;
}

.pagination button.active {
    background: #1a3c5e;
    border-color: #1a3c5e;
    color: white;
}

.pagination button:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

/* RESPONSIVE */
@media (max-width: 992px) {
    .berita-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
}

@media (max-width: 768px) {
    .berita-hero {
        height: auto;
        min-height: 220px;
        padding-top: 0;
    }
    .berita-hero h1 {
        font-size: 2rem;
    }
    .berita-hero p {
        font-size: 0.78rem;
        letter-spacing: 0.12em;
    }
    .section {
        padding: 40px 0;
    }
    .container {
        padding: 0 16px;
    }
    .berita-grid {
        grid-template-columns: 1fr;
        gap: 18px;
    }
    .modal-content {
        width: 95%;
        max-height: 90vh;
    }
    .modal-title {
        font-size: 1.3rem;
    }
    .modal-body {
        padding: 18px;
    }
    .modal-image {
        height: 180px;
    }
}

@media (max-width: 576px) {
    .berita-hero h1 {
        font-size: 1.6rem;
        letter-spacing: 2px;
    }
    .berita-hero p {
        font-size: 0.7rem;
        display: none;
    }
    .berita-title {
        font-size: 1rem;
    }
    .modal-title {
        font-size: 1.1rem;
    }
    .berita-content {
        padding: 15px;
    }
    .pagination {
        gap: 6px;
    }
    .pagination button {
        padding: 6px 10px;
        font-size: 0.8rem;
    }
}
</style>

<!-- HERO dengan background berita.jpg -->
<section class="berita-hero"
    @if($pageHeader && $pageHeader->gambar)
        style="background-image: linear-gradient(rgba(0,36,65,0.60), rgba(0,36,65,0.50)), url('{{ asset($pageHeader->gambar) }}'); background-size:cover; background-position:center;"
    @else
        style="background-image: linear-gradient(rgba(0,36,65,0.55), rgba(0,36,65,0.55)), url('{{ asset('images/sibaganding1.jpg') }}'); background-size:cover; background-position:center;"
    @endif
    >
    <div>
        <h1 data-aos="fade-up">{{ $pageHeader->title ?? 'Berita & Event' }}</h1>
        <p data-aos="fade-up">{{ $pageHeader->subtitle ?? 'Informasi terkini seputar Geopark Danau Toba' }}</p>
    </div>
</section>

<!-- BERITA GRID -->
<section class="section">
    <div class="container">
        <div class="berita-grid" id="beritaGrid">
            @if($berita->count() > 0)
                @foreach($berita as $item)
                <a href="{{ route('berita.detail', $item->slug) }}" class="berita-card" data-aos="fade-up" style="text-decoration: none; color: inherit;">
                    @if($item->gambar)
                    <div class="berita-image">
                        <img src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}" onerror="this.parentElement.style.display='none';">
                    </div>
                    @endif
                    <div class="berita-content">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                            <div style="display: flex; gap: 12px; align-items: center;">
                                <span class="berita-date">{{ $item->tanggal_terbit ? $item->tanggal_terbit->format('d M Y') : '' }}</span>
                                <span style="font-size: 0.75rem; color: #888; display: flex; align-items: center; gap: 4px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    {{ $item->views }}
                                </span>
                            </div>
                            @if($item->link)
                                <object><a href="{{ $item->link }}" target="_blank" rel="noopener noreferrer" class="btn-sumber-card" style="margin: 0; padding: 2px 8px; font-size: 0.65rem; border-radius: 12px; background: #c6a43b; color: white; text-decoration: none; display: inline-flex; align-items: center; gap: 3px;" title="Menuju Link Berita Asli">
                                    <span>🌐 Sumber</span> ↗
                                </a></object>
                            @endif
                        </div>
                        <h3 class="berita-title">{{ $item->judul }}</h3>
                        <p class="berita-excerpt">{{ Str::limit(strip_tags($item->konten), 100) }}</p>
                        <span class="berita-readmore">Baca Selengkapnya →</span>
                    </div>
                </a>
                @endforeach
            @else
                <div class="empty-state">
                    <div class="empty-state-icon">📰</div>
                    <h3>Belum Ada Berita</h3>
                    <p>Saat ini belum ada berita yang tersedia.</p>
                    <p style="font-size: 0.8rem;">Silakan cek kembali nanti untuk informasi terbaru.</p>
                </div>
            @endif
        </div>
    </div>
</section>

<script>
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

    AOS.init({
        duration: 700,
        once: true
    });
</script>

@endsection
