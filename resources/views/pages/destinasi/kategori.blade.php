@extends('layouts.app')

@section('title', 'Destinasi ' . $kategori . ' - Geosite Danau Toba')

@section('content')

<style>
    /* ==================== HERO SECTION ==================== */
    .kategori-hero {
    height: 50vh;
    min-height: 350px;
    position: relative;
    overflow: hidden;
    margin-top: 0;
    background: linear-gradient(135deg, #0a1628 0%, #0d2347 40%, #1a3a6b 70%, #0f2d55 100%);
    display: flex;
    align-items: center;
    justify-content: center;
}

.kategori-hero::before {
    content: '';
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 2px;
    background: linear-gradient(90deg, transparent, #c6a43b, transparent);
    z-index: 5;
}

    .kategori-hero .hero-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.4) 50%, rgba(0,0,0,0.6) 100%);
    }

    .hero-content {
        position: relative;
        z-index: 10;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        color: white;
        padding: 0 20px;
    }

    .back-btn {
        position: absolute;
        top: 30px;
        left: 30px;
        z-index: 20;
        background: rgba(255,255,255,0.2);
        backdrop-filter: blur(10px);
        padding: 12px 24px;
        border-radius: 50px;
        color: white;
        text-decoration: none;
        font-size: 0.8rem;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .back-btn:hover {
        background: #c6a43b;
        color: #1a1a1a;
        transform: translateX(-5px);
    }

    .hero-badge {
        display: inline-block;
        padding: 6px 20px;
        background: rgba(198, 164, 59, 0.2);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(198, 164, 59, 0.5);
        border-radius: 50px;
        font-size: 0.7rem;
        letter-spacing: 3px;
        margin-bottom: 20px;
    }

    .hero-content h1 {
    font-family: 'Cinzel', serif;
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 15px;
    letter-spacing: 6px;
    line-height: 1.1;
    text-shadow: 2px 4px 20px rgba(0,0,0,0.5);
    text-transform: uppercase;
    text-align: center;
}

.hero-content h1 span {
    color: #c6a43b;
    font-family: 'Cinzel', serif;
    font-weight: 700;
    letter-spacing: 6px;
}

.hero-divider {
    width: 200px;
    height: 3px;
    background: #c6a43b;
    margin: 0 auto 24px;
}

    .hero-content p {
    font-family: 'Raleway', sans-serif;
    font-size: 0.85rem;
    width: 100%;
    max-width: 800px;
    margin: 0 auto;
    opacity: 0.85;
    text-transform: uppercase;
    letter-spacing: 6px;
    line-height: 2;
    font-weight: 300;
    white-space: normal;
    text-align: center;
}

    /* ==================== DESTINASI GRID ==================== */
    .destinasi-section {
        padding: 150px 0;
        background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%);
    }

    .destinasi-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }

    .dest-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0,0,0,0.08);
        transition: all 0.5s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        cursor: pointer;
    }

    .dest-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 30px 60px rgba(0,0,0,0.15);
    }

    .card-image {
        position: relative;
        height: 260px;
        overflow: hidden;
    }

    .card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .dest-card:hover .card-image img {
        transform: scale(1.08);
    }

    .card-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        background: #c6a43b;
        color: #1a1a1a;
        padding: 6px 15px;
        border-radius: 30px;
        font-size: 0.7rem;
        font-weight: 600;
        letter-spacing: 1px;
        z-index: 2;
    }

    .card-content {
        padding: 25px;
    }

    .card-title {
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 8px;
        color: #1a1a1a;
    }

    .card-location {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 12px;
        background: #f5f4f0;
        border-radius: 30px;
        font-size: 0.7rem;
        color: #c6a43b;
        margin-bottom: 15px;
    }

    .card-location i {
        font-size: 0.6rem;
    }

    .card-desc {
        font-size: 0.85rem;
        color: #666;
        line-height: 1.7;
        margin-bottom: 20px;
    }

    .card-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: transparent;
        border: 2px solid #c6a43b;
        color: #c6a43b;
        padding: 10px 28px;
        border-radius: 50px;
        font-size: 0.7rem;
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .card-btn:hover {
        background: #c6a43b;
        color: #1a1a1a;
        gap: 15px;
    }

    /* Empty State */
    .empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: 80px 20px;
        background: white;
        border-radius: 24px;
    }

    .empty-state i {
        font-size: 4rem;
        color: #ddd;
        margin-bottom: 20px;
    }

    .empty-state h3 {
        font-size: 1.5rem;
        color: #666;
        margin-bottom: 10px;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .destinasi-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        .hero-content h1 {
            font-size: 2.5rem;
        }
    }

    @media (max-width: 768px) {
        .kategori-hero {
            height: 50vh;
            min-height: 400px;
        }
        .destinasi-grid {
            grid-template-columns: 1fr;
        }
        .hero-content h1 {
            font-size: 1.8rem;
        }
        .back-btn {
            top: 80px;
            left: 20px;
            padding: 8px 16px;
            font-size: 0.7rem;
        }
    }
</style>

<!-- ==================== HERO SECTION ==================== -->
<section class="kategori-hero"
    @if($pageHeader && $pageHeader->gambar)
        style="background-image: linear-gradient(rgba(0,36,65,0.60), rgba(0,36,65,0.50)), url('{{ asset($pageHeader->gambar) }}'); background-size:cover; background-position:center; background-attachment: fixed;"
    @elseif($heroImage)
        style="background-image: linear-gradient(rgba(0,36,65,0.60), rgba(0,36,65,0.50)), url('{{ asset('storage/' . $heroImage) }}'); background-size:cover; background-position:center; background-attachment: fixed;"
    @else
        style="background-image: linear-gradient(rgba(0,36,65,0.60), rgba(0,36,65,0.50)), url('{{ asset('images/sibaganding1.jpg') }}'); background-size:cover; background-position:center; background-attachment: fixed;"
    @endif>
    <a href="{{ url('/destinasi') }}" class="back-btn">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <div class="hero-divider"></div>
        <h1>
            @if($pageHeader && $pageHeader->title)
                {!! $pageHeader->title !!}
            @else
                Destinasi <span>{{ $kategori }}</span>
            @endif
        </h1>
        <p>
            @if($pageHeader && $pageHeader->subtitle)
                {{ $pageHeader->subtitle }}
            @else
                {{ $deskripsi }}
            @endif
        </p>
        <div class="hero-divider" style="margin-top: 24px;"></div>
    </div>
</section>

<!-- ==================== DESTINASI GRID ==================== -->
<section class="destinasi-section">
    <div class="container">
        <div class="destinasi-grid">
            @forelse($destinasi as $item)
            <div class="dest-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="card-image">
                    <img src="{{ asset('storage/' . $item->gambar_utama) }}" alt="{{ $item->nama }}">
                    <span class="card-badge">{{ $kategori }}</span>
                </div>
                <div class="card-content">
                    <h3 class="card-title">{{ $item->nama }}</h3>
                    <div class="card-location">
                        <i class="fas fa-map-marker-alt"></i> {{ $item->lokasi }}
                    </div>
                    <a href="{{ route('destinasi.show', $item->id) }}" class="card-btn">
                        Jelajahi <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-mountain"></i>
                <h3>Belum Ada Destinasi</h3>
                <p>Destinasi pada kategori ini akan segera ditambahkan.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Font Awesome & AOS -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">                  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true, 
        offset: 50
    });
</script>

@endsection
