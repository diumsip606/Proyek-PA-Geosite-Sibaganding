<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Geosite Danau Toba')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        /* NAVBAR DEFAULT - SELALU BIRU SOLID */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: #073b63 !important; /* Warna biru solid */
            box-shadow: 0 4px 15px rgba(0,0,0,0.15) !important;
            border-bottom: none !important;
            z-index: 9999;
            transition: all 0.35s ease;
            padding: 15px 0;
        }

        .navbar.scrolled {
            padding: 10px 0;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3) !important;
        }

        /* BRAND & LOGO - DIBERSIHKAN DARI BACKGROUND ANEH */
        .navbar-brand {
            position: relative;
            z-index: 20;
            flex-shrink: 0; /* Mencegah logo mengecil/tergencet */
            background: transparent !important;
            border: none !important;
            outline: none !important;
            padding: 0 !important;
        }

        .logo-img {
            height: 60px;
            width: auto;
            max-width: 100%;
            object-fit: contain;
            display: block;
            transition: all 0.35s ease;
            background: transparent !important;
        }

        .navbar.scrolled .logo-img {
            height: 50px;
        }

        /* MENU NAVIGASI */
        .logo-wrapper {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 0;
            padding: 0;
        }

        .logo-img {
            height: 60px;
            width: auto;
            border-radius: 16px;
            object-fit: cover;
            transition: all 0.3s ease;
            box-shadow: 0 8px 16px -6px rgba(0, 0, 0, 0.2);
        }

        .logo-img:hover {
            transform: scale(1.02) translateY(-2px);
            box-shadow: 0 14px 24px -8px rgba(0, 0, 0, 0.3);
        }

        .logo-divider {
            width: 1.5px;
            height: 42px;
            background: linear-gradient(145deg, rgba(255,255,255,0.5), rgba(255,255,255,0.1));
            border-radius: 2px;
        }

        .navbar-brand {
            font-size: 1.65rem;
            font-weight: 800;
            color: white !important;
            margin: 0;
            padding: 0 0 0 6px;
            letter-spacing: -0.3px;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand span {
            color: #fdf7e3;
            font-weight: 800;
        }

        .nav-menu {
            gap: 15px; /* Jarak antar menu */
        }

        .nav-menu .nav-link {
            font-family: 'Montserrat', sans-serif !important;
            font-size: 0.95rem !important;
            font-weight: 700 !important;
            color: #ffffff !important;
            letter-spacing: 0.5px;
            text-decoration: none !important;
            position: relative;
            padding: 8px 10px !important;
        }

        .nav-menu .nav-link::before {
            display: none !important;
        }

        .nav-menu .nav-link::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 0px;
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

        /* BAHASA & SEARCH BUTTONS */
        .lang-btn {
            height: 42px;
            padding: 0 16px;
            display: flex;
            align-items: center;
            gap: 8px;
            border-radius: 10px;
            border: 1px solid rgba(255,255,255,0.4);
            background: rgba(255,255,255,0.1);
            color: white;
            font-weight: 600;
            font-size: 0.9rem;
            backdrop-filter: blur(8px);
        }

        .search-wrapper {
            display: flex;
            align-items: center;
            column-gap: 8px;
        }

        .search-input {
            width: 130px;
            height: 42px;
            padding: 0 14px;
            border-radius: 10px;
            border: 1px solid rgba(255,255,255,0.4);
            background: rgba(255,255,255,0.1);
            color: white;
            outline: none;
            font-size: 0.9rem;
            backdrop-filter: blur(8px);
            transition: all 0.3s ease;
        }

        .search-input::placeholder {
            color: rgba(255,255,255,0.8);
        }

        .search-input:focus {
            background: rgba(255,255,255,0.2);
            border-color: #f0b323;
            width: 160px; /* Sedikit memanjang saat diklik */
        }

        .search-btn {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            border: 1px solid rgba(255,255,255,0.4);
            background: rgba(255,255,255,0.1) !important;
            color: white !important;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(8px);
        }

        /* DROPDOWN MENU */
        .dropdown-toggle::after {
            display: none !important;
        }

        .dropdown-menu {
            background: rgba(3, 28, 48, 0.95);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 12px;
            padding: 10px;
            margin-top: 10px;
            backdrop-filter: blur(10px);
        }

        .dropdown-item {
            color: #ffffff !important;
            border-radius: 8px;
            padding: 8px 16px;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .dropdown-item:hover {
            background: #00a8d6;
            color: #ffffff !important;
        }

        .dropdown-divider {
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        /* TOGGLER (MOBILE MENU BUTTON) */
        .navbar-toggler {
            border: none;
            background: rgba(255,255,255,0.15);
            padding: 8px 12px;
            border-radius: 8px;
        }

        .navbar-toggler:focus {
            box-shadow: none;
            outline: none;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* RESPONSIVE MENU KETIKA DI HP/TABLET */
        @media (max-width: 1199px) {
            .navbar-collapse {
                background: #073b63;
                padding: 20px;
                border-radius: 12px;
                margin-top: 15px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            }
            .nav-menu {
                gap: 10px !important;
                margin-bottom: 20px !important;
                align-items: flex-start !important; /* Susun rata kiri di mobile */
            }
            .nav-menu .nav-link {
                display: block;
                width: 100%;
            }
            .nav-actions-mobile {
                flex-direction: column;
                align-items: flex-start !important;
                gap: 15px !important;
            }
            .search-wrapper {
                width: 100%;
            }
            .search-input {
                width: 100%;
            }
        }

        /* MUSIC BUTTON */
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

        /* HERO TEXT PREMIUM (Dipertahankan) */
        .hero-content { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 10; width: 100%; text-align: center; color: white; padding: 0 20px; }
        .hero-subtitle { font-size: 1.05rem; letter-spacing: 0.55em; text-transform: uppercase; margin-bottom: 20px; font-weight: 500; color: #ffffff; }
        .hero-subtitle::before, .hero-subtitle::after { content: ""; display: inline-block; width: 70px; height: 2px; background: #c6a43b; margin: 0 18px; vertical-align: middle; }
        .hero-title { font-family: 'Cinzel', serif !important; font-size: 12rem; font-weight: 700; line-height: 1; margin: 0; color: #fdf7e3; text-align: center; letter-spacing: 18px; text-transform: uppercase; transform: perspective(1000px) rotateX(6deg); text-shadow: 0 1px 0 #c9b27a, 0 2px 0 #b89f5d, 0 3px 0 #a88e4a, 0 10px 25px rgba(0,0,0,0.7), 0 20px 60px rgba(0,0,0,0.9); animation: fadeUp 1s ease both; background: linear-gradient(180deg, #fff9e6, #e2c97a); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .hero-divider { width: 120px; height: 3px; background: #c6a43b; margin: 28px auto 32px; position: relative; }
        .hero-divider::after { content: "✦"; position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); color: #c6a43b; font-size: 18px; }
        .hero-btn { font-family: 'Playfair Display', serif !important; font-size: 1rem; font-weight: 800; letter-spacing: 1.2px; text-transform: capitalize; padding: 15px 45px; border-radius: 50px; background: linear-gradient(135deg, #e6b84f, #c79a2d); color: #1b2b38; box-shadow: 0 8px 20px rgba(0,0,0,0.3), inset 0 1px 0 rgba(255,255,255,0.3); transition: all 0.3s ease; }
        .hero-btn:hover { transform: translateY(-3px); background: linear-gradient(135deg, #f5cc60, #d4a83a); }
        @media (max-width: 992px) { .hero-title { font-size: 6rem; letter-spacing: 8px; } }
        @media (max-width: 576px) { .hero-title { font-size: 3rem; letter-spacing: 4px; } .hero-subtitle { font-size: 0.7rem; letter-spacing: 0.35em; } .hero-subtitle::before, .hero-subtitle::after { width: 35px; margin: 0 8px; } }

        /*======== FOOTER CSS TOMBOL UNTUK SCROLL BACK KEATAS ======== */
        :root { --blue-dark: #003366; --gold: #c6a43b; }
        .footer { background: var(--blue-dark); color: white; padding: 40px 0 20px; margin-top: 0; }
        .footer h5 { font-size: 1.1rem; font-weight: 600; margin-bottom: 1rem; position: relative; display: inline-block; }
        .footer h5::after { content: ''; position: absolute; bottom: -6px; left: 0; width: 35px; height: 2px; background: var(--gold); border-radius: 4px; }
        .footer a { color: rgba(255, 255, 255, 0.7); text-decoration: none; transition: all 0.3s ease; font-size: 0.8rem; }
        .footer a:hover { color: var(--gold); transform: translateX(5px); display: inline-block; }
        .social-icons { display: flex; gap: 10px; margin-top: 15px; }
        .social-icons a { display: inline-flex; align-items: center; justify-content: center; width: 34px; height: 34px; border-radius: 50%; background: rgba(255, 255, 255, 0.1); transition: all 0.3s ease; }
        .social-icons a:hover { background: var(--gold); transform: translateY(-3px); }
        .social-icons a:hover i { color: var(--blue-dark); }
        .copyright { border-top: 1px solid rgba(255, 255, 255, 0.1); padding-top: 15px; margin-top: 25px; text-align: center; font-size: 0.7rem; color: rgba(255, 255, 255, 0.5); }
        .back-to-top { position: fixed; bottom: 25px; right: 25px; width: 44px; height: 44px; border-radius: 22px; background: var(--gold); color: var(--blue-dark); display: flex; align-items: center; justify-content: center; cursor: pointer; opacity: 0; visibility: hidden; transition: all 0.3s ease; z-index: 1000; box-shadow: 0 4px 12px rgba(0,0,0,0.2); }
        .back-to-top.show { opacity: 1; visibility: visible; }
        .back-to-top:hover { background: white; transform: translateY(-4px); }

        /* ==================== FOOTER  ==================== */
.footer-section {
    background:
        radial-gradient(circle at 15% 10%, rgba(198, 164, 59, 0.12), transparent 25%),
        linear-gradient(135deg, #052f52 0%, #03243d 100%);
    padding: 85px 0 28px;
    color: white;
    position: relative;
    overflow: hidden;
}

.footer-section::before {
    content: "";
    position: absolute;
    width: 420px;
    height: 420px;
    right: -150px;
    top: -150px;
    border-radius: 50%;
    background: rgba(255,255,255,0.04);
}

.footer-grid {
    position: relative;
    z-index: 2;
    display: grid;
    grid-template-columns: 1.2fr 0.7fr 0.8fr 1fr 1.2fr;
    gap: 42px;
    align-items: flex-start;
}

.footer-brand h3 {
    font-size: 1.5rem;
    color: #fff;
    margin-bottom: 18px;
    font-weight: 800;
}

.footer-brand h3 span {
    color: #c6a43b;
}

.footer-brand p {
    color: rgba(255,255,255,0.72);
    line-height: 1.75;
    font-size: 0.9rem;
    max-width: 330px;
}

.footer-social {
    display: flex;
    gap: 12px;
    margin-top: 24px;
}

.footer-social a {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: rgba(255,255,255,0.09);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    font-size: 0.72rem;
    font-weight: 800;
    transition: all 0.25s ease;
}

.footer-social a:hover {
    background: #c6a43b;
    color: #003366;
    transform: translateY(-3px);
}

.footer-links h4,
.footer-contact h4,
.footer-map h4 {
    font-size: 1.25rem;
    color: #fff;
    margin-bottom: 22px;
    position: relative;
}

.footer-links h4::after,
.footer-contact h4::after,
.footer-map h4::after {
    content: "";
    width: 42px;
    height: 2px;
    background: #c6a43b;
    position: absolute;
    left: 0;
    bottom: -8px;
}

.footer-links {
    display: flex;
    flex-direction: column;
}

.footer-links a {
    color: rgba(255,255,255,0.68);
    text-decoration: none;
    margin-bottom: 14px;
    font-size: 0.9rem;
    transition: all 0.25s ease;
}

.footer-links a:hover {
    color: #c6a43b;
    transform: translateX(5px);
}

.footer-contact p {
    color: rgba(255,255,255,0.78);
    margin-bottom: 14px;
    font-size: 0.92rem;
    display: flex;
    gap: 10px;
    align-items: center;
}

.footer-contact p span {
    color: #c6a43b;
}

.footer-contact-btn {
    display: inline-block;
    margin-top: 12px;
    padding: 11px 24px;
    border-radius: 35px;
    background: #c6a43b;
    color: #003366;
    text-decoration: none;
    font-size: 0.72rem;
    font-weight: 900;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    transition: all 0.25s ease;
}

.footer-contact-btn:hover {
    background: #fff8df;
    transform: translateY(-3px);
}

.footer-map-box {
    height: 190px;
    border-radius: 22px;
    overflow: hidden;
    border: 6px solid rgba(255,255,255,0.12);
    box-shadow: 0 18px 45px rgba(0,0,0,0.22);
    background: rgba(255,255,255,0.06);
}

.footer-map-box iframe {
    width: 100%;
    height: 100%;
    border: none;
    display: block;
    filter: grayscale(20%) contrast(1.05);
}

.footer-bottom {
    position: relative;
    z-index: 2;
    margin-top: 62px;
    padding-top: 24px;
    border-top: 1px solid rgba(255,255,255,0.12);
    text-align: center;
}

.footer-bottom p {
    color: rgba(255,255,255,0.55);
    font-size: 0.82rem;
}

@media (max-width: 1100px) {
    .footer-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .footer-map {
        grid-column: span 2;
    }
}

@media (max-width: 576px) {
    .footer-section {
        padding: 65px 0 24px;
    }

    .footer-grid {
        grid-template-columns: 1fr;
        gap: 34px;
    }

    .footer-map {
        grid-column: span 1;
    }

    .footer-map-box {
        height: 220px;
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

    <nav class="navbar navbar-expand-xl fixed-top" id="navbar"> <div class="container-fluid px-4 px-lg-5">
        <!-- LOGO SECTION - LANGSUNG DARI FOLDER public/image/Logo/ -->
        <div class="logo-wrapper">
            <img src="{{ asset('images/footer-logo/logobankindonesia.jpg') }}" alt="Bank Indonesia" class="logo-img" loading="lazy">
            <div class="logo-divider"></div>
            <img src="{{ asset('images/footer-logo/del.jpg') }}" alt="Logo Del" class="logo-img" loading="lazy">
            <div class="logo-divider"></div>
            <a class="navbar-brand" href="{{ url('/') }}">Geosite<br><span>Sibaganding</span></a>
        </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto nav-menu align-items-xl-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ url('/') }}">{{ __('Home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('informasi') ? 'active' : '' }}" href="{{ url('/informasi') }}">{{ __('Informasi') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('destinasi*') ? 'active' : '' }}"
                           href="#" id="destinasiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('Destinasi') }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="destinasiDropdown">
                            <li><a class="dropdown-item" href="{{ route('destinasi.biodiversity') }}">{{ __('Biodiversity') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('destinasi.geodiversity') }}">{{ __('Geodiversity') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('destinasi.culture-diversity') }}">{{ __('Culture Diversity') }}</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('destinasi') }}">{{ __('Semua Destinasi') }}</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('galeri') ? 'active' : '' }}" href="{{ url('/galeri') }}">{{ __('Galeri') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('berita') ? 'active' : '' }}" href="{{ url('/berita') }}">{{ __('Berita') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}" href="{{ url('/kontak') }}">{{ __('Kontak') }}</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-3 ms-xl-4 mt-3 mt-xl-0 nav-actions-mobile">
                    <div class="dropdown">
                        <button class="lang-btn dropdown-toggle" data-bs-toggle="dropdown">
                            🌐 Language
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="javascript:void(0);" onclick="setLang('id')">🇮🇩 Indonesia</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);" onclick="setLang('en')">🇺🇸 English</a></li>
                        </ul>
                    </div>

                    <div class="search-wrapper">
                        <input type="text" id="searchInput" class="search-input" placeholder="Cari..." autocomplete="off" list="searchHistoryList">
                        <datalist id="searchHistoryList"></datalist>
                        <button class="search-btn" type="button" id="searchBtn">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main style="margin-top: 100px;"> @yield('content')
    </main>

    <div class="back-to-top" id="backToTop"><i class="fas fa-arrow-up"></i></div>

    <div id="google_translate_element" style="display:none;"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init({ duration: 1000, once: true });

        const navbar = document.getElementById('navbar');
        const backToTop = document.getElementById('backToTop');

        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }

            if (window.scrollY > 300) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        });

        backToTop.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Audio Script
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

            music.play().then(() => setIcon(true)).catch(() => setIcon(false));

            btn.addEventListener('click', function () {
                if (music.paused) { music.play(); setIcon(true); }
                else { music.pause(); setIcon(false); }
            });
        });

        // Search Script
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
                if (searchHistory.length > 5) searchHistory.shift();
                localStorage.setItem('searchHistory', JSON.stringify(searchHistory));
                renderHistory();
                window.location.href = `/search?q=${encodeURIComponent(keyword)}`;
            }

            searchBtn.addEventListener('click', saveSearch);
            searchInput.addEventListener('keydown', function (e) {
                if (e.key === 'Enter') saveSearch();
            });
            renderHistory();
        });

        // Translate Scripts
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

    @stack('scripts')
</body>

<!-- ==================== FOOTER ==================== -->
<footer class="footer-section">
    <div class="container">
        <div class="footer-grid">

            <div class="footer-brand">
                <h3>Geo<span>Toba</span></h3>
                <p>
                    Sistem Informasi Geosite Danau Toba — menyajikan informasi lengkap
                    tentang keindahan geologi, budaya Batak, dan pesona Sibaganding.
                </p>

                <div class="footer-social">
                    <a href="#">f</a>
                    <a href="#">t</a>
                    <a href="#">ig</a>
                    <a href="#">yt</a>
                </div>
            </div>

            <div class="footer-links">
                <h4>Tautan</h4>
                <a href="#home">Beranda</a>
                <a href="#about">Informasi</a>
                <a href="#galeri">Galeri</a>
                <a href="{{ url('/berita') }}">Berita</a>
                <a href="{{ url('/kontak') }}">Kontak</a>
            </div>

            <div class="footer-links">
                <h4>Destinasi</h4>
                <a href="{{ url('/geosite/biodiversity') }}">Biodiversity</a>
                <a href="{{ url('/geosite/geodiversity') }}">Geodiversity</a>
                <a href="{{ url('/geosite/culturediversity') }}">Culturediversity</a>
                <a href="{{ url('/destinasi') }}">Semua Destinasi</a>
            </div>

            <div class="footer-contact">
                <h4>Kontak</h4>
                <p><span>📍</span> Danau Toba, Sumatera Utara</p>
                <p><span>☎</span> +62 812 3456 7890</p>
                <p><span>✉</span> info@geotoba.com</p>

                <a href="{{ url('/kontak') }}" class="footer-contact-btn">Hubungi Kami</a>
            </div>

            <div class="footer-map">
                <h4>Peta Sibaganding</h4>

                <div class="footer-map-box">
                    <iframe
                        src="https://www.google.com/maps?q=Sibaganding,%20Simalungun,%20Sumatera%20Utara&output=embed"
                        loading="lazy"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>

        </div>

        <div class="footer-bottom">
            <p>© 2026 GeoToba — Geopark Danau Toba. All rights reserved.</p>
        </div>
    </div>
</footer>

</html>
