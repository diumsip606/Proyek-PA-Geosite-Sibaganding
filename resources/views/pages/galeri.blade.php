@extends('layouts.app')

@section('title', 'Galeri - Geosite Danau Toba')

@section('content')

<style>
   * {
    margin: 0;
    padding: 0;
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

/* HERO dengan background galeri.jpg - TIDAK TERPOTONG */
.galeri-hero {
    height: auto;
    min-height: 400px;
    background: url('{{ asset("image/galeri.jpg") }}');
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
    background-color: #0d1b2a;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
    margin-top: 76px;
    padding: 80px 20px;
    position: relative;
}

/* Overlay tipis agar teks terbaca */
.galeri-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 1;
}

.galeri-hero > div {
    position: relative;
    z-index: 2;
}

.galeri-hero h1 {
    font-size: 3rem;
    font-family: 'Cormorant Garamond', serif;
    margin-bottom: 10px;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
}

.galeri-hero p {
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

.galeri-tabs {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-bottom: 35px;
    flex-wrap: wrap;
}

.tab-btn {
    background: transparent;
    border: none;
    padding: 8px 28px;
    font-size: 0.8rem;
    font-weight: 500;
    color: #555;
    cursor: pointer;
    border-radius: 40px;
    transition: 0.3s;
}

.tab-btn:hover,
.tab-btn.active {
    background: #c6a43b;
    color: white;
}

.galeri-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
}

.galeri-item {
    aspect-ratio: 1/1;
    overflow: hidden;
    border-radius: 14px;
    cursor: pointer;
    background: #e8e8e8;
}

.galeri-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: 0.3s;
}

.galeri-item:hover img {
    transform: scale(1.03);
}

.lightbox {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.95);
    z-index: 10000;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}

.lightbox.active {
    display: flex;
}

.lightbox img {
    max-width: 90%;
    max-height: 85vh;
    border-radius: 6px;
}

.lightbox-close {
    position: absolute;
    top: 20px;
    right: 30px;
    color: white;
    font-size: 35px;
    cursor: pointer;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .flag-img {
        width: 60px;
    }
    .del-img {
        width: 35px;
    }
    .geotoba-text {
        font-size: 1.2rem;
    }
    .galeri-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .galeri-hero h1 {
        font-size: 2rem;
    }
    .section {
        padding: 40px 0;
    }
    .galeri-hero {
        min-height: 300px;
        padding: 60px 20px;
    }
}

@media (max-width: 576px) {
    .flag-img {
        width: 45px;
    }
    .del-img {
        width: 28px;
    }
    .geotoba-text {
        font-size: 0.9rem;
    }
    .galeri-grid {
        grid-template-columns: 1fr;
        gap: 12px;
    }
    .galeri-hero h1 {
        font-size: 1.6rem;
    }
    .galeri-hero p {
        font-size: 0.7rem;
    }
    .galeri-hero {
        min-height: 250px;
        padding: 40px 20px;
    }
    .tab-btn {
        padding: 6px 20px;
        font-size: 0.7rem;
    }
}
</style>

<!-- LOGO -->
<div class="logo-container">
    <div>
        <img src="[GANTI_LINK_BENDERA]" alt="Bendera" class="flag-img">
    </div>
    <div class="logo-divider"></div>
    <div>
        <img src="[GANTI_LINK_DEL]" alt="D el" class="del-img">
    </div>
    <div class="logo-divider"></div>
    <div>
        <div class="geotoba-text">GEOSITE</div>
        <div class="geotoba-sub">SIBAGANDING</div>
    </div>
</div>

<!-- HERO dengan background galeri.jpg -->
<section class="galeri-hero">
    <div>
        <h1 data-aos="fade-up">Galeri Geosite</h1>
        <p data-aos="fade-up">Dokumentasi Keindahan Geosite Sibaganding</p>
    </div>
</section>

<!-- TABS -->
<div class="container">
    <div class="galeri-tabs" data-aos="fade-up">
        <button class="tab-btn active" data-tab="meat">Biodiversity</button>
        <button class="tab-btn" data-tab="batu-bahisan">Geodiversity</button>
        <button class="tab-btn" data-tab="liang-sipege">Culture diveristy</button>
    </div>
</div>

<!-- GALLERY GRID -->
<div class="container">
    <div class="galeri-grid" id="galeriGrid"></div>
    <div class="gallery-counter" id="galleryCounter" style="text-align:center; margin-top:20px; color:#888"></div>
</div>

<!-- LIGHTBOX -->
<div class="lightbox" id="lightbox">
    <span class="lightbox-close">&times;</span>
    <img id="lightboxImg">
</div>

<script>
    const galeriData = {
        meat: [
            { src: '/image/meat/galeri/1.jpg', caption: 'Pantai Meat - Foto 1' },
            { src: '/image/meat/galeri/2.jpg', caption: 'Pantai Meat - Foto 2' },
            { src: '/image/meat/galeri/3.jpg', caption: 'Pantai Meat - Foto 3' },
            { src: '/image/meat/galeri/4.jpg', caption: 'Pantai Meat - Foto 4' },
            { src: '/image/meat/galeri/5.jpg', caption: 'Pantai Meat - Foto 5' },
            { src: '/image/meat/galeri/6.jpg', caption: 'Pantai Meat - Foto 6' },
            { src: '/image/meat/galeri/7.jpg', caption: 'Pantai Meat - Foto 7' },
            { src: '/image/meat/galeri/8.jpg', caption: 'Pantai Meat - Foto 8' },
        ],
        'batu-bahisan': [
            { src: '/image/batu-bahisan/galeri/1.jpg', caption: 'Batu Bahisan - Foto 1' },
            { src: '/image/batu-bahisan/galeri/2.jpg', caption: 'Batu Bahisan - Foto 2' },
            { src: '/image/batu-bahisan/galeri/3.jpg', caption: 'Batu Bahisan - Foto 3' }
        ],
        'liang-sipege': [
            { src: '/image/liang-sipege/galeri/1.jpg', caption: 'Liang Sipege - Foto 1' },
            { src: '/image/liang-sipege/galeri/2.jpg', caption: 'Liang Sipege - Foto 2' },
            { src: '/image/liang-sipege/galeri/3.jpg', caption: 'Liang Sipege - Foto 3' }
        ]
    };

    let currentTab = 'meat';

    function renderGallery(tab) {
        const grid = document.getElementById('galeriGrid');
        let photos = galeriData[tab] || [];

        if (photos.length === 0) {
            grid.innerHTML = '<div style="grid-column:1/-1; text-align:center; padding:60px"><p>Belum ada foto</p></div>';
            return;
        }

        grid.innerHTML = photos.map(function(photo) {
            return '<div class="galeri-item" data-src="' + photo.src + '" data-caption="' + photo.caption + '">' +
                '<img src="' + photo.src + '" alt="' + photo.caption + '" loading="lazy">' +
                '</div>';
        }).join('');

        document.getElementById('galleryCounter').innerHTML = '<span>Menampilkan ' + photos.length + ' foto</span>';

        document.querySelectorAll('.galeri-item').forEach(function(item) {
            item.addEventListener('click', function() {
                openLightbox(item.dataset.src, item.dataset.caption);
            });
        });
    }

    function openLightbox(src, caption) {
        var lb = document.getElementById('lightbox');
        document.getElementById('lightboxImg').src = src;
        lb.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        document.getElementById('lightbox').classList.remove('active');
        document.body.style.overflow = '';
    }

    document.querySelectorAll('.tab-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.tab-btn').forEach(function(b) {
                b.classList.remove('active');
            });
            btn.classList.add('active');
            renderGallery(btn.dataset.tab);
        });
    });

    document.getElementById('lightbox').addEventListener('click', function(e) {
        if (e.target === this || e.target.classList.contains('lightbox-close')) {
            closeLightbox();
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeLightbox();
        }
    });

    renderGallery('meat');
</script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 700,
        once: true
    });
</script>

@endsection