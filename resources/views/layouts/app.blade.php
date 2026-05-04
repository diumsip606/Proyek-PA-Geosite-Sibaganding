<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Geosite Danau Toba')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Google Fonts (Poppins - untuk body) -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- FONT HERO (ELEGAN & PREMIUM 🔥) -->
   <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800&display=swap" rel="stylesheet">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
    * {
        font-family: 'Poppins', sans-serif;
    }

    /* Navbar Styles */
    .navbar {
        transition: all 0.4s ease;
        padding: 1rem 0;
        background: transparent;
        z-index: 999;
    }

    .navbar.scrolled {
        background: rgba(0, 0, 0, 0.95);
        backdrop-filter: blur(10px);
        padding: 0.5rem 0;
        box-shadow: 0 2px 20px rgba(0,0,0,0.1);
    }

    .navbar-brand {
        font-size: 1.8rem;
        font-weight: 700;
        color: white !important;
    }

    .navbar-brand span {
        color: #00d2ff;
    }

    .nav-link {
        color: white !important;
        font-weight: 600;
        margin: 0 0.5rem;
        transition: all 0.3s ease;
        position: relative;
        text-decoration: none;
    }

    .nav-link::before {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, #00d2ff, #3a7bd5);
        transition: width 0.3s ease;
    }

    .nav-link:hover::before,
    .nav-link.active::before {
        width: 80%;
    }

    .nav-link:hover {
        transform: translateY(-2px);
    }

    /* Dropdown Menu Styles */
    .dropdown-menu {
        background: rgba(0, 0, 0, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 15px;
        padding: 10px 0;
        margin-top: 10px;
    }

    .dropdown-item {
        color: white;
        padding: 10px 25px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .dropdown-item:hover {
        background: linear-gradient(135deg, #00d2ff, #3a7bd5);
        color: white;
        transform: translateX(5px);
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
        display: inline-block;
        background: #d4a52c;
        color: #12304a;
        padding: 16px 50px;
        font-size: 0.85rem;
        letter-spacing: 0.28em;
        text-transform: uppercase;
        text-decoration: none;
        font-weight: 800;
        border-radius: 40px;
        transition: 0.3s ease;
    }

    .hero-btn:hover {
        background: #f2c94c;
        color: #12304a;
        transform: translateY(-3px);
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
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Geo<span>Toba</span>
            </a>
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
</body>
</html>