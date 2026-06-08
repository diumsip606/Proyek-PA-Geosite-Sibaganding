<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel - @yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f5f7fa;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            height: 100vh;
            background: #1e293b;
            color: #94a3b8;
            transition: transform 0.3s ease;
            z-index: 1000;
            transform: translateX(-100%);
            overflow-y:auto;
            overflow-x:hidden;
        }

        /* sidebar buat scroll*/
        .sidebar::-webkit-scrollbar {
        width: 4px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 2px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.3);
        }
        /*---------------------------------*/


        .sidebar.open {
            transform: translateX(0);
        }

        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid #334155;
        }

        .sidebar-header h4 {
            color: white;
            font-size: 1.2rem;
            margin: 0;
        }

        .sidebar-header h4 span {
            color: #ff0000;
        }

        .sidebar-menu {
            padding: 15px 0;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: #94a3b8;
            text-decoration: none;
            transition: 0.2s;
        }

        .sidebar-menu a i {
            width: 25px;
            margin-right: 10px;
        }

        .sidebar-menu a:hover {
            background: #334155;
            color: white;
        }

        .sidebar-menu a.active {
            background: #3b82f6;
            color: white;
        }

        /* Submenu untuk beranda*/
        .sidebar-submenu {
            display: none;
            background: #162032;
        }

        .sidebar-submenu a {
            padding: 9px 20px 9px 45px;
            font-size: 0.85rem;
        }

        .sidebar-menu .has-submenu {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: #94a3b8;
            text-decoration: none;
            transition: 0.2s;
            cursor: pointer;
            justify-content: space-between;
        }

        .sidebar-menu .has-submenu:hover {
            background: #334155;
            color: white;
        }

        .sidebar-menu .has-submenu.active {
            background: #3b82f6;
            color: white;
        }

        .has-submenu .arrow {
            transition: transform 0.2s;
            font-size: 0.7rem;
        }

        .has-submenu.open .arrow {
            transform: rotate(180deg);
        }

        .parent-row {
            display: flex;
            align-items: center;
            color: #94a3b8;
            transition: 0.2s;
        }

        .parent-row:hover {
            background: #334155;
            color: white;
        }

        .parent-row.active {
            background: #3b82f6;
            color: white;
        }

        .parent-row.active .arrow-btn {
            border-left: 1px solid rgba(255,255,255,0.2);
        }

        .parent-row.active .parent-link {
            color: white;
        }

        .parent-link {
            display: flex;
            align-items: center;
            flex: 1;
            padding: 12px 20px;
            color: inherit;
            text-decoration: none;
            font-size: inherit;
        }

        .parent-link:hover {
            color: white;
        }

        .arrow-btn {
            padding: 12px 14px;
            border-left: 1px solid rgba(255,255,255,0.08);
            cursor: pointer;
            color: inherit;
        }

        .arrow-btn .arr {
            transition: transform 0.2s;
            font-size: 0.7rem;
        }

        .arrow-btn.open .arr {
            transform: rotate(180deg);
        }

        /* Overlay */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 999;
            display: none;
        }

        .overlay.show {
            display: block;
        }

        /* Main Content */
        .main-content {
            padding: 15px;
        }

        /* Top Bar */
        .top-bar {
            background: white;
            border-radius: 12px;
            padding: 12px 15px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .menu-btn {
            background: #1e293b;
            border: none;
            color: white;
            padding: 8px 12px;
            border-radius: 8px;
            cursor: pointer;
        }

        .page-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin: 0;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-name {
            font-size: 0.85rem;
            display: none;
        }

        .logout-btn {
            background: #ef4444;
            border: none;
            padding: 6px 12px;
            border-radius: 8px;
            color: white;
            font-size: 0.75rem;
        }

        /* Cards */
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            border-left: 3px solid #3b82f6;
        }

        .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
        }

        .stat-label {
            font-size: 0.75rem;
            color: #666;
        }

        /* Table Card */
        .card-table {
            background: white;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .card-table h5 {
            font-size: 1rem;
            margin-bottom: 15px;
            font-weight: 600;
        }

        table {
            width: 100%;
            font-size: 0.8rem;
        }

        th {
            text-align: left;
            padding: 10px 0;
            color: #666;
            font-weight: 500;
            border-bottom: 1px solid #eee;
        }

        td {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .badge {
            padding: 3px 8px;
            border-radius: 20px;
            font-size: 0.7rem;
        }

        .badge-success {
            background: #10b981;
            color: white;
        }

        .badge-danger {
            background: #ef4444;
            color: white;
        }

        /* Quick Actions */
        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .action-btn {
            flex: 1;
            background: #f1f5f9;
            text-align: center;
            padding: 10px;
            border-radius: 10px;
            text-decoration: none;
            color: #333;
            font-size: 0.75rem;
        }

        .action-btn i {
            display: block;
            font-size: 1.2rem;
            margin-bottom: 5px;
        }

        /* Preview Image */
        .preview-img {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 8px;
        }

        /* Button */
        .btn-sm {
            padding: 5px 10px;
            font-size: 0.7rem;
            border-radius: 6px;
        }

        /* Responsive Tablet */
        @media (min-width: 768px) {
            .sidebar {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 260px;
                padding: 20px;
            }
            .menu-btn {
                display: none;
            }
            .user-name {
                display: inline;
            }
            .stat-card {
                margin-bottom: 0;
            }
            .stat-number {
                font-size: 2rem;
            }
        }

        /* Responsive Desktop */
        @media (min-width: 992px) {
            .stat-number {
                font-size: 2.2rem;
            }
        }
            /* ===== FIX PAGINATION ===== */
            .pagination {
                gap: 4px;
            }
            .pagination .page-link {
                border-radius: 8px !important;
                padding: 6px 12px;
                font-size: .85rem;
                color: #c6a43b;
                border-color: #e0d0b0;
            }
            .pagination .page-item.active .page-link {
                background: linear-gradient(135deg, #c6a43b, #e8c96a);
                border-color: transparent;
                color: white;
            }
            .pagination .page-link:hover {
                background: #fff8e0;
                color: #b8962e;
            }
            .pagination svg {
                width: 12px;
                height: 12px;
            }


    </style>

    @stack('styles')
</head>
<body>
    <!-- Overlay -->
    <div class="overlay" id="overlay" onclick="closeSidebar()"></div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h4>Geosite<span><br>Sibaganding</span></h4>
        </div>
        <div class="sidebar-menu">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>

            @php
            $berandaRoutes = ['admin.hero-slider.*','admin.fakta-unik.*','admin.warisan-geologi.*','admin.video-youtube.*'];
            $berandaActive = collect($berandaRoutes)->contains(fn($r) => request()->routeIs($r));
            @endphp

            <div class="sidebar-menu-group">
                <div class="has-submenu {{ $berandaActive ? 'active open' : '' }}" onclick="toggleSubmenu(this)">
                    <span>
                        <i class="fas fa-home" style="width:25px; margin-right:10px;"></i> Beranda
                    </span>
                    <i class="fas fa-chevron-down arrow"></i>
                </div>
                <div class="sidebar-submenu" style="{{ $berandaActive ? 'display:block;' : '' }}">
                    <a href="{{ route('admin.hero-slider.index') }}"
                    class="{{ request()->routeIs('admin.hero-slider.*') ? 'active' : '' }}">
                        <i class="fas fa-sliders-h"></i> Hero Slider
                    </a>
                    <a href="{{ route('admin.fakta-unik.index') }}"
                    class="{{ request()->routeIs('admin.fakta-unik.*') ? 'active' : '' }}">
                        <i class="fas fa-lightbulb"></i> Fakta Unik
                    </a>
                    <a href="{{ route('admin.warisan-geologi.index') }}"
                    class="{{ request()->routeIs('admin.warisan-geologi.*') ? 'active' : '' }}">
                        <i class="fas fa-mountain"></i> Warisan Geologi
                    </a>
                    <a href="{{ route('admin.video-youtube.index') }}"
                    class="{{ request()->routeIs('admin.video-youtube.*') ? 'active' : '' }}">
                        <i class="fab fa-youtube"></i> Video Youtube
                    </a>
                </div>
            </div>


            @php
                $informasiActive = (request()->routeIs('admin.informasi.*') && request('kategori') !== 'Pengurus') || request()->routeIs('admin.umkm.*') || request()->routeIs('admin.penginapan.*');
            @endphp

            <div class="sidebar-menu-group">
                <div class="parent-row {{ $informasiActive ? 'active' : '' }}">
                    <a href="{{ route('admin.informasi.index') }}" class="parent-link">
                        <i class="fas fa-info-circle" style="width:25px; margin-right:10px;"></i> Informasi
                    </a>
                    <div class="arrow-btn {{ $informasiActive ? 'open' : '' }}" onclick="toggleSubmenu(this)">
                        <i class="fas fa-chevron-down arr"></i>
                    </div>
                </div>
                <div class="sidebar-submenu" style="{{ $informasiActive ? 'display:block;' : '' }}">
                    <a href="{{ route('admin.umkm.index') }}"
                    class="{{ request()->routeIs('admin.umkm.*') ? 'active' : '' }}">
                        <i class="fas fa-store"></i> UMKM
                    </a>
                    <a href="{{ route('admin.penginapan.index') }}"
                    class="{{ request()->routeIs('admin.penginapan.*') ? 'active' : '' }}">
                        <i class="fas fa-hotel"></i> Hotel / Penginapan
                    </a>
                </div>
            </div>

            <a href="{{ route('admin.destinasi.index') }}" class="{{ request()->routeIs('admin.destinasi.*') ? 'active' : '' }}">
                <i class="fas fa-map-marked-alt"></i> Destinasi
            </a>


            <a href="{{ route('admin.galeri.index') }}" class="{{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">
                <i class="fas fa-images"></i> Galeri
            </a>
            <a href="{{ route('admin.berita.index') }}" class="{{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
                <i class="fas fa-newspaper"></i> Berita
            </a>

            @php
            $kontakActive = request()->routeIs('admin.pesan.*')
                || request()->routeIs('admin.kontak-info.*')
                || (request()->routeIs('admin.informasi.*') && request('kategori') === 'Pengurus');
            @endphp

            <div class="sidebar-menu-group">
                <div class="parent-row {{ $kontakActive ? 'active' : '' }}">
                    <a href="{{ route('admin.kontak-info.index') }}" class="parent-link">
                        <i class="fas fa-address-book" style="width:25px; margin-right:10px;"></i> Kontak
                    </a>
                    <div class="arrow-btn {{ $kontakActive ? 'open' : '' }}" onclick="toggleSubmenu(this)">
                        <i class="fas fa-chevron-down arr"></i>
                    </div>
                </div>
                <div class="sidebar-submenu" style="{{ $kontakActive ? 'display:block;' : '' }}">
                    <a href="{{ route('admin.kontak-info.index') }}"
                    class="{{ request()->routeIs('admin.kontak-info.*') ? 'active' : '' }}">
                        <i class="fas fa-address-book"></i> Info Kontak
                    </a>
                    <a href="{{ route('admin.informasi.index', ['kategori' => 'Pengurus']) }}"
                    class="{{ request()->routeIs('admin.informasi.*') && request('kategori') === 'Pengurus' ? 'active' : '' }}">
                        <i class="fas fa-users"></i> Pengurus
                    </a>
                    <a href="{{ route('admin.pesan.index') }}"
                    class="{{ request()->routeIs('admin.pesan.*') ? 'active' : '' }}">
                        <i class="fas fa-envelope"></i> Pesan Masuk
                    </a>
                </div>
            </div>

            <a href="{{ route('admin.page-header.index') }}" class="{{ request()->routeIs('admin.page-header.*') ? 'active' : '' }}">
                <i class="fas fa-heading"></i> Header Halaman
            </a>

        </div>
    </div>


    <!-- Main Content -->
    <div class="main-content">
        <div class="top-bar">
            <button class="menu-btn" id="menuBtn" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </button>
            <span class="page-title">@yield('title')</span>
            <div class="user-info">
                <span class="user-name">{{ Auth::user()->name ?? 'Admin' }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Keluar</button>
                </form>
            </div>
        </div>

        @yield('content')
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            sidebar.classList.toggle('open');
            overlay.classList.toggle('show');
        }

        function closeSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            sidebar.classList.remove('open');
            overlay.classList.remove('show');
        }

        function toggleSubmenu(el) {
            const submenu = el.closest('.sidebar-menu-group').querySelector('.sidebar-submenu');
            const isOpen = submenu.style.display === 'block';
            submenu.style.display = isOpen ? 'none' : 'block';
            el.classList.toggle('open', !isOpen);
        }

    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
