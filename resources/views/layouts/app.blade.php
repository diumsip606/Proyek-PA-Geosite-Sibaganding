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

.navbar.scrolled {
    height: 86px;
    padding: 0 55px !important;
    background: #073b63 !important;
    box-shadow: 0 8px 25px rgba(0,0,0,0.25) !important;
}

/* WRAPPER */
.nav-wrapper {
    width: 100%;
    height: 100%; /* 🔥 penting */
    display: flex !important;
    align-items: center !important;
    justify-content: space-between;
}

/* BRAND FIX */
.navbar-brand {
    height: 100% !important; /* 🔥 jangan fix 86 lagi */
    display: flex !important;
    align-items: center !important;
}

/* LOGO */
.logo-img {
    height: 68px;
    object-fit: contain;
    display: block;
    transition: all 0.35s ease;
    transform: translateY(-6px); /* naik */
}

.navbar.scrolled .logo-img {
    height: 60px !important;
    transform: translateY(-6px);
}


/* MENU */
.nav-menu {
    display: flex;
    align-items: center;
    gap: 38px;
    margin: 0;
}

.nav-menu .nav-link {
    font-family: 'Montserrat', sans-serif !important;
    font-size: 1.05rem !important;
    font-weight: 700 !important;
    color: #ffffff !important;
    letter-spacing: 0.5px;
    padding: 10px 0 !important;
    text-decoration: none !important;
    text-shadow: 0 2px 8px rgba(0,0,0,0.35);
    position: relative;
}

.nav-menu .nav-link::before {
    display: none !important;
}

.nav-menu .nav-link::after {
    content: "";
    position: absolute;
    left: 50%;
    bottom: -6px;
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
/* kanan */
.header-actions {
    display: flex;
    align-items: center;
    gap: 18px;
}

/* bahasa */
.lang-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 16px;
    border: 1px solid rgba(255,255,255,0.55);
    border-radius: 10px;
    background: rgba(255,255,255,0.15);
    color: #ffffff;
    font-weight: 700;
    cursor: pointer;
    backdrop-filter: blur(8px);
}

.flag-id {
    width: 22px;
    height: 14px;
    background: linear-gradient(to bottom, red 50%, white 50%);
}

/* search */
.search-btn {
    border: none;
    background: transparent;
    color: #ffffff;
    font-size: 1.6rem;
    cursor: pointer;
    text-shadow: 0 2px 8px rgba(0,0,0,0.35);
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
    <script>
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
   <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid nav-wrapper">

        <!-- LOGO KIRI -->
        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo-img">
        </a>

        <!-- MENU TENGAH -->
        <ul class="navbar-nav nav-menu">
            <li class="nav-item">
                <a class="nav-link active" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/informasi">Informasi</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    Destinasi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/galeri">Galeri</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/berita">Berita</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/kontak">Kontak</a>
            </li>
        </ul>

        <!-- KANAN -->
       <div class="dropdown">
    <button class="lang-btn dropdown-toggle" data-bs-toggle="dropdown">
        🌐 <span>{{ session('lang', 'ID') }}</span>
    </button>

    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{ url('lang/id') }}">🇮🇩 Indonesia</a></li>
        <li><a class="dropdown-item" href="{{ url('lang/en') }}">🇺🇸 English</a></li>
    </ul>
</div>

            <button class="search-btn" type="button">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>

    </div>
</nav>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('informasi') ? 'active' : '' }}" href="{{ url('/informasi') }}">Informasi</a>
                    </li>

                    
                    
                    <!-- DESTINASI DROPDOWN -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('destinasi*') ? 'active' : '' }}" 
                           href="#" 
                           id="destinasiDropdown" 
                           role="button" 
                           data-bs-toggle="dropdown" 
                           aria-expanded="false">
                            Destinasi
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="destinasiDropdown">
                            <li><h6 class="dropdown-header">PILIH KATEGORI</h6></li>
                            <li><a class="dropdown-item" href="{{ url('/destinasi/alam') }}">
                                <i class="fas fa-mountain"></i> Destinasi Alam
                            </a></li>
                            <li><a class="dropdown-item" href="{{ url('/destinasi/buatan') }}">
                                <i class="fas fa-building"></i> Destinasi Buatan
                            </a></li>
                            <li><a class="dropdown-item" href="{{ url('/destinasi/budaya') }}">
                                <i class="fas fa-landmark"></i> Destinasi Budaya
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ url('/destinasi') }}">
                                <i class="fas fa-globe"></i> Semua Destinasi
                            </a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('galeri') ? 'active' : '' }}" href="{{ url('/galeri') }}">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('berita') ? 'active' : '' }}" href="{{ url('/berita') }}">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}" href="{{ url('/kontak') }}">Kontak</a>
                    </li>
                </ul>
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
</script>
</body>
</html>