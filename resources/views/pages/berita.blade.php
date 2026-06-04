@extends('layouts.app')

@section('title', 'Berita - Geosite Danau Toba')

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

/* HERO dengan background berita.jpg - TIDAK TERPOTONG */
.berita-hero {
    height: 45vh;
    min-height: 400px;
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

.berita-hero > div {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 3;
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

/* MODAL UNTUK DETAIL BERITA */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.9);
    z-index: 10001;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}

.modal.active {
    display: flex;
}

.modal-content {
    background: white;
    max-width: 800px;
    width: 90%;
    max-height: 85vh;
    border-radius: 16px;
    overflow-y: auto;
    position: relative;
    cursor: default;
}

.modal-close {
    position: absolute;
    top: 15px;
    right: 20px;
    color: #333;
    font-size: 35px;
    cursor: pointer;
    background: rgba(255,255,255,0.9);
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: 0.3s;
}

.modal-close:hover {
    background: #c6a43b;
    color: white;
}

.modal-body {
    padding: 30px;
}

.modal-image {
    width: 100%;
    height: 300px;
    object-fit: cover;
    border-radius: 12px;
    margin-bottom: 20px;
}

.modal-date {
    font-size: 0.75rem;
    color: #c6a43b;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    margin-bottom: 10px;
    display: block;
}

.modal-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: #1a3c5e;
    margin-bottom: 20px;
    font-family: 'Cormorant Garamond', serif;
}

.modal-text {
    font-size: 1rem;
    line-height: 1.8;
    color: #444;
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
@media (max-width: 900px) {
    .berita-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

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
    .berita-hero h1 {
        font-size: 2rem;
    }
    .section {
        padding: 40px 0;
    }
    .berita-hero {
        min-height: 300px;
        padding: 60px 20px;
    }
    .berita-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    .modal-title {
        font-size: 1.4rem;
    }
    .modal-body {
        padding: 20px;
    }
    .modal-image {
        height: 200px;
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
    .berita-hero h1 {
        font-size: 1.6rem;
    }
    .berita-hero p {
        font-size: 0.7rem;
    }
    .berita-hero {
        min-height: 250px;
        padding: 40px 20px;
    }
    .berita-title {
        font-size: 1rem;
    }
    .modal-title {
        font-size: 1.2rem;
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
        <div class="berita-grid" id="beritaGrid"></div>
        <div class="pagination" id="pagination"></div>
    </div>
</section>

<!-- MODAL DETAIL BERITA -->
<div class="modal" id="modal">
    <div class="modal-content">
        <span class="modal-close" onclick="closeModal()">&times;</span>
        <div class="modal-body">
            <img id="modalImage" class="modal-image" src="" alt="">
            <span id="modalDate" class="modal-date"></span>
            <h2 id="modalTitle" class="modal-title"></h2>
            <div id="modalText" class="modal-text"></div>
        </div>
    </div>
</div>

<script>
    // DATA BERITA KOSONG - NANTI DIISI DENGAN CRUD
    const beritaData = [];

    let currentPage = 1;
    const itemsPerPage = 6;

    function renderBerita() {
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;
        const beritaToShow = beritaData.slice(startIndex, endIndex);

        const grid = document.getElementById('beritaGrid');

        if (beritaData.length === 0) {
            // Tampilkan pesan kosong
            grid.innerHTML = `
                <div class="empty-state">
                    <div class="empty-state-icon">📰</div>
                    <h3>Belum Ada Berita</h3>
                    <p>Saat ini belum ada berita yang tersedia.</p>
                    <p style="font-size: 0.8rem;">Silakan cek kembali nanti untuk informasi terbaru.</p>
                </div>
            `;
            document.getElementById('pagination').innerHTML = '';
            return;
        }

        if (beritaToShow.length === 0) {
            grid.innerHTML = '<div style="grid-column:1/-1; text-align:center; padding:60px"><p>Tidak ada berita</p></div>';
            return;
        }

        grid.innerHTML = beritaToShow.map(berita => `
            <div class="berita-card" onclick="openModal(${berita.id})">
                <div class="berita-image">
                    <img src="${berita.image}" alt="${berita.title}">
                </div>
                <div class="berita-content">
                    <span class="berita-date">${berita.date}</span>
                    <h3 class="berita-title">${berita.title}</h3>
                    <p class="berita-excerpt">${berita.excerpt.substring(0, 100)}${berita.excerpt.length > 100 ? '...' : ''}</p>
                    <span class="berita-readmore">Baca Selengkapnya →</span>
                </div>
            </div>
        `).join('');

        renderPagination();
    }

    function renderPagination() {
        const totalPages = Math.ceil(beritaData.length / itemsPerPage);
        const paginationDiv = document.getElementById('pagination');

        if (totalPages <= 1) {
            paginationDiv.innerHTML = '';
            return;
        }

        let paginationHtml = '';

        // Tombol Previous
        paginationHtml += `<button onclick="changePage(${currentPage - 1})" ${currentPage === 1 ? 'disabled' : ''}>« Sebelumnya</button>`;

        // Nomor halaman
        for (let i = 1; i <= totalPages; i++) {
            paginationHtml += `<button onclick="changePage(${i})" class="${i === currentPage ? 'active' : ''}">${i}</button>`;
        }

        // Tombol Next
        paginationHtml += `<button onclick="changePage(${currentPage + 1})" ${currentPage === totalPages ? 'disabled' : ''}>Selanjutnya »</button>`;

        paginationDiv.innerHTML = paginationHtml;
    }

    function changePage(page) {
        const totalPages = Math.ceil(beritaData.length / itemsPerPage);
        if (page < 1 || page > totalPages) return;
        currentPage = page;
        renderBerita();
        window.scrollTo({ top: 300, behavior: 'smooth' });
    }

    function openModal(id) {
        const berita = beritaData.find(b => b.id === id);
        if (!berita) return;

        document.getElementById('modalImage').src = berita.image;
        document.getElementById('modalDate').innerText = berita.date;
        document.getElementById('modalTitle').innerText = berita.title;
        document.getElementById('modalText').innerHTML = berita.content;
        document.getElementById('modal').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        document.getElementById('modal').classList.remove('active');
        document.body.style.overflow = '';
    }

    // Tutup modal dengan ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });

    renderBerita();


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
