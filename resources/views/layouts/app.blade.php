<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Geosite Danau Toba')</title>
    
  <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<!-- GOOGLE FONTS (FIX & RAPI) -->

<!-- Body (clean & modern) -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<!-- Navbar (lebih tegas & rapi) -->
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800&display=swap" rel="stylesheet">

<!-- Hero (elegan premium) -->
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800&display=swap" rel="stylesheet">

<!-- Optional elegan tambahan -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

<!-- AOS Animation -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
    * {
        font-family: 'Poppins', sans-serif;
    }
/* DEFAULT (di atas / hero) */
/* FULL WIDTH NAVBAR */
.navbar .container,
.navbar .container-fluid {
    max-width: 100% !important;
    width: 100% !important;

    padding-left: 0 !important;
    padding-right: 0 !important;
}

/* WRAPPER */
.nav-wrapper {
    position: relative;

    width: 100%;

    padding-left: 430px;
    padding-right: 40px;
}

/* MENU TENGAH */
.nav-center {
    position: absolute;

    left: 50%;
    top: 50%;

     transform: translateX(140px) !important;
    grid-column: 2;
    justify-self: center;
    width: 100%;

}


/* MENU */

.nav-menu {
    display: flex;
    align-items: center;

    /* geser menu biar tidak ketutup logo */
    padding-left: 220px !important;

    /* jarak antar menu */
    gap: 48px !important;

    position: relative !important;
    z-index: 999 !important;
}
/* KANAN */
.header-actions {
    justify-self: end;

    display: flex;
    align-items: center;

    column-gap: 22px;
}


.navbar {
    position: fixed;
    top: 0;
    width: 100%;
    height: 96px;
    padding: 0 55px;
    background: transparent !important;
    box-shadow: none !important;
    border-bottom: none !important;
    z-index: 9999;
    transition: all 0.35s ease;

    display: flex;
    align-items: center;
}

.navbar-container {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: relative;
}

.navbar.scrolled {
    height: 86px;
    padding: 0 55px !important;
    background: #073b63 !important;
    box-shadow: 0 8px 25px rgba(0,0,0,0.25) !important;
}

/* WRAPPER */
.nav-wrapper {
    display: grid;
    grid-template-columns: 320px 1fr 320px;
    align-items: center;
    width: 100%;
}
/* BRAND FIX */
.navbar-brand {
    position: relative;
    z-index: 20;

    width: 300px;
    flex-shrink: 0;
}

/* LOGO */
.logo-img {
    height: 68px;
    object-fit: contain;
    display: block;
    transition: all 0.35s ease;
    transform: translateY(-6px); /* naik */
    .logo-img {
    max-width: 100%;
}
}

.navbar.scrolled .logo-img {
    height: 60px !important;
    transform: translateY(-6px);
}


//* MENU */

.nav-menu {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 52px;
    margin: 0 !important;
    padding: 0 !important;
}
.nav-menu .nav-link {
    font-family: 'Montserrat', sans-serif !important;
    font-size: 1.02rem !important;
    font-weight: 700 !important;
    color: #ffffff !important;
    letter-spacing: 0.5px;
    text-decoration: none !important;
    position: relative;
}
.nav-menu .nav-link::before {
    display: none !important;
}
.nav-menu .nav-link::after {
    content: "";
    position: absolute;
    left: 50%;
    bottom: -8px;

    width: 0;
    height: 3px;

    background: #f0b323;
    border-radius: 20px;

    transform: translateX(-50%);
    transition: 0.3s ease;
}

.nav-menu .nav-link:hover::after,
.nav-menu .nav-link.active::after {
    width: 100%;
}



.nav-wrapper {
    padding-right: 20px;
}

/* BAHASA */
.lang-btn {
    height: 46px;
    padding: 0 16px;

    display: flex;
    align-items: center;
    gap: 8px;

    border-radius: 12px;
    border: 1px solid rgba(255,255,255,0.55);

    background: rgba(255,255,255,0.12);
    color: white;

    font-weight: 700;

    backdrop-filter: blur(8px);
}

/* SEARCH */
.search-wrapper {
    display: flex;
    align-items: center;

    column-gap: 14px;
}
.search-input {
    width: 135px;
    height: 46px;

    padding: 0 16px;

    border-radius: 12px;
    border: 1px solid rgba(255,255,255,0.55);

    background: rgba(255,255,255,0.12);

    color: white;
    outline: none;

    backdrop-filter: blur(8px);
}

.search-input::placeholder {
    color: rgba(255,255,255,0.85);
}


.search-input:focus {
    background: rgba(255,255,255,0.22);
    border-color: #f0b323;
}

.search-btn {
    width: 46px;
    height: 46px;

    border-radius: 12px;
    border: 1px solid rgba(255,255,255,0.55);

    background: rgba(255,255,255,0.12) !important;
    color: white !important;

    display: flex;
    align-items: center;
    justify-content: center;

    backdrop-filter: blur(8px);
}

/* HAPUS PANAH DESTINASI (biar clean) */
.dropdown-toggle::after {
    display: none !important;
}
/* menu dropdown */
.dropdown-menu {
    background: rgba(3, 28, 48, 0.95);
    border: 1px solid rgba(255,255,255,0.12);
    border-radius: 16px;
    padding: 10px;
    margin-top: 14px;
    backdrop-filter: blur(10px);
}

.dropdown-item {
    color: #ffffff !important;
    border-radius: 10px;
    padding: 10px 18px;
    font-weight: 600;
}

.dropdown-item:hover {
    background: #00a8d6;
    color: #ffffff !important;
}

    .dropdown-divider {
        border-top: 1px solid rgba(255,255,255,0.1);
    }

    .dropdown-header {
        color: #00d2ff;
        padding: 8px 20px;
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .navbar-toggler {
        border: none;
        background: rgba(255,255,255,0.2);
        padding: 10px 15px;
    }

    .navbar-toggler:focus {
        box-shadow: none;
        outline: none;
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    /* HERO TEXT PREMIUM */
    .hero-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 10;
        width: 100%;
        text-align: center;
        color: white;
        padding: 0 20px;
    }

    .hero-subtitle {
        font-size: 1.05rem;
        letter-spacing: 0.55em;
        text-transform: uppercase;
        margin-bottom: 20px;
        font-weight: 500;
        color: #ffffff;
    }

    .hero-subtitle::before,
    .hero-subtitle::after {
        content: "";
        display: inline-block;
        width: 70px;
        height: 2px;
        background: #c6a43b;
        margin: 0 18px;
        vertical-align: middle;
    }

   .hero-title {
    font-family: 'Cinzel', serif !important;

    font-size: 12rem;
    font-weight: 700;
    line-height: 1;
    margin: 0;

    color: #fdf7e3;
    text-align: center;
    letter-spacing: 18px;
    text-transform: uppercase;

    /* efek mewah + cinematic */
    transform: perspective(1000px) rotateX(6deg);

    text-shadow:
        0 1px 0 #c9b27a,
        0 2px 0 #b89f5d,
        0 3px 0 #a88e4a,
        0 10px 25px rgba(0,0,0,0.7),
        0 20px 60px rgba(0,0,0,0.9);

    animation: fadeUp 1s ease both;
}
.hero-title {
    background: linear-gradient(180deg, #fff9e6, #e2c97a);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

    .hero-divider {
        width: 120px;
        height: 3px;
        background: #c6a43b;
        margin: 28px auto 32px;
        position: relative;
    }

    .hero-divider::after {
        content: "✦";
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        color: #c6a43b;
        font-size: 18px;
    }

   .hero-btn {
    font-family: 'Playfair Display', serif !important;
    font-size: 1rem;
    font-weight: 800; /* ⬅️ bikin bold */
    letter-spacing: 1.2px;
    text-transform: capitalize;

    padding: 15px 45px;
    border-radius: 50px;

    background: linear-gradient(135deg, #e6b84f, #c79a2d);
    color: #1b2b38;

    box-shadow:
        0 8px 20px rgba(0,0,0,0.3),
        inset 0 1px 0 rgba(255,255,255,0.3);

    transition: all 0.3s ease;
}

.hero-btn:hover {
    transform: translateY(-3px);
    background: linear-gradient(135deg, #f5cc60, #d4a83a);
}
    @media (max-width: 992px) {
        .hero-title {
            font-size: 6rem;
            letter-spacing: 8px;
        }
    }

    @media (max-width: 576px) {
        .hero-title {
            font-size: 3rem;
            letter-spacing: 4px;
        }

        .hero-subtitle {
            font-size: 0.7rem;
            letter-spacing: 0.35em;
        }

        .hero-subtitle::before,
        .hero-subtitle::after {
            width: 35px;
            margin: 0 8px;
        }
    }
</style>
    
    @stack('styles')
</head>
<body>
    <audio id="bgMusic" loop>
    <source src="{{ asset('audio/lagu.mp3') }}" type="audio/mpeg">
</audio>

<button id="musicToggle" class="music-toggle" type="button">
    <i class="fa-solid fa-music"></i>
</button>

<style>
.music-toggle {
    position: fixed;
    right: 28px;
    bottom: 110px;
    z-index: 99999;

    width: 54px;
    height: 54px;
    border-radius: 50%;

    border: 1px solid rgba(255,255,255,0.5);
    background: rgba(7, 59, 99, 0.85);
    color: white;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 1.25rem;
    cursor: pointer;
    backdrop-filter: blur(8px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.25);
}

.music-toggle.playing {
    background: #f0b323;
    color: #073b63;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const music = document.getElementById('bgMusic');
    const btn = document.getElementById('musicToggle');

    music.volume = 0.45;

    function setIcon(isPlaying) {
        btn.classList.toggle('playing', isPlaying);
        btn.innerHTML = isPlaying
            ? '<i class="fa-solid fa-pause"></i>'
            : '<i class="fa-solid fa-play"></i>';
    }

    music.play()
        .then(() => setIcon(true))
        .catch(() => setIcon(false));

    btn.addEventListener('click', function () {
        if (music.paused) {
            music.play();
            setIcon(true);
        } else {
            music.pause();
            setIcon(false);
        }
    });
});
</script>
    <script>
    <div id="google_translate_element" style="display:none;"></div>
window.addEventListener("scroll", function() {
    const navbar = document.querySelector(".navbar");

    if (window.scrollY > 50) {
        navbar.classList.add("scrolled");
    } else {
        navbar.classList.remove("scrolled");
    }
});
</script>
    <!-- Navbar -->
  <!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top" id="navbar">
    <div class="container nav-wrapper">

       

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto nav-menu">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ url('/') }}">
                        {{ __('Home') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('informasi') ? 'active' : '' }}" href="{{ url('/informasi') }}">
                        {{ __('Informasi') }}
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('destinasi*') ? 'active' : '' }}"
                       href="#"
                       id="destinasiDropdown"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">
                        {{ __('Destinasi') }}
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="destinasiDropdown">
                        <li><a class="dropdown-item" href="{{ url('/destinasi/alam') }}">{{ __('Destinasi Alam') }}</a></li>
                        <li><a class="dropdown-item" href="{{ url('/destinasi/buatan') }}">{{ __('Destinasi Buatan') }}</a></li>
                        <li><a class="dropdown-item" href="{{ url('/destinasi/budaya') }}">{{ __('Destinasi Budaya') }}</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ url('/destinasi') }}">{{ __('Semua Destinasi') }}</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('galeri') ? 'active' : '' }}" href="{{ url('/galeri') }}">
                        {{ __('Galeri') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('berita') ? 'active' : '' }}" href="{{ url('/berita') }}">
                        {{ __('Berita') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}" href="{{ url('/kontak') }}">
                        {{ __('Kontak') }}
                    </a>
                </li>
            </ul>
<div class="dropdown">
    <button class="lang-btn dropdown-toggle" data-bs-toggle="dropdown">
        🌐 Language
    </button>

    <ul class="dropdown-menu">
        <li>
             <a class="dropdown-item" href="?lang=id">🇮🇩 Indonesia</a>
                🇮🇩 Indonesia
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="?lang=en">🇺🇸 English</a>
                🇺🇸 English
            </a>
        </li>
    </ul>
</div>
              <div class="search-wrapper">
    <input 
        type="text" 
        id="searchInput" 
        class="search-input" 
        placeholder="Cari..."
        autocomplete="off"
        list="searchHistoryList"
    >

    <datalist id="searchHistoryList"></datalist>

    <button class="search-btn" type="button" id="searchBtn">
        <i class="fa-solid fa-magnifying-glass"></i>
    </button>
</div>
            </div>
        </div>
    </div>
</nav>
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5>Geo<span style="color:#00d2ff">Toba</span></h5>
                    <p class="mt-3">Sistem Informasi Geosite Danau Toba - Menyajikan informasi lengkap tentang keindahan geologi dan budaya Batak di kawasan Danau Toba.</p>
                    <div class="social-icons mt-3">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Tautan Cepat</h5>
                    <ul class="list-unstyled mt-3">
                        <li class="mb-2"><a href="{{ url('/') }}">Beranda</a></li>
                        <li class="mb-2"><a href="{{ url('/informasi') }}">Informasi</a></li>
                        <li class="mb-2"><a href="{{ url('/galeri') }}">Galeri</a></li>
                        <li class="mb-2"><a href="{{ url('/berita') }}">Berita</a></li>
                        <li class="mb-2"><a href="{{ url('/kontak') }}">Kontak</a></li>
                        
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Destinasi</h5>
                    <ul class="list-unstyled mt-3">
                        <li class="mb-2"><a href="{{ url('/destinasi/alam') }}">Destinasi Alam</a></li>
                        <li class="mb-2"><a href="{{ url('/destinasi/buatan') }}">Destinasi Buatan</a></li>
                        <li class="mb-2"><a href="{{ url('/destinasi/budaya') }}">Destinasi Budaya</a></li>
                        <li class="mb-2"><a href="{{ url('/destinasi') }}">Semua Destinasi</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Kontak Kami</h5>
                    <ul class="list-unstyled mt-3">
                        <li class="mb-2">
                            <i class="fas fa-map-marker-alt me-2"></i> 
                            Danau Toba, Sumatera Utara
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-phone me-2"></i> 
                            +62 812 3456 7890
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-envelope me-2"></i> 
                            info@geotoba.com
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="copyright text-center">
                <p>©copyright by kelompok 04.</p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <div class="back-to-top" id="backToTop">
        <i class="fas fa-arrow-up"></i>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true
        });
        
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
        
        // Back to top button
        const backToTop = document.getElementById('backToTop');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        });
        
        backToTop.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
    
    @stack('scripts')

    <script>
window.addEventListener('scroll', function () {
    const navbar = document.querySelector('.navbar');

    if (window.scrollY > 60) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});
<!-- GOOGLE AUTO TRANSLATE -->
<div id="google_translate_element" style="display:none;"></div>

<script>
function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'id',
        includedLanguages: 'id,en',
        autoDisplay: false
    }, 'google_translate_element');
}

function setLang(lang) {
   <script>
function setLang(lang) {
    const langCode = lang === 'en' ? '/id/en' : '/id/id';

    document.cookie = "googtrans=" + langCode + ";path=/";
    document.cookie = "googtrans=" + langCode + ";domain=" + window.location.hostname + ";path=/";

    location.reload();
}

function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'id',
        includedLanguages: 'id,en',
        autoDisplay: false
    }, 'google_translate_element');
}
</script>

<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<div id="google_translate_element" style="display:none;"></div>

<script>
function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'id',
        includedLanguages: 'id,en',
        autoDisplay: false
    }, 'google_translate_element');

    setTimeout(function () {
        const params = new URLSearchParams(window.location.search);
        const lang = params.get('lang');

        if (lang) {
            const select = document.querySelector('.goog-te-combo');
            if (select) {
                select.value = lang;
                select.dispatchEvent(new Event('change'));
            }
        }
    }, 1000);
}
</script>

<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const searchBtn = document.getElementById('searchBtn');
    const historyList = document.getElementById('searchHistoryList');

    let searchHistory = JSON.parse(localStorage.getItem('searchHistory')) || [];

    function renderHistory() {
        historyList.innerHTML = '';
        searchHistory.slice(-5).reverse().forEach(item => {
            const option = document.createElement('option');
            option.value = item;
            historyList.appendChild(option);
        });
    }

    function saveSearch() {
        const keyword = searchInput.value.trim();

        if (keyword === '') return;

        searchHistory = searchHistory.filter(item => item !== keyword);
        searchHistory.push(keyword);

        if (searchHistory.length > 5) {
            searchHistory.shift();
        }

        localStorage.setItem('searchHistory', JSON.stringify(searchHistory));
        renderHistory();

        window.location.href = `/search?q=${encodeURIComponent(keyword)}`;
    }

    searchBtn.addEventListener('click', saveSearch);

    searchInput.addEventListener('keydown', function (e) {
        if (e.key === 'Enter') {
            saveSearch();
        }
    });

    renderHistory();
});
</script>
</script>

</body>
</html>