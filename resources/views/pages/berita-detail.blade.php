@extends('layouts.app')

@section('title', $berita->judul . ' - Geosite Danau Toba')

@section('content')

<style>
/* HERO SECTION */
.berita-detail-hero {
    height: auto;
    min-height: 400px;
    background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ $berita->gambar ? asset($berita->gambar) : asset("images/sibaganding1.JPG") }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
    margin-top: 76px;
    padding: 100px 20px;
    position: relative;
}

.berita-detail-hero h1 {
    font-size: 3rem;
    font-family: 'Cormorant Garamond', serif;
    font-weight: 700;
    margin-top: 15px;
    margin-bottom: 15px;
    max-width: 900px;
    line-height: 1.3;
    text-shadow: 0 2px 12px rgba(0, 0, 0, 0.6);
}

.berita-meta-top {
    font-size: 0.85rem;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: #c6a43b;
    font-weight: 600;
}

/* CONTENT AREA */
.content-section {
    padding: 60px 0;
}

.content-container {
    max-width: 800px;
    margin: 0 auto;
}

.berita-meta-bar {
    display: flex;
    align-items: center;
    gap: 20px;
    padding-bottom: 20px;
    margin-bottom: 30px;
    border-bottom: 1px solid #e0e0e0;
    font-size: 0.9rem;
    color: #666;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 6px;
}

.meta-item i {
    color: #c6a43b;
}

.berita-body {
    font-size: 1.1rem;
    line-height: 1.9;
    color: #333;
    font-family: 'Inter', sans-serif;
}

.berita-body p {
    margin-bottom: 25px;
    text-align: justify;
}

.berita-body img {
    max-width: 100%;
    height: auto;
    border-radius: 12px;
    margin: 20px 0;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
}

.action-bar {
    margin-top: 50px;
    padding-top: 30px;
    border-top: 1px solid #e0e0e0;
}

.btn-kembali {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #1a3c5e;
    color: white;
    padding: 12px 30px;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 4px 15px rgba(26, 60, 94, 0.2);
}

.btn-kembali:hover {
    background: #c6a43b;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(198, 164, 59, 0.3);
}

.btn-link-sumber {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #c6a43b;
    color: white;
    padding: 12px 30px;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 4px 15px rgba(198, 164, 59, 0.2);
}

.btn-link-sumber:hover {
    background: #1a3c5e;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(26, 60, 94, 0.3);
}

.external-link-container {
    background: #f8fafc;
    border-left: 4px solid #c6a43b;
    border-radius: 8px;
    padding: 20px;
    margin: 35px 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
}

.external-link-text {
    font-size: 0.95rem;
    color: #4a5568;
    margin: 0;
    font-weight: 500;
}

@media (max-width: 576px) {
    .external-link-container {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
    }
}

.btn-sumber-card {
    background: #f0f7ff;
    color: #1a3c5e;
    border: 1px solid #d0e5ff;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 0.65rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    gap: 3px;
    line-height: 1;
    text-decoration: none;
}

.btn-sumber-card:hover {
    background: #c6a43b;
    color: white;
    border-color: #c6a43b;
}

/* OTHER NEWS */
.other-news-section {
    background: #f8fafc;
    padding: 70px 0;
    border-top: 1px solid #eaebed;
}

.other-news-title {
    font-size: 2rem;
    font-family: 'Cormorant Garamond', serif;
    font-weight: 700;
    color: #1a3c5e;
    text-align: center;
    margin-bottom: 10px;
}

.other-news-subtitle {
    color: #666;
    text-align: center;
    font-size: 0.95rem;
    margin-bottom: 40px;
}

.other-news-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

.news-card {
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s, box-shadow 0.3s;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.news-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.news-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.3s;
}

.news-card:hover img {
    transform: scale(1.03);
}

.news-card-content {
    padding: 24px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.news-card-tag {
    font-size: 0.75rem;
    color: #c6a43b;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    font-weight: 600;
    margin-bottom: 10px;
}

.news-card-title {
    font-size: 1.15rem;
    font-weight: 700;
    color: #1a3c5e;
    margin-bottom: 12px;
    line-height: 1.4;
}

.news-card-excerpt {
    font-size: 0.85rem;
    color: #666;
    line-height: 1.6;
    margin-bottom: 20px;
    flex-grow: 1;
}

.news-card-link {
    font-size: 0.8rem;
    color: #c6a43b;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    font-weight: 600;
    transition: 0.3s;
    display: inline-flex;
    align-items: center;
    gap: 4px;
}

.news-card-link:hover {
    color: #1a3c5e;
    transform: translateX(4px);
}

/* RESPONSIVE */
@media (max-width: 992px) {
    .other-news-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .berita-detail-hero {
        min-height: 300px;
        padding: 70px 20px;
    }
    .berita-detail-hero h1 {
        font-size: 2.2rem;
    }
    .other-news-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<!-- HERO BANNER -->
<section class="berita-detail-hero" data-aos="fade-in">
    <div>
        <span class="berita-meta-top" data-aos="fade-up">Berita • Sibaganding</span>
        <h1 data-aos="fade-up" data-aos-delay="100">{{ $berita->judul }}</h1>
    </div>
</section>

<!-- MAIN CONTENT -->
<section class="content-section">
    <div class="container">
        <div class="content-container" data-aos="fade-up">
            <!-- META BAR -->
            <div class="berita-meta-bar">
                <div class="meta-item">
                    <span>📅</span>
                    <span>{{ $berita->tanggal_terbit ? \Carbon\Carbon::parse($berita->tanggal_terbit)->format('d M Y') : 'Date Unknown' }}</span>
                </div>
                <div class="meta-item">
                    <span>👤</span>
                    <span>{{ $berita->penulis ?? 'Admin' }}</span>
                </div>
            </div>

            <!-- NEWS BODY -->
            <div class="berita-body">
                {!! $berita->konten !!}
            </div>

            @if($berita->link)
            <!-- EXTERNAL LINK SOURCE -->
            <div class="external-link-container">
                <p class="external-link-text">
                    <strong>Informasi Tambahan:</strong> Berita ini memiliki tautan eksternal resmi untuk informasi lebih lanjut.
                </p>
                <a href="{{ $berita->link }}" target="_blank" rel="noopener noreferrer" class="btn-link-sumber">
                    🌐 Kunjungi Link Sumber ↗
                </a>
            </div>
            @endif

            <!-- ACTION BAR -->
            <div class="action-bar">
                <a href="{{ url('/berita') }}" class="btn-kembali">
                    <span>←</span> Kembali ke Berita
                </a>
            </div>
        </div>
    </div>
</section>

<!-- OTHER NEWS SECTION -->
@if($otherBerita->count() > 0)
<section class="other-news-section">
    <div class="container">
        <h2 class="other-news-title" data-aos="fade-up">Berita & Event Lainnya</h2>
        <p class="other-news-subtitle" data-aos="fade-up" data-aos-delay="100">Telusuri informasi menarik lainnya dari Geosite Sibaganding</p>

        <div class="other-news-grid">
            @foreach($otherBerita as $item)
            <div class="news-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <img src="{{ $item->gambar ? asset($item->gambar) : asset('images/sibaganding1.JPG') }}" alt="{{ $item->judul }}">
                <div class="news-card-content">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                        <span class="news-card-tag" style="margin-bottom: 0;">Berita</span>
                        @if($item->link)
                            <a href="{{ $item->link }}" target="_blank" rel="noopener noreferrer" class="btn-sumber-card" title="Buka Link Sumber">
                                <span>🌐 Sumber</span> ↗
                            </a>
                        @endif
                    </div>
                    <h3 class="news-card-title">{{ $item->judul }}</h3>
                    <p class="news-card-excerpt">{{ \Illuminate\Support\Str::limit(strip_tags($item->konten), 100) }}</p>
                    <a href="{{ route('berita.detail', $item->slug) }}" class="news-card-link">Baca Selengkapnya →</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true,
        offset: 50
    });
</script>

@endsection
