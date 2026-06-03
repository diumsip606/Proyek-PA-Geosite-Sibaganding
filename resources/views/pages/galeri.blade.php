@extends('layouts.app')

@section('title', 'Geosite Sibaganding - Gallery')

@php use Illuminate\Support\Str; @endphp

@section('content')

@php
    // Ambil semua foto aktif terlepas dari kategori
    $allActiveGaleri = $galeriByKategori->flatten();
    
    // Tentukan list foto kolase
    $collageItems = [];
    
    // 1. Tentukan item hero utama (Item 1)
    $mainHero = null;
    if (isset($hero) && $hero->gambar) {
        $mainHero = $hero;
    } else {
        $mainHero = $allActiveGaleri->first();
    }
    
    // Default fallback image list
    $fallbackImages = [
        'images/galleri-1.jpg',
        'images/galleri-3.jpg',
        'images/galleri-4.jpg',
        'images/galleri-9.jpg',
        'images/monkey forest.jpg'
    ];
    
    // Filter out the main hero from the list of other collage items
    $otherGaleri = $allActiveGaleri;
    if ($mainHero) {
        $otherGaleri = $allActiveGaleri->filter(function($item) use ($mainHero) {
            return $item->id !== $mainHero->id;
        });
    }
    
    // Ambil 4 item lainnya untuk melengkapi kolase 5 foto
    $otherItems = $otherGaleri->values();
    
    // Masukkan mainHero ke slot 1
    if ($mainHero) {
        $collageItems[0] = [
            'src' => asset('storage/' . $mainHero->gambar),
            'title' => $mainHero->judul,
        ];
    } else {
        $collageItems[0] = [
            'src' => asset($fallbackImages[0]),
            'title' => 'Geosite Sibaganding',
        ];
    }
    
    // Masukkan slot 2 - 5
    for ($i = 1; $i <= 4; $i++) {
        if (isset($otherItems[$i - 1])) {
            $gal = $otherItems[$i - 1];
            $collageItems[$i] = [
                'src' => asset('storage/' . $gal->gambar),
                'title' => $gal->judul,
            ];
        } else {
            // Gunakan fallback
            $collageItems[$i] = [
                'src' => asset($fallbackImages[$i] ?? 'images/caldera.jpg'),
                'title' => 'Geosite Sibaganding',
            ];
        }
    }
@endphp

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:#ffffff;
    overflow-x:hidden;
    font-family:'Poppins',sans-serif;
}

/* ================= HERO COLLAGE ================= */
.gallery-hero-collage {
    position: relative;
    width: 100%;
    height: 80vh;
    overflow: hidden;
    background: #0d1b2a;
}

.collage-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-template-rows: repeat(2, 1fr);
    gap: 8px;
    width: 100%;
    height: 100%;
    padding: 8px;
}

.collage-img-wrapper {
    position: relative;
    overflow: hidden;
    border-radius: 8px;
    height: 100%;
    width: 100%;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.collage-img-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 6s cubic-bezier(0.25, 0.8, 0.25, 1);
    filter: brightness(0.65) contrast(1.1);
}

.collage-img-wrapper:hover img {
    transform: scale(1.06);
    filter: brightness(0.85) contrast(1.05);
}

.collage-item-1 {
    grid-column: 1 / 3;
    grid-row: 1 / 3;
}

.collage-item-2 {
    grid-column: 3 / 4;
    grid-row: 1 / 2;
}

.collage-item-3 {
    grid-column: 4 / 5;
    grid-row: 1 / 2;
}

.collage-item-4 {
    grid-column: 3 / 4;
    grid-row: 2 / 3;
}

.collage-item-5 {
    grid-column: 4 / 5;
    grid-row: 2 / 3;
}

.hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to bottom,
        rgba(0, 0, 0, 0.2) 0%,
        rgba(0, 0, 0, 0.5) 50%,
        rgba(0, 0, 0, 0.8) 100%
    );
    z-index: 2;
    pointer-events: none;
}

.hero-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 3;
    text-align: center;
    color: white;
    width: 90%;
    pointer-events: none;
}

.hero-content h1{
    font-size:5rem;
    font-weight:800;
    margin-bottom:20px;
    text-shadow:0 10px 30px rgba(0,0,0,0.5);
    letter-spacing: -1px;
}

.hero-content p{
    font-size:1.3rem;
    color:#e2e8f0;
    max-width:700px;
    margin:auto;
    line-height:1.8;
}

.hero-scroll-indicator {
    position: absolute;
    bottom: 30px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 3;
    color: white;
    font-size: 1.5rem;
    animation: bounceDown 1.5s infinite;
    cursor: pointer;
}
@keyframes bounceDown {
    0%, 100% { transform: translateX(-50%) translateY(0); }
    50% { transform: translateX(-50%) translateY(8px); }
}

/* ================= GALLERY WRAPPER ================= */
.gallery-wrapper{
    padding: 70px 20px 100px;
    text-align:center;
    max-width:1400px;
    margin:auto;
}

.gallery-title{
    margin-bottom: 40px;
}

.gallery-title h2{
    font-size:3rem;
    font-family:serif;
    color:#111;
    letter-spacing: 3px;
    margin-bottom: 10px;
}

.gallery-title p{
    color:#666;
    font-size: 1rem;
}

/* ================= FILTER TABS ================= */
.filter-tabs {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    justify-content: center;
    margin-bottom: 48px;
}

.filter-tab {
    padding: 9px 24px;
    border-radius: 50px;
    border: 2px solid #c6a43b;
    background: transparent;
    color: #c6a43b;
    font-weight: 600;
    font-size: .88rem;
    cursor: pointer;
    transition: all .25s ease;
    letter-spacing: .5px;
}

.filter-tab:hover,
.filter-tab.active {
    background: linear-gradient(135deg, #c6a43b, #e8c96a);
    color: white;
    border-color: transparent;
    box-shadow: 0 4px 14px rgba(198,164,59,.3);
    transform: translateY(-1px);
}

/* ================= EMPTY STATE ================= */
.empty-gallery {
    text-align: center;
    padding: 60px 20px;
    color: #aaa;
}
.empty-gallery i { font-size: 3.5rem; margin-bottom: 16px; display: block; }

/* ================= GALLERY GRID (MASONRY) ================= */
.masonry-grid {
    column-count: 4;
    column-gap: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

.masonry-item {
    display: inline-block;
    width: 100%;
    margin-bottom: 20px;
    break-inside: avoid;
    background: #ffffff;
    border: 6px solid #ffffff;
    overflow: hidden;
    box-shadow: 0 8px 24px rgba(0,0,0,0.08);
    transition: all .3s cubic-bezier(0.25, 0.8, 0.25, 1);
    cursor: pointer;
    border-radius: 8px;
    position: relative;
}

.masonry-item img {
    width: 100%;
    height: auto;
    display: block;
    object-fit: cover;
    transition: transform .5s cubic-bezier(0.25, 0.8, 0.25, 1);
}

.masonry-item .overlay-info {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,.85) 0%, rgba(0,0,0,0.2) 60%, rgba(0,0,0,0) 100%);
    opacity: 0;
    transition: opacity .3s ease;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 18px;
    z-index: 2;
}

.masonry-item .overlay-info .oi-tag {
    font-size: .7rem;
    font-weight: 700;
    color: #e8c96a;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    margin-bottom: 4px;
}
.masonry-item .overlay-info .oi-title {
    font-size: .95rem;
    font-weight: 600;
    color: white;
    line-height: 1.3;
}
.masonry-item .overlay-info .oi-loc {
    font-size: .78rem;
    color: rgba(255,255,255,.8);
    margin-top: 6px;
    display: flex;
    align-items: center;
    gap: 4px;
}

.masonry-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 16px 36px rgba(198,164,59,0.25);
    border-color: #c6a43b;
    z-index: 10;
}

.masonry-item:hover img {
    transform: scale(1.04);
}

.masonry-item:hover .overlay-info {
    opacity: 1;
}

/* ================= COUNTER STRIP ================= */
.gallery-counter {
    display: flex;
    gap: 10px;
    justify-content: center;
    margin-bottom: 36px;
    flex-wrap: wrap;
}
.counter-pill {
    background: #f9f5ea;
    border: 1.5px solid #f0e8d3;
    border-radius: 50px;
    padding: 6px 18px;
    font-size: .83rem;
    font-weight: 600;
    color: #8a6d1e;
    display: flex;
    align-items: center;
    gap: 6px;
}
.counter-pill span { color: #c6a43b; font-size: 1rem; }

/* ================= MODAL ================= */
.modal-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.88);
    z-index: 9999;
    display: none;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(10px);
    padding: 20px;
}

.modal-box {
    background: #111;
    width: 100%;
    max-width: 680px;
    max-height: 92vh;
    display: flex;
    flex-direction: column;
    border-radius: 20px;
    overflow: hidden;
    animation: zoomIn .3s cubic-bezier(0.34,1.56,0.64,1);
    box-shadow: 0 20px 60px rgba(0,0,0,0.6), 0 0 0 1px rgba(198,164,59,.2);
}

@keyframes zoomIn {
    from { opacity: 0; transform: scale(.88); }
    to { opacity: 1; transform: scale(1); }
}

.modal-img-part {
    width: 100%;
    height: 340px;
    background: #000;
    flex-shrink: 0;
    position: relative;
    overflow: hidden;
}

.modal-img-part img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .4s ease;
}
.modal-img-part:hover img { transform: scale(1.03); }

.modal-img-part .modal-img-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,.5) 0%, transparent 50%);
}

.modal-text-part {
    padding: 26px 32px 30px;
    color: white;
    text-align: left;
    overflow-y: auto;
    flex: 1;
}

.modal-text-part::-webkit-scrollbar { width: 4px; }
.modal-text-part::-webkit-scrollbar-track { background: #111; }
.modal-text-part::-webkit-scrollbar-thumb { background: #333; border-radius: 10px; }
.modal-text-part::-webkit-scrollbar-thumb:hover { background: #c6a43b; }

.modal-tag {
    display: inline-block;
    background: linear-gradient(135deg, #c6a43b, #e8c96a);
    color: white;
    font-size: .73rem;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    padding: 4px 14px;
    border-radius: 20px;
    margin-bottom: 10px;
}

.modal-text-part h2 {
    font-size: 1.6rem;
    font-weight: 700;
    margin-bottom: 8px;
    line-height: 1.3;
}

.modal-loc {
    font-size: .83rem;
    color: #999;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.modal-text-part p {
    color: #bbb;
    line-height: 1.75;
    margin: 0;
    font-size: .92rem;
}

.close-btn {
    position: fixed;
    top: 20px;
    right: 25px;
    color: white;
    font-size: 2rem;
    cursor: pointer;
    z-index: 10000;
    background: rgba(255,255,255,.1);
    width: 44px;
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    transition: all .2s;
    backdrop-filter: blur(4px);
}
.close-btn:hover {
    background: #c6a43b;
    transform: scale(1.1);
}

/* ================= RESPONSIVE ================= */
@media(max-width: 992px) {
    .masonry-grid {
        column-count: 3;
    }
}

@media(max-width:768px){
    .gallery-hero-collage { height: 50vh; }
    .collage-grid {
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: repeat(2, 1fr);
        gap: 6px;
        padding: 6px;
    }
    .collage-item-1 {
        grid-column: 1 / 2;
        grid-row: 1 / 3;
    }
    .collage-item-2 {
        grid-column: 2 / 3;
        grid-row: 1 / 2;
    }
    .collage-item-4 {
        grid-column: 2 / 3;
        grid-row: 2 / 3;
    }
    .collage-item-3, .collage-item-5 {
        display: none;
    }

    .hero-content h1 { font-size: 2.8rem; }
    .hero-content p { font-size: 1rem; }
    .gallery-title h2 { font-size: 2.2rem; }
    
    .modal-box { max-height: 95vh; }
    .modal-img-part { height: 230px; }
    .modal-text-part { padding: 18px 20px 22px; }
    .modal-text-part h2 { font-size: 1.3rem; }

    .masonry-grid {
        column-count: 2;
        column-gap: 12px;
    }
    .masonry-item {
        margin-bottom: 12px;
        border: 4px solid #fff;
    }
    .masonry-item .overlay-info {
        padding: 12px;
    }
    .masonry-item .overlay-info .oi-title {
        font-size: .88rem;
    }
    
    .filter-tab { font-size: .8rem; padding: 7px 16px; }
}

</style>


<!-- ================= HERO COLLAGE ================= -->
<div class="gallery-hero-collage">

    <div class="hero-overlay"></div>

    <div class="collage-grid">
        @for($i = 0; $i < 5; $i++)
            <div class="collage-img-wrapper collage-item-{{ $i + 1 }}">
                <img src="{{ $collageItems[$i]['src'] }}" alt="{{ $collageItems[$i]['title'] }}" loading="lazy">
            </div>
        @endfor
    </div>

    <div class="hero-content">
        <h1>SIBAGANDING</h1>
        <p>Dokumentasi keindahan alam dan keanekaragaman Geosite Sibaganding</p>
    </div>

    <div class="hero-scroll-indicator" onclick="document.querySelector('.gallery-wrapper').scrollIntoView({behavior:'smooth'})">
        <i class="bi bi-chevron-double-down"></i>
    </div>

</div>

<!-- ================= GALLERY WRAPPER ================= -->
<div class="gallery-wrapper">

    <div class="gallery-title">
        <h2>G A L E R I</h2>
        <p>Kumpulan dokumentasi wisata Geosite Sibaganding — alam, budaya, dan keanekaragaman hayati</p>
    </div>

    {{-- ===== COUNTER PILLS ===== --}}
    <div class="gallery-counter">
        @php $totalFoto = 0; @endphp
        @foreach($galeriByKategori as $namaKat => $items)
            @php $totalFoto += $items->count(); @endphp
        @endforeach
        <div class="counter-pill"><i class="bi bi-images"></i> <span>{{ $totalFoto }}</span> Total Foto</div>
        @foreach($galeriByKategori as $namaKat => $items)
            <div class="counter-pill">
                <i class="bi bi-tag"></i> <span>{{ $items->count() }}</span> {{ $namaKat }}
            </div>
        @endforeach
    </div>

    {{-- ===== FILTER TABS ===== --}}
    @if($galeriByKategori->count() > 1)
    <div class="filter-tabs">
        <button class="filter-tab active" data-filter="all" onclick="filterGallery('all', this)">
            <i class="bi bi-grid-3x3-gap me-1"></i> Semua
        </button>
        @foreach($galeriByKategori as $namaKat => $items)
            <button class="filter-tab" data-filter="{{ Str::slug($namaKat) }}" onclick="filterGallery('{{ Str::slug($namaKat) }}', this)">
                {{ $namaKat }} ({{ $items->count() }})
            </button>
        @endforeach
    </div>
    @endif

    {{-- ===== GALERI GRID (MASONRY) ===== --}}
    @if($galeriByKategori->isEmpty())
        <div class="empty-gallery">
            <i class="bi bi-images"></i>
            <h5>Belum ada foto galeri</h5>
            <p>Foto dokumentasi akan muncul di sini setelah ditambahkan admin.</p>
        </div>
    @else
        <div class="masonry-grid" id="galleryGrid">
            @foreach($galeriByKategori as $namaKat => $items)
                @foreach($items as $item)
                    @php
                        $src = asset('storage/' . $item->gambar);
                    @endphp

                    <div class="masonry-item"
                         data-category="{{ Str::slug($namaKat) }}"
                         data-src="{{ $src }}"
                         data-title="{{ $item->judul }}"
                         data-desc="{{ $item->deskripsi }}"
                         data-tag="{{ $namaKat }}"
                         data-loc="{{ $item->lokasi ?? 'Geosite Sibaganding' }}"
                         onclick="openPhoto(this)">

                        <img src="{{ $src }}"
                             alt="{{ $item->judul }}"
                             loading="lazy"
                             onerror="this.onerror=null;this.src='https://placehold.co/300x450?text={{ urlencode($item->judul) }}'">

                        <div class="overlay-info">
                            <div class="oi-tag">{{ $namaKat }}</div>
                            <div class="oi-title">{{ $item->judul }}</div>
                            <div class="oi-loc">
                                <i class="bi bi-geo-alt-fill"></i>
                                {{ $item->lokasi ?? 'Geosite Sibaganding' }}
                            </div>
                        </div>

                    </div>
                @endforeach
            @endforeach
        </div>
    @endif

</div>

<!-- ================= MODAL ================= -->
<div id="pModal" class="modal-overlay" onclick="closePhoto()">

    <div class="close-btn" onclick="closePhoto()">
        <i class="bi bi-x-lg"></i>
    </div>

    <div class="modal-box" onclick="event.stopPropagation()">

        <div class="modal-img-part">
            <img src="" id="mImg" alt="">
            <div class="modal-img-overlay"></div>
        </div>

        <div class="modal-text-part">
            <div class="modal-tag" id="mTag"></div>
            <h2 id="mTitle"></h2>
            <div class="modal-loc">
                <i class="bi bi-geo-alt-fill" style="color:#c6a43b;"></i>
                <span id="mLoc"></span>
            </div>
            <p id="mDesc"></p>
        </div>

    </div>

</div>

<script>

/* ================= FILTER GALLERY ================= */
function filterGallery(category, btn) {
    // update active tab
    document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
    btn.classList.add('active');

    // show/hide masonry items
    document.querySelectorAll('#galleryGrid .masonry-item').forEach(item => {
        if (category === 'all' || item.dataset.category === category) {
            item.style.display = 'inline-block';
            item.style.animation = 'none';
            // trigger reflow
            void item.offsetWidth;
            item.style.animation = 'fadeInCard .4s ease forwards';
        } else {
            item.style.display = 'none';
        }
    });
}

/* ================= OPEN PHOTO ================= */
function openPhoto(element) {
    document.getElementById('mImg').src    = element.dataset.src;
    document.getElementById('mTitle').textContent = element.dataset.title;
    document.getElementById('mTag').textContent   = element.dataset.tag;
    document.getElementById('mLoc').textContent   = element.dataset.loc || 'Geosite Sibaganding';
    document.getElementById('mDesc').textContent  = element.dataset.desc || 'Tidak ada deskripsi.';

    document.getElementById('pModal').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

/* ================= CLOSE PHOTO ================= */
function closePhoto() {
    document.getElementById('pModal').style.display = 'none';
    document.getElementById('mImg').src = '';
    document.body.style.overflow = 'auto';
}

/* ================= ESC KEY ================= */
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closePhoto();
});

/* ===== LAZY CARD ANIMATION ===== */
const styleEl = document.createElement('style');
styleEl.textContent = `
@keyframes fadeInCard {
    from { opacity:0; transform:translateY(16px) scale(.97); }
    to   { opacity:1; transform:translateY(0) scale(1); }
}
#galleryGrid .masonry-item {
    animation: fadeInCard .5s ease forwards;
}`;
document.head.appendChild(styleEl);

</script>

@endsection
