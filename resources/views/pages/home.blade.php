    @extends('layouts.app')

    @section('content')

<style>




    /* ==================== LOGO SECTION STYLE ==================== */
    .logo-container {
        position: fixed;
        top: 20px;
        left: 20px;
        z-index: 9999;
        display: flex;
        align-items: center;
        gap: 20px;
        background: rgba(0, 51, 102, 0.98);
        padding: 8px 24px;
        border-radius: 60px;
        backdrop-filter: blur(8px);
        box-shadow: 0 8px 25px rgba(0, 51, 102, 0.3);
        transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .logo-container:hover {
        background: #0a4a7a;
        box-shadow: 0 12px 30px rgba(0, 51, 102, 0.4);
        transform: translateY(-2px);
    }
    
    .flag-logo-wrapper {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .flag-img {
        width: 100px;
        height: auto;
        border-radius: 6px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.15);
        transition: transform 0.2s ease;
        border: 1px solid rgba(255,255,255,0.3);
    }
    
    .flag-img:hover {
        transform: scale(1.05);
    }
    
    .logo-divider {
        width: 2px;
        height: 35px;
        background: rgba(255,255,255,0.3);
        border-radius: 2px;
    }
    
    .del-logo-wrapper {
        display: flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    
    .del-logo-wrapper:hover {
        transform: scale(1.02);
    }
    
    .del-img {
        width: 50px;
        height: auto;
        border-radius: 8px;
        transition: transform 0.2s ease;
    }
    
    .del-img:hover {
        transform: scale(1.05);
    }
    
    .geotoba-wrapper {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .geotoba-text {
        font-size: 1.5rem;
        font-weight: 800;
        letter-spacing: 1px;
        color: white;
        font-family: 'Inter', 'Poppins', sans-serif;
        line-height: 1.2;
    }
    
    .geotoba-sub {
        font-size: 0.7rem;
        font-weight: 500;
        color: rgba(255,255,255,0.8);
        letter-spacing: 0.5px;
    }
    
    @media (max-width: 768px) {
        .logo-container {
            top: 12px;
            left: 12px;
            padding: 6px 18px;
            gap: 14px;
        }
        .flag-img {
            width: 60px;
        }
        .del-img {
            width: 35px;
        }
        .geotoba-text {
            font-size: 1.2rem;
        }
        .geotoba-sub {
            font-size: 0.6rem;
        }
        .logo-divider {
            height: 28px;
        }
    }
    
    @media (max-width: 576px) {
        .logo-container {
            padding: 5px 14px;
            gap: 10px;
        }
        .flag-img {
            width: 45px;
        }
        .del-img {
            width: 28px;
        }
        .geotoba-text {
            font-size: 0.9rem;
        }
        .geotoba-sub {
            font-size: 0.5rem;
        }
        .logo-divider {
            height: 24px;
        }
    }
    
   /* ==================== HERO SLIDER ==================== */
.hero-section {
    position: relative;
    height: 100vh;
    width: 100%;
    overflow: hidden;
}

.slides-container {
    position: relative;
    width: 100%;
    height: 100%;
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
    z-index: 1;
}

.slide.active {
    opacity: 1;
    z-index: 2;
    transform: scale(1);
}
.slide-1 { background-image: linear-gradient(rgba(0,36,65,0.58), rgba(0,36,65,0.58)), url('/images/sibaganding1.jpg'); }
.slide-2 { background-image: linear-gradient(rgba(0,36,65,0.58), rgba(0,36,65,0.58)), url('/images/sibaganding2.jpg'); }
.slide-3 { background-image: linear-gradient(rgba(0,36,65,0.58), rgba(0,36,65,0.58)), url('/images/sibaganding3.jpg'); }
.slide-4 { background-image: linear-gradient(rgba(0,36,65,0.58), rgba(0,36,65,0.58)), url('/images/sibaganding4.jpg'); }
.slide-5 { background-image: linear-gradient(rgba(0,36,65,0.58), rgba(0,36,65,0.58)), url('/images/sibaganding5.jpg'); }
.slide-6 { background-image: linear-gradient(rgba(0,36,65,0.58), rgba(0,36,65,0.58)), url('/images/sibaganding6.jpg'); }
.slide-7 { background-image: linear-gradient(rgba(0,36,65,0.58), rgba(0,36,65,0.58)), url('/images/sibaganding7.jpg'); }
.slide-8 { background-image: linear-gradient(rgba(0,36,65,0.58), rgba(0,36,65,0.58)), url('/images/sibaganding8.jpg'); }
.slide-9 { background-image: linear-gradient(rgba(0,36,65,0.58), rgba(0,36,65,0.58)), url('/images/sibaganding9.jpg'); }
.slide-10 { background-image: linear-gradient(rgba(0,36,65,0.58), rgba(0,36,65,0.58)), url('/images/sibaganding10.jpg'); }

.hero-content {
    position: absolute;
    top: 48%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 10;
    width: 100%;
    text-align: center;
    color: white;
}

.hero-subtitle {
    font-size: 1.15rem;
    letter-spacing: 0.55em;
    text-transform: uppercase;
    margin-bottom: 18px;
    font-weight: 500;
}

.hero-title {
    font-family: 'Cinzel', serif !important;
    font-size: 9.5rem;
    font-weight: 700;
    line-height: 0.95;
    margin: 0;
    text-align: center;
    letter-spacing: 12px;
    text-transform: uppercase;

    color: #fff8df !important;
    background: none !important;
    -webkit-text-fill-color: #fff8df !important;

    text-shadow:
        0 2px 0 rgba(170, 135, 55, 0.65),
        0 6px 12px rgba(0, 0, 0, 0.55),
        0 14px 30px rgba(0, 0, 0, 0.55);
}
.hero-divider {
    width: 130px;
    height: 3px;
    background: #c6a43b;
    margin: 24px auto 30px;
    position: relative;
}

.hero-divider::after {
    content: "✦";
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #c6a43b;
    font-size: 18px;
}

.hero-btn {
    display: inline-block;
    padding: 15px 46px;
    border-radius: 50px;
    background: linear-gradient(135deg, #e8b62f, #d49b1f);
    color: #062b40 !important;
    text-decoration: none !important;

    font-family: 'Poppins', sans-serif !important;
    font-size: 0.82rem !important;
    font-weight: 900 !important;
    letter-spacing: 4px !important;
    text-transform: uppercase !important;

    box-shadow:
        0 10px 24px rgba(0,0,0,0.28),
        inset 0 1px 0 rgba(255,255,255,0.35);
    transition: all 0.3s ease;
}

.hero-btn:hover {
    transform: translateY(-3px);
    background: linear-gradient(135deg, #ffd15a, #e4a927);
    color: #062b40 !important;
}
@media (max-width: 992px) {
    .hero-title {
        font-size: 6rem;
        letter-spacing: 8px;
    }
}

@media (max-width: 576px) {
    .hero-title {
        font-size: 3.2rem;
        letter-spacing: 4px;
    }

    .hero-subtitle {
        font-size: 0.7rem;
        letter-spacing: 0.35em;
    }
}
    .hero-btn:hover {
        background: white;
        color: #003366;
        transform: translateY(-3px);
        letter-spacing: 0.3em;
    }
    
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    /* Slider Dots */
    .slider-dots {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 12px;
        z-index: 15;
    }
    
    .dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.5);
        cursor: pointer;
        transition: all 0.4s ease;
    }
    
    .dot.active {
        background: #c6a43b;
        width: 28px;
        border-radius: 10px;
    }
    
    .dot:hover {
        background: #c6a43b;
    }
    
    /* Scroll Indicator */
    .scroll-indicator {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 15;
        animation: bounce 2.5s infinite;
        cursor: pointer;
        color: white;
        font-size: 0.65rem;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        opacity: 0.8;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
    }
    
    .scroll-indicator .line {
        width: 1px;
        height: 30px;
        background: white;
        margin-top: 5px;
    }
    
    @keyframes bounce {
        0%, 100% { transform: translateX(-50%) translateY(0); opacity: 0.8; }
        50% { transform: translateX(-50%) translateY(-10px); opacity: 0.4; }
    }

    
    
    /* ==================== SECTION UMUM ==================== */
    .section { padding: 90px 0; }
    .section-white { background: linear-gradient(135deg, #f0f7ff 0%, #e8f0fa 100%); }
    .section-light { background: linear-gradient(135deg, #e0ecf7 0%, #d4e4f2 100%); }
    .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
    
    .section-title {
        text-align: center;
        margin-bottom: 60px;
    }
    .section-title h2 {
        font-size: 2.2rem;
        font-family: 'Cormorant Garamond', serif;
        font-weight: 500;
        margin-bottom: 15px;
        color: #003366;
    }
    .section-title .divider {
        width: 50px;
        height: 2px;
        background: #c6a43b;
        margin: 0 auto;
    }
    .section-title p {
        color: #2c5f8a;
        max-width: 550px;
        margin: 20px auto 0;
        font-size: 0.85rem;
        line-height: 1.6;
    }
    
    /* ==================== STATS ==================== */
    .stats-grid {
        display: flex;
        justify-content: space-between;
        text-align: center;
        flex-wrap: wrap;
        gap: 40px;
    }
    .stat-item { 
        flex: 1; 
        min-width: 100px; 
        transition: transform 0.3s ease;
        padding: 20px;
        background: rgba(0, 51, 102, 0.05);
        border-radius: 16px;
    }
    .stat-item:hover { 
        transform: translateY(-5px);
        background: rgba(0, 51, 102, 0.1);
    }
    .stat-number {
        font-size: 2.5rem;
        font-family: 'Cormorant Garamond', serif;
        font-weight: 600;
        color: #c6a43b;
        margin-bottom: 8px;
    }
    .stat-label {
        font-size: 0.65rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: #003366;
        font-weight: 600;
    }
    
  /* ==================== ABOUT / WARISAN GEOLOGI ==================== */
.about-story {
    padding: 110px 0;
    background:
        radial-gradient(circle at 12% 18%, rgba(198, 164, 59, 0.14), transparent 28%),
        linear-gradient(180deg, #eaf4ff 0%, #f3f8fc 100%);
    position: relative;
    overflow: hidden;
}

.about-story::before {
    content: "";
    position: absolute;
    width: 420px;
    height: 420px;
    right: -160px;
    top: 80px;
    border-radius: 50%;
    background: rgba(0, 51, 102, 0.06);
}

.about-grid {
    display: grid;
    grid-template-columns: 1fr 1.05fr;
    gap: 70px;
    align-items: center;
    position: relative;
    z-index: 2;
}

.about-kicker {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    color: #c6a43b;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    margin-bottom: 18px;
}

.about-kicker::before {
    content: "";
    width: 42px;
    height: 2px;
    background: #c6a43b;
}

.about-content h3 {
    font-size: 2.75rem;
    font-family: 'Cormorant Garamond', serif;
    font-weight: 600;
    margin-bottom: 22px;
    line-height: 1.15;
    color: #003366;
}

.about-lead {
    color: #2c5f8a;
    line-height: 1.9;
    margin-bottom: 20px;
    font-size: 1rem;
}

.about-content p {
    color: #406d92;
    line-height: 1.85;
    margin-bottom: 18px;
    font-size: 0.92rem;
}

.story-points {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 14px;
    margin-top: 30px;
}

.story-point {
    background: rgba(255,255,255,0.72);
    border: 1px solid rgba(0, 51, 102, 0.08);
    border-radius: 18px;
    padding: 18px 16px;
    box-shadow: 0 14px 35px rgba(0, 51, 102, 0.08);
}

.story-point span {
    display: block;
    color: #c6a43b;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.18em;
    margin-bottom: 8px;
}

.story-point strong {
    color: #003366;
    font-size: 0.9rem;
    line-height: 1.4;
}

.story-slider {
    position: relative;
    min-height: 430px;
    border-radius: 34px;
    overflow: hidden;
    box-shadow: 0 35px 90px rgba(0, 51, 102, 0.22);
    border: 10px solid rgba(255,255,255,0.58);
    background: #dce9f4;
}

.story-slide {
    position: absolute;
    inset: 0;
    opacity: 0;
    visibility: hidden;
    transform: scale(1.04);
    transition: opacity 0.8s ease, visibility 0.8s ease, transform 1.2s ease;
}

.story-slide.active {
    opacity: 1;
    visibility: visible;
    transform: scale(1);
    z-index: 2;
}

.story-slide img {
    width: 100%;
    height: 100%;
    min-height: 430px;
    object-fit: cover;
    display: block;
}

.story-slide::after {
    content: "";
    position: absolute;
    inset: 0;
    z-index: 2;
    background: linear-gradient(
        180deg,
        rgba(0, 35, 70, 0.02) 0%,
        rgba(0, 35, 70, 0.25) 45%,
        rgba(0, 35, 70, 0.90) 100%
    );
}

.slide-overlay {
    position: absolute;
    left: 34px;
    right: 34px;
    bottom: 48px;
    z-index: 10;
    color: #fff;
    display: block;
}

.slide-overlay small {
    display: inline-block;
    color: #e7c24a;
    font-size: 0.7rem;
    font-weight: 800;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    margin-bottom: 12px;
}

.slide-overlay h4 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2rem;
    line-height: 1.15;
    color: #ffffff;
    margin-bottom: 12px;
    max-width: 620px;
    text-shadow: 0 3px 12px rgba(0,0,0,0.45);
}

.slide-overlay p {
    max-width: 650px;
    color: rgba(255,255,255,0.9);
    font-size: 0.92rem;
    line-height: 1.75;
    margin: 0;
    text-shadow: 0 2px 8px rgba(0,0,0,0.35);
}

.geo-badge {
    position: absolute;
    left: 32px;
    bottom: 42px;
    z-index: 5;
    color: white;
    max-width: 76%;
}

.geo-badge small {
    display: inline-block;
    color: #e7c24a;
    font-size: 0.68rem;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    margin-bottom: 10px;
    font-weight: 700;
}

.geo-badge h4 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.95rem;
    line-height: 1.15;
    margin: 0;
    color: #fff;
}

.float-card {
    position: absolute;
    right: 28px;
    top: 34px;
    width: 225px;
    padding: 24px;
    border-radius: 24px;
    background: rgba(255,255,255,0.9);
    backdrop-filter: blur(14px);
    box-shadow: 0 25px 60px rgba(0, 51, 102, 0.18);
    border: 1px solid rgba(255,255,255,0.9);
    z-index: 6;
}

.float-card .big {
    display: block;
    font-family: 'Cormorant Garamond', serif;
    color: #003366;
    font-size: 2.7rem;
    font-weight: 700;
    line-height: 1;
}

.float-card .text {
    display: block;
    color: #456f93;
    font-size: 0.82rem;
    line-height: 1.55;
    margin-top: 9px;
}

.story-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 8;
    width: 44px;
    height: 44px;
    border-radius: 50%;
    border: 1px solid rgba(255,255,255,0.55);
    background: rgba(0, 51, 102, 0.48);
    color: #fff;
    font-size: 1.35rem;
    cursor: pointer;
    backdrop-filter: blur(10px);
    transition: all 0.25s ease;
}

.story-nav:hover {
    background: #c6a43b;
    color: #003366;
    transform: translateY(-50%) scale(1.08);
}

.story-nav.prev {
    left: 22px;
}

.story-nav.next {
    right: 22px;
}

.story-dots {
    position: absolute;
    left: 50%;
    bottom: 18px;
    transform: translateX(-50%);
    display: flex;
    gap: 9px;
    z-index: 9;
}

.story-dots button {
    width: 9px;
    height: 9px;
    border-radius: 50%;
    border: none;
    background: rgba(255,255,255,0.48);
    cursor: pointer;
    transition: all 0.25s ease;
}

.story-dots button.active {
    width: 28px;
    border-radius: 20px;
    background: #c6a43b;
}

@media (max-width: 768px) {
    .story-slider {
        min-height: 360px;
        border-radius: 24px;
    }

    .story-slide img {
        min-height: 360px;
    }

    .geo-badge {
        left: 22px;
        bottom: 48px;
        max-width: 82%;
    }

    .geo-badge h4 {
        font-size: 1.45rem;
    }

    .float-card {
        width: 180px;
        right: 18px;
        top: 18px;
        padding: 18px;
    }

    .float-card .big {
        font-size: 2rem;
    }

    .story-nav {
        width: 38px;
        height: 38px;
        font-size: 1rem;
    }
}

.timeline-mini {
    margin-top: 26px;
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.timeline-mini div {
    display: flex;
    gap: 14px;
    align-items: flex-start;
}

.timeline-mini i {
    width: 11px;
    height: 11px;
    border-radius: 50%;
    background: #c6a43b;
    margin-top: 6px;
    box-shadow: 0 0 0 7px rgba(198, 164, 59, 0.15);
    flex-shrink: 0;
}

.timeline-mini p {
    margin: 0;
    color: #315f84;
    font-size: 0.88rem;
    line-height: 1.65;
}

@media (max-width: 992px) {
    .about-grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }

    .float-card {
        right: 18px;
    }
}

@media (max-width: 768px) {
    .about-story {
        padding: 75px 0;
    }

    .about-content h3 {
        font-size: 2rem;
    }

    .story-points {
        grid-template-columns: 1fr;
    }

    .about-image,
    .about-image img {
        min-height: 340px;
    }

    .float-card {
        position: relative;
        right: auto;
        top: auto;
        width: 100%;
        margin-top: 18px;
    }
}
    
    /* ==================== DESTINASI ==================== */
    .destinasi-list { display: flex; flex-direction: column; gap: 80px; }
    .destinasi-item {
        display: flex;
        align-items: center;
        gap: 60px;
        flex-wrap: wrap;
    }
    .destinasi-item.reverse { flex-direction: row-reverse; }
    .destinasi-image {
        flex: 1;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 51, 102, 0.15);
        transition: all 0.5s ease;
    }
    .destinasi-image:hover { transform: scale(1.02); box-shadow: 0 20px 40px rgba(0, 51, 102, 0.25); }
    .destinasi-image img { width: 100%; height: auto; display: block; transition: transform 0.5s ease; }
    .destinasi-content { flex: 1; }
    .destinasi-number {
        font-size: 0.7rem;
        letter-spacing: 0.2em;
        color: #c6a43b;
        margin-bottom: 12px;
        text-transform: uppercase;
        font-weight: 600;
    }
    .destinasi-content h3 {
        font-size: 2rem;
        font-family: 'Cormorant Garamond', serif;
        font-weight: 500;
        margin-bottom: 15px;
        color: #003366;
    }
    .destinasi-location {
        font-size: 0.7rem;
        letter-spacing: 0.1em;
        color: #2c5f8a;
        margin-bottom: 20px;
        text-transform: uppercase;
        font-weight: 500;
    }
    .destinasi-desc {
        color: #2c5f8a;
        line-height: 1.8;
        margin-bottom: 25px;
        font-size: 0.9rem;
    }
    .destinasi-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 30px;
    }
    .destinasi-tags span {
        background: rgba(0, 51, 102, 0.1);
        padding: 5px 16px;
        font-size: 0.7rem;
        color: #003366;
        border-radius: 30px;
        transition: all 0.3s ease;
        cursor: pointer;
        font-weight: 500;
    }
    .destinasi-tags span:hover {
        background: #c6a43b;
        color: #003366;
        transform: translateY(-2px);
    }
    .destinasi-link {
        display: inline-block;
        border: 1px solid #c6a43b;
        color: #c6a43b;
        padding: 10px 28px;
        font-size: 0.7rem;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        text-decoration: none;
        transition: all 0.4s ease;
        border-radius: 40px;
        background: transparent;
    }
    .destinasi-link:hover {
        background: #c6a43b;
        color: #003366;
        letter-spacing: 0.2em;
        transform: translateY(-2px);
    }
    
    /* ==================== GALLERY ==================== */
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 3px;
    }
    .gallery-item {
        position: relative;
        aspect-ratio: 1/1;
        overflow: hidden;
        cursor: pointer;
    }
    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    .gallery-item:hover img { transform: scale(1.05); }
    .gallery-item::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 51, 102, 0.5);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .gallery-item:hover::after { opacity: 1; }
    
    /* ==================== CTA ==================== */
    .cta-section {
        background: linear-gradient(135deg, #003366 0%, #0a4a7a 50%, #005c8a 100%);
        padding: 80px 0;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .cta-section::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%);
        animation: rotate 20s linear infinite;
    }
    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    .cta-content { 
        max-width: 600px; 
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }
    .cta-content h3 {
        font-size: 2rem;
        font-family: 'Cormorant Garamond', serif;
        font-weight: 500;
        margin-bottom: 20px;
        color: white;
    }
    .cta-content .divider {
        width: 50px;
        height: 2px;
        background: #c6a43b;
        margin: 0 auto 25px;
    }
    .cta-content p {
        color: rgba(255, 255, 255, 0.8);
        margin-bottom: 35px;
        font-size: 0.9rem;
        line-height: 1.7;
    }
    .cta-btn {
        display: inline-block;
        background: #c6a43b;
        color: #003366;
        padding: 14px 42px;
        font-size: 0.75rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        transition: all 0.4s ease;
        text-decoration: none;
        border-radius: 40px;
        font-weight: 600;
    }
    .cta-btn:hover {
        background: white;
        color: #003366;
        transform: translateY(-3px);
    }
    
    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 992px) {
        .hero-title { font-size: 2.8rem; }
        .destinasi-item, .destinasi-item.reverse { flex-direction: column; gap: 30px; }
        .about-grid { flex-direction: column; text-align: center; }
        .gallery-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 768px) {
        .hero-title { font-size: 2rem; }
        .hero-subtitle { font-size: 0.6rem; letter-spacing: 0.2em; }
        .hero-btn { padding: 10px 28px; font-size: 0.65rem; }
        .section { padding: 60px 0; }
        .section-title h2 { font-size: 1.6rem; }
        .destinasi-content h3 { font-size: 1.6rem; }
        .stats-grid { flex-direction: column; align-items: center; gap: 25px; }
        .stat-number { font-size: 2rem; }
        .about-content h3 { font-size: 1.6rem; }
        .cta-content h3 { font-size: 1.6rem; }
        .cta-btn { padding: 10px 28px; font-size: 0.65rem; }
    }
    @media (max-width: 480px) {
        .hero-title { font-size: 1.6rem; }
        .hero-subtitle { font-size: 0.5rem; letter-spacing: 0.15em; }
        .dot { width: 8px; height: 8px; }
        .dot.active { width: 20px; }
    }

   /* ==================== INTERACTIVE MAP / FAKTA UNIK ==================== */
.map-section {
    padding: 95px 0 110px;
    background:
        radial-gradient(circle at 15% 20%, rgba(232, 182, 47, 0.12), transparent 28%),
        linear-gradient(180deg, #eef6ff 0%, #e7f1fb 100%);
    position: relative;
    overflow: hidden;
}

.map-section .section-title {
    text-align: center;
    margin-bottom: 55px;
}

.map-section .section-title h2 {
    font-family: 'Cinzel', serif;
    font-size: 2.6rem;
    color: #073b63;
    letter-spacing: 2px;
    margin-bottom: 12px;
}

.map-section .section-title p {
    color: #456f93;
    font-size: 1rem;
}

.map-layout {
    display: grid;
    grid-template-columns: minmax(0, 1.4fr) 420px;
    gap: 35px;
    align-items: center;
}

.map-wrapper {
    position: relative;
    width: 100%;
    max-width: 980px;
    margin: 0 auto;
    padding: 22px;
    border-radius: 32px;
    background: rgba(255, 255, 255, 0.55);
    box-shadow: 0 30px 80px rgba(7, 59, 99, 0.13);
    border: 1px solid rgba(255,255,255,0.75);
    backdrop-filter: blur(14px);
}

.map-img {
    width: 100%;
    display: block;
    border-radius: 26px;
    filter: drop-shadow(0 18px 28px rgba(7, 59, 99, 0.14));
}

.map-point {
    position: absolute;
    width: 24px;
    height: 24px;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    background: #e8b62f;
    box-shadow:
        0 0 0 7px rgba(232,182,47,0.28),
        0 0 0 14px rgba(232,182,47,0.12),
        0 10px 22px rgba(7, 59, 99, 0.25);
    z-index: 6;
    transform: translate(-50%, -50%);
    transition: all 0.25s ease;
}

.map-point::before {
    content: "";
    position: absolute;
    inset: 5px;
    border-radius: 50%;
    background: #fff;
}

.map-point::after {
    content: "";
    position: absolute;
    inset: -10px;
    border-radius: 50%;
    border: 1px solid rgba(232,182,47,0.55);
    animation: mapPulse 1.8s infinite;
}

.map-point:hover,
.map-point.active {
    transform: translate(-50%, -50%) scale(1.22);
    background: #073b63;
    box-shadow:
        0 0 0 8px rgba(7, 59, 99, 0.18),
        0 0 0 16px rgba(232,182,47,0.13),
        0 15px 28px rgba(7, 59, 99, 0.35);
}

@keyframes mapPulse {
    0% { transform: scale(0.7); opacity: 0.9; }
    100% { transform: scale(1.45); opacity: 0; }
}

/* Atur posisi 6 titik di sini */
.point-1 { top: 35%; left: 38%; }
.point-2 { top: 49%; left: 52%; }
.point-3 { top: 63%; left: 47%; }
.point-4 { top: 42%; left: 66%; }
.point-5 { top: 58%; left: 32%; }
.point-6 { top: 29%; left: 56%; }

.map-info-card {
    min-height: 390px;
    padding: 34px;
    border-radius: 30px;
    background:
        linear-gradient(145deg, rgba(7, 59, 99, 0.96), rgba(2, 33, 58, 0.96));
    color: #fff;
    box-shadow: 0 28px 70px rgba(7, 59, 99, 0.28);
    border: 1px solid rgba(255,255,255,0.15);
    position: relative;
    overflow: hidden;
}

.map-info-card::before {
    content: "";
    position: absolute;
    width: 190px;
    height: 190px;
    border-radius: 50%;
    right: -65px;
    top: -70px;
    background: rgba(232, 182, 47, 0.17);
}

.map-info-label {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 9px 15px;
    border-radius: 40px;
    background: rgba(232, 182, 47, 0.16);
    color: #e8b62f;
    font-size: 0.76rem;
    font-weight: 700;
    letter-spacing: 1.4px;
    text-transform: uppercase;
    margin-bottom: 22px;
}

.map-info-number {
    font-family: 'Cinzel', serif;
    font-size: 4.2rem;
    line-height: 1;
    color: rgba(232, 182, 47, 0.35);
    margin-bottom: 6px;
}

.map-info-card h3 {
    font-family: 'Cinzel', serif;
    font-size: 1.85rem;
    line-height: 1.25;
    color: #fff8df;
    margin-bottom: 16px;
}

.map-info-card p {
    color: rgba(255,255,255,0.82);
    line-height: 1.85;
    font-size: 0.98rem;
    margin-bottom: 22px;
}

.map-info-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.map-info-tags span {
    padding: 7px 13px;
    border-radius: 30px;
    background: rgba(255,255,255,0.12);
    color: rgba(255,255,255,0.9);
    font-size: 0.78rem;
}

.map-hint {
    margin-top: 16px;
    color: #5d7f9d;
    font-size: 0.88rem;
    text-align: center;
}

/* Responsive */
@media (max-width: 992px) {
    .map-layout {
        grid-template-columns: 1fr;
    }

    .map-info-card {
        min-height: auto;
    }
}

@media (max-width: 576px) {
    .map-section {
        padding: 70px 0;
    }

    .map-section .section-title h2 {
        font-size: 1.8rem;
    }

    .map-wrapper {
        padding: 12px;
        border-radius: 22px;
    }

    .map-img {
        border-radius: 18px;
    }

    .map-point {
        width: 18px;
        height: 18px;
    }

    .map-info-card {
        padding: 26px;
        border-radius: 24px;
    }

    .map-info-number {
        font-size: 3.1rem;
    }

    .map-info-card h3 {
        font-size: 1.45rem;
    }
}

/* ==================== TIGA PILAR SIBAGANDING ==================== */
.pilar-section {
    padding: 110px 0;
    background:
        radial-gradient(circle at 12% 20%, rgba(198, 164, 59, 0.10), transparent 28%),
        radial-gradient(circle at 90% 50%, rgba(0, 51, 102, 0.08), transparent 30%),
        linear-gradient(180deg, #f3f8fc 0%, #eaf3fb 100%);
    position: relative;
    overflow: hidden;
}

.pilar-title {
    margin-bottom: 80px;
}

.pilar-kicker {
    display: inline-block;
    margin-bottom: 14px;
    color: #c6a43b;
    font-size: 0.72rem;
    font-weight: 800;
    letter-spacing: 0.22em;
    text-transform: uppercase;
}

.pilar-title h2 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2.9rem;
    color: #003366;
    letter-spacing: 0.08em;
}

.pilar-list {
    display: flex;
    flex-direction: column;
    gap: 95px;
}

.pilar-item {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 70px;
    align-items: center;
}

.pilar-item.reverse {
    direction: rtl;
}

.pilar-item.reverse > * {
    direction: ltr;
}

.pilar-image {
    position: relative;
    height: 360px;
    border-radius: 34px;
    overflow: hidden;
    background: rgba(255,255,255,0.45);
    border: 10px solid rgba(255,255,255,0.65);
    box-shadow: 0 28px 70px rgba(0, 51, 102, 0.16);
}

.pilar-image::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(
        180deg,
        rgba(0, 51, 102, 0.04),
        rgba(0, 51, 102, 0.20)
    );
}

.pilar-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.7s ease;
}

.pilar-image:hover img {
    transform: scale(1.08);
}

.pilar-content {
    position: relative;
}

.pilar-number {
    color: #c6a43b;
    font-size: 0.72rem;
    font-weight: 800;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    margin-bottom: 16px;
}

.pilar-content h3 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2.65rem;
    line-height: 1.1;
    color: #003366;
    margin-bottom: 12px;
}

.pilar-location {
    color: #2c5f8a;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    margin-bottom: 24px;
}

.pilar-content p {
    color: #406d92;
    line-height: 1.9;
    font-size: 0.96rem;
    max-width: 620px;
    margin-bottom: 26px;
}

.pilar-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 30px;
}

.pilar-tags span {
    padding: 8px 16px;
    border-radius: 30px;
    background: rgba(0, 51, 102, 0.09);
    color: #003366;
    font-size: 0.74rem;
    font-weight: 600;
}

.pilar-link {
    display: inline-block;
    padding: 12px 34px;
    border-radius: 40px;
    border: 1px solid #c6a43b;
    color: #c6a43b;
    text-decoration: none;
    font-size: 0.72rem;
    font-weight: 800;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    transition: all 0.3s ease;
}

.pilar-link:hover {
    background: #c6a43b;
    color: #003366;
    transform: translateY(-3px);
}

@media (max-width: 992px) {
    .pilar-item,
    .pilar-item.reverse {
        grid-template-columns: 1fr;
        gap: 34px;
        direction: ltr;
    }

    .pilar-image {
        height: 320px;
    }
}

@media (max-width: 576px) {
    .pilar-section {
        padding: 75px 0;
    }

    .pilar-title h2 {
        font-size: 2rem;
    }

    .pilar-content h3 {
        font-size: 2rem;
    }

    .pilar-image {
        height: 260px;
        border-radius: 24px;
    }
}

/* ==================== GALLERY SLIDER ==================== */
.gallery-section {
    padding: 110px 0;
    background:
        radial-gradient(circle at 20% 20%, rgba(198, 164, 59, 0.10), transparent 26%),
        linear-gradient(180deg, #eaf4ff 0%, #dcecf8 100%);
    overflow: hidden;
}

.gallery-slider {
    position: relative;
    margin-top: 55px;
    overflow: hidden;
    border-radius: 34px;
    padding: 12px;
}

.gallery-track {
    display: flex;
    gap: 24px;
    transition: transform 0.7s ease;
}

.gallery-card {
    min-width: calc((100% - 48px) / 3);
    height: 430px;
    position: relative;
    overflow: hidden;
    border-radius: 28px;
    background: #dce9f4;
    box-shadow: 0 25px 65px rgba(0, 51, 102, 0.16);
    border: 8px solid rgba(255,255,255,0.58);
}

.gallery-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.8s ease;
}

.gallery-card:hover img {
    transform: scale(1.08);
}

.gallery-card::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(
        180deg,
        rgba(0, 35, 70, 0.02) 0%,
        rgba(0, 35, 70, 0.18) 45%,
        rgba(0, 35, 70, 0.82) 100%
    );
}

.gallery-caption {
    position: absolute;
    left: 26px;
    right: 26px;
    bottom: 24px;
    z-index: 3;
    color: #fff;
}

.gallery-caption span {
    color: #e7c24a;
    font-size: 0.72rem;
    font-weight: 800;
    letter-spacing: 0.22em;
}

.gallery-caption h4 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.7rem;
    margin-top: 8px;
    color: #fff;
    line-height: 1.15;
}

/* tombol geser kecil, tidak menutupi gambar */
.gallery-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
    width: 44px;
    height: 44px;
    border-radius: 50%;
    border: 2px solid rgba(255,255,255,0.9);
    background: rgba(6, 59, 92, 0.86);
    color: #fff;
    font-size: 1.05rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 12px 28px rgba(0, 51, 102, 0.24);
    transition: all 0.25s ease;
}

.gallery-arrow:hover {
    background: #c6a43b;
    color: #003366;
    transform: translateY(-50%) scale(1.07);
}

.gallery-prev {
    left: 24px;
}

.gallery-next {
    right: 24px;
}

.gallery-dots {
    display: flex;
    justify-content: center;
    gap: 9px;
    margin-top: 28px;
}

.gallery-dots button {
    width: 9px;
    height: 9px;
    border-radius: 50%;
    border: none;
    background: rgba(0, 51, 102, 0.25);
    cursor: pointer;
    transition: all 0.25s ease;
}

.gallery-dots button.active {
    width: 30px;
    border-radius: 20px;
    background: #c6a43b;
}

@media (max-width: 992px) {
    .gallery-card {
        min-width: calc((100% - 24px) / 2);
        height: 370px;
    }
}

@media (max-width: 576px) {
    .gallery-section {
        padding: 75px 0;
    }

    .gallery-card {
        min-width: 100%;
        height: 330px;
    }

    .gallery-arrow {
        width: 38px;
        height: 38px;
        font-size: 0.9rem;
    }

    .gallery-prev {
        left: 18px;
    }

    .gallery-next {
        right: 18px;
    }

    .gallery-caption h4 {
        font-size: 1.35rem;
    }
}

/* ==================== ADVENTURE / VIDEO / NEWS ==================== */
.adventure-section {
    padding: 115px 0 90px;
    background:
        radial-gradient(circle at 18% 20%, rgba(198, 164, 59, 0.13), transparent 28%),
        linear-gradient(180deg, #eaf4ff 0%, #f4f8fc 100%);
    overflow: hidden;
}

.adventure-hero {
    max-width: 760px;
    margin: 0 auto 75px;
    text-align: center;
}

.adventure-kicker {
    display: inline-block;
    color: #c6a43b;
    font-size: 0.72rem;
    font-weight: 800;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    margin-bottom: 14px;
}

.adventure-hero h2,
.video-heading h3,
.news-header h3,
.explore-box h3 {
    font-family: 'Cormorant Garamond', serif;
    color: #003366;
    line-height: 1.1;
}

.adventure-hero h2 {
    font-size: 3rem;
    margin-bottom: 16px;
}

.adventure-hero p {
    color: #406d92;
    line-height: 1.85;
    font-size: 0.98rem;
}

.video-story {
    position: relative;
}

.video-heading {
    display: flex;
    justify-content: space-between;
    gap: 40px;
    margin-bottom: 35px;
}

.video-heading h3 {
    font-size: 2.35rem;
    margin-bottom: 12px;
}

.video-heading p {
    max-width: 680px;
    color: #406d92;
    line-height: 1.75;
    font-size: 0.94rem;
}

.video-slider,
.news-slider {
    position: relative;
    overflow: hidden;
    border-radius: 34px;
}

.video-track {
    display: flex;
    gap: 26px;
    transition: transform 0.7s ease;
}

.video-card {
    min-width: 100%;
    display: grid;
    grid-template-columns: 1.25fr 0.75fr;
    gap: 0;
    border-radius: 34px;
    overflow: hidden;
    background: #073b63;
    box-shadow: 0 30px 80px rgba(0, 51, 102, 0.18);
    border: 10px solid rgba(255,255,255,0.65);
}

.video-frame {
    min-height: 420px;
    background: #001d33;
}

.video-frame iframe {
    width: 100%;
    height: 100%;
    min-height: 420px;
    border: none;
    display: block;
}

.video-info {
    padding: 42px;
    background:
        radial-gradient(circle at 95% 5%, rgba(198, 164, 59, 0.18), transparent 36%),
        linear-gradient(145deg, #073b63, #03243d);
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.video-info span {
    color: #c6a43b;
    font-size: 0.75rem;
    font-weight: 800;
    letter-spacing: 0.24em;
    margin-bottom: 18px;
}

.video-info h4 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2.2rem;
    line-height: 1.15;
    color: #fff8df;
    margin-bottom: 18px;
}

.video-info p {
    color: rgba(255,255,255,0.78);
    line-height: 1.8;
    font-size: 0.95rem;
}

.video-arrow,
.news-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 20;
    width: 42px;
    height: 42px;
    border-radius: 50%;
    border: 2px solid rgba(255,255,255,0.95);
    background: rgba(6, 59, 92, 0.88);
    color: white;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all .25s ease;
    box-shadow: 0 12px 28px rgba(0,51,102,.22);
}

.video-arrow:hover,
.news-arrow:hover {
    background: #c6a43b;
    color: #003366;
}

.video-prev,
.news-prev {
    left: 22px;
}

.video-next,
.news-next {
    right: 22px;
}

.video-mini-list {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 28px;
}

.video-mini-list button {
    border: none;
    border-radius: 30px;
    padding: 8px 16px;
    background: rgba(0, 51, 102, 0.12);
    color: #003366;
    font-size: 0.72rem;
    font-weight: 800;
    cursor: pointer;
    transition: all .25s ease;
}

.video-mini-list button.active {
    background: #c6a43b;
    color: #003366;
}

/* NEWS */
.news-preview-section {
    padding: 100px 0;
    background: linear-gradient(180deg, #f4f8fc 0%, #e8f2fb 100%);
    overflow: hidden;
}

.news-header {
    display: flex;
    justify-content: space-between;
    align-items: end;
    gap: 35px;
    margin-bottom: 42px;
}

.news-header h3 {
    font-size: 2.45rem;
    margin-bottom: 12px;
}

.news-header p {
    color: #406d92;
    line-height: 1.75;
    max-width: 620px;
}

.news-more {
    white-space: nowrap;
    padding: 12px 28px;
    border-radius: 40px;
    border: 1px solid #c6a43b;
    color: #c6a43b;
    text-decoration: none;
    font-size: 0.72rem;
    font-weight: 800;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    transition: all .25s ease;
}

.news-more:hover {
    background: #c6a43b;
    color: #003366;
}

.news-track {
    display: flex;
    gap: 24px;
    transition: transform .7s ease;
}

.news-card {
    min-width: calc((100% - 48px) / 3);
    border-radius: 28px;
    overflow: hidden;
    background: white;
    box-shadow: 0 24px 60px rgba(0, 51, 102, 0.13);
    border: 1px solid rgba(0, 51, 102, 0.06);
}

.news-card img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    display: block;
}

.news-content {
    padding: 26px;
}

.news-content span {
    color: #c6a43b;
    font-size: 0.7rem;
    font-weight: 800;
    letter-spacing: 0.16em;
    text-transform: uppercase;
}

.news-content h4 {
    font-family: 'Cormorant Garamond', serif;
    color: #003366;
    font-size: 1.55rem;
    line-height: 1.2;
    margin: 12px 0;
}

.news-content p {
    color: #406d92;
    line-height: 1.7;
    font-size: 0.88rem;
    margin-bottom: 18px;
}

.news-content a {
    color: #c6a43b;
    text-decoration: none;
    font-size: 0.72rem;
    font-weight: 800;
    letter-spacing: 0.12em;
    text-transform: uppercase;
}

/* EXPLORE */
.explore-section {
    padding: 90px 0 110px;
    background: linear-gradient(135deg, #073b63, #03243d);
}

.explore-box {
    max-width: 820px;
    margin: 0 auto;
    text-align: center;
    padding: 60px 40px;
    border-radius: 34px;
    background:
        radial-gradient(circle at 50% 0%, rgba(198, 164, 59, 0.18), transparent 42%),
        rgba(255,255,255,0.06);
    border: 1px solid rgba(255,255,255,0.12);
    box-shadow: 0 28px 80px rgba(0,0,0,0.18);
}

.explore-box h3 {
    color: #fff8df;
    font-size: 2.8rem;
    margin-bottom: 18px;
}

.explore-box p {
    color: rgba(255,255,255,0.78);
    line-height: 1.8;
    max-width: 650px;
    margin: 0 auto 34px;
}

.explore-btn {
    display: inline-block;
    padding: 14px 42px;
    border-radius: 45px;
    background: #c6a43b;
    color: #003366;
    text-decoration: none;
    font-size: 0.75rem;
    font-weight: 900;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    transition: all .25s ease;
}

.explore-btn:hover {
    background: #fff8df;
    transform: translateY(-3px);
}

@media (max-width: 992px) {
    .video-card {
        grid-template-columns: 1fr;
    }

    .news-card {
        min-width: calc((100% - 24px) / 2);
    }

    .news-header {
        flex-direction: column;
        align-items: flex-start;
    }
}

@media (max-width: 576px) {
    .adventure-hero h2,
    .explore-box h3 {
        font-size: 2rem;
    }

    .video-heading h3,
    .news-header h3 {
        font-size: 1.8rem;
    }

    .video-frame,
    .video-frame iframe {
        min-height: 260px;
    }

    .video-info {
        padding: 28px;
    }

    .video-info h4 {
        font-size: 1.55rem;
    }

    .news-card {
        min-width: 100%;
    }
}
</style>

    <!-- ==================== LOGO SECTION ==================== -->
    <div class="logo-container">
        
        <!-- Gambr logo del -->
        <div class="flag-logo-wrapper">
                <img src="data:image/jpeg;base64,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" 
                alt="Bendera Indonesia" 
                class="flag-img"
                title="DEL>
        </div>
        
        <div class="logo-divider"></div>
        
        <!-- [GANTI_LINK_DEL] - Ganti dengan link gambar logo D EL -->
        <div class="del-logo-wrapper">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcThY4yORALIvsjHi1T6lhDZogLcYcnjLfSZPQ&s"
                class="del-img"
                title="GEOTOBA">
        </div>
        
        <div class="logo-divider"></div>
        
        <!-- LOGO GEOTOBA -->
        <div class="geotoba-wrapper">
            <div style="display: flex; flex-direction: column; line-height: 1.2;">
                <span class="geotoba-text">GEOTOBA</span>
                <span class="geotoba-sub">Geopark Danau Toba</span>
            </div>
        </div>
        
    </div>

    <!-- ==================== HERO SLIDER ==================== -->
    <section class="hero-section" id="home">
        <div class="slides-container">
    <div class="slide slide-1 active"></div>
    <div class="slide slide-2"></div>
    <div class="slide slide-3"></div>
    <div class="slide slide-4"></div>
    <div class="slide slide-5"></div>
    <div class="slide slide-6"></div>
    <div class="slide slide-7"></div>
    <div class="slide slide-8"></div>
    <div class="slide slide-9"></div>
    <div class="slide slide-10"></div>
</div>
      <div class="slider-dots">
    <div class="dot active" data-slide="0"></div>
    <div class="dot" data-slide="1"></div>
    <div class="dot" data-slide="2"></div>
    <div class="dot" data-slide="3"></div>
    <div class="dot" data-slide="4"></div>
    <div class="dot" data-slide="5"></div>
    <div class="dot" data-slide="6"></div>
    <div class="dot" data-slide="7"></div>
    <div class="dot" data-slide="8"></div>
    <div class="dot" data-slide="9"></div>
</div>
        
        <div class="hero-content">
            <div>
                <div class="hero-subtitle"> Global Geopark</div>
                <h1 class="hero-title">SIBAGANDING</h1>
                <div class="hero-divider"></div>
                <a href="#destinasi" class="hero-btn">Jelajahi Sekarang</a>
            </div>
        </div>
        
        <div class="scroll-indicator" onclick="document.getElementById('destinasi').scrollIntoView({behavior:'smooth'})">
            <span>SCROLL</span>
            <div class="line"></div>
        </div>
    </section>

    <!-- ==================== STATISTICS ==================== -->
    
<section class="map-section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>FAKTA UNIK SIBAGANDING</h2>
            <div class="divider"></div>
            <p>Klik titik pada peta untuk melihat cerita dan fakta menarik seputar Sibaganding.</p>
        </div>

        <div class="map-layout">
            <div>
                <div class="map-wrapper" data-aos="zoom-in">
                    <img src="{{ asset('images/peta-sibaganding.png') }}" alt="Peta Sibaganding" class="map-img">

                    <button class="map-point point-1 active"
                        data-number="01"
                        data-title="Taman Wisata Kera Sibaganding"
                        data-desc="Pengunjung dapat melihat monyet ekor panjang dan siamang yang hidup di kawasan hutan sekitar Sibaganding. Area ini menjadi salah satu daya tarik alam yang dekat dengan jalur wisata Danau Toba."
                        data-tags="Satwa Liar,Hutan,Ekowisata">
                    </button>

                    <button class="map-point point-2"
                        data-number="02"
                        data-title="Kampung Warna-Warni Tigarihit"
                        data-desc="Kawasan Tigarihit dikenal dengan rumah-rumah berwarna cerah yang mempercantik lereng Parapat. Tempat ini menarik untuk foto, wisata keluarga, dan menikmati suasana tepi Danau Toba."
                        data-tags="Spot Foto,Kampung Wisata,Parapat">
                    </button>

                    <button class="map-point point-3"
                        data-number="03"
                        data-title="Akses Strategis Danau Toba"
                        data-desc="Sibaganding berada dekat dengan Parapat, salah satu pintu masuk utama menuju Danau Toba dan Pulau Samosir. Lokasinya cocok menjadi titik singgah wisatawan."
                        data-tags="Akses Wisata,Danau Toba,Parapat">
                    </button>

                    <button class="map-point point-4"
                        data-number="04"
                        data-title="Legenda Batu Gantung"
                        data-desc="Batu Gantung merupakan ikon cerita rakyat di kawasan Danau Toba. Bentuk batu yang menjorok dari tebing membuatnya menjadi destinasi yang kuat dari sisi geologi, legenda, dan budaya."
                        data-tags="Legenda,Budaya,Geosite">
                    </button>

                    <button class="map-point point-5"
                        data-number="05"
                        data-title="Panorama Lereng dan Danau"
                        data-desc="Bentang alam Sibaganding memperlihatkan perpaduan lereng hijau, kawasan hutan, dan pemandangan Danau Toba. Area ini cocok untuk menikmati udara sejuk dan fotografi alam."
                        data-tags="Panorama,Landscape,Alam">
                    </button>

                    <button class="map-point point-6"
                        data-number="06"
                        data-title="Kawasan Edukasi Geopark"
                        data-desc="Sibaganding dapat dikembangkan sebagai ruang edukasi mengenai konservasi, geologi Danau Toba, dan kekayaan hayati. Pengunjung tidak hanya berwisata, tetapi juga belajar tentang alam dan budaya lokal."
                        data-tags="Edukasi,Geopark,Konservasi">
                    </button>
                </div>

                <div class="map-hint">Klik salah satu titik emas pada peta untuk mengganti informasi.</div>
            </div>

            <div class="map-info-card" data-aos="fade-left">
                <div class="map-info-label">Titik Informasi</div>
                <div class="map-info-number" id="mapNumber">01</div>
                <h3 id="mapTitle">Taman Wisata Kera Sibaganding</h3>
                <p id="mapDesc">
                    Pengunjung dapat melihat monyet ekor panjang dan siamang yang hidup di kawasan hutan sekitar Sibaganding. Area ini menjadi salah satu daya tarik alam yang dekat dengan jalur wisata Danau Toba.
                </p>
                <div class="map-info-tags" id="mapTags">
                    <span>Satwa Liar</span>
                    <span>Hutan</span>
                    <span>Ekowisata</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== ABOUT / WARISAN GEOLOGI ==================== -->
<section class="about-story" id="about">
    <div class="container">
        <div class="about-grid">
            <div class="about-content" data-aos="fade-right">
                <div class="about-kicker">Warisan Geologi Khas Dunia</div>

                <h3>Dari Letusan Purba Danau Toba, Sibaganding Menyimpan Cerita Alam yang Hidup</h3>

                <p class="about-lead">
                    Danau Toba bukan sekadar danau yang indah. Ia lahir dari salah satu letusan gunung api terbesar dalam sejarah bumi, sekitar 74.000 tahun lalu. Dari peristiwa besar itu, terbentuk lanskap kaldera raksasa, tebing, perbukitan, dan panorama alam yang kini menjadi identitas Geopark Toba.
                </p>

                <p>
                    Di antara bentang alam tersebut, Sibaganding hadir sebagai ruang kecil yang menyimpan cerita besar. Kawasan ini mempertemukan keindahan geologi, kehidupan hayati, dan budaya Batak yang tumbuh berdampingan dengan Danau Toba.
                </p>

                <p>
                    Melalui Sibaganding, pengunjung tidak hanya datang untuk melihat pemandangan, tetapi juga memahami bagaimana alam, manusia, dan warisan budaya saling terhubung dalam satu kawasan geopark.
                </p>

                <div class="story-points">
                    <div class="story-point">
                        <span>01</span>
                        <strong>Jejak letusan purba Danau Toba</strong>
                    </div>
                    <div class="story-point">
                        <span>02</span>
                        <strong>Bagian dari narasi Geopark Toba</strong>
                    </div>
                    <div class="story-point">
                        <span>03</span>
                        <strong>Sibaganding sebagai gerbang cerita alam</strong>
                    </div>
                </div>

                <div class="timeline-mini">
                    <div>
                        <i></i>
                        <p><strong>Danau Toba</strong> menjadi dasar cerita geologi besar yang membentuk kawasan ini.</p>
                    </div>
                    <div>
                        <i></i>
                        <p><strong>Geopark Toba</strong> mengangkat nilai alam, edukasi, konservasi, dan budaya lokal.</p>
                    </div>
                    <div>
                        <i></i>
                        <p><strong>Sibaganding</strong> memperlihatkan wajah geopark yang dekat, hidup, dan mudah dijelajahi.</p>
                    </div>
                </div>
            </div>
<div class="about-visual" data-aos="fade-left">
    <div class="story-slider">

        <div class="story-slide active">
            <img src="{{ asset('images/danau toba home.jpg') }}" alt="Danau Toba">
            <div class="slide-overlay">
                <small>SLIDE 01 — TERBENTUKNYA DANAU TOBA</small>
                <h4>Letusan Purba yang Melahirkan Danau Toba</h4>
                <p>
                    Sekitar 74.000 tahun lalu, letusan supervolcano membentuk kaldera raksasa
                    yang kemudian dikenal sebagai Danau Toba. Dari peristiwa inilah lahir bentang
                    alam megah yang menjadi dasar cerita geologi kawasan ini.
                </p>
            </div>
        </div>

        <div class="story-slide">
            <img src="{{ asset('images/caldera.jpg') }}" alt="Kaldera Geopark Toba">
            <div class="slide-overlay">
                <small>SLIDE 02 — KALDERA GEOPARK</small>
                <h4>Kaldera Besar yang Menjadi Identitas Geopark Toba</h4>
                <p>
                    Tebing, perbukitan, batuan, dan panorama Danau Toba memperlihatkan jejak geologi
                    yang bernilai tinggi. Kawasan ini bukan hanya indah dipandang, tetapi juga menyimpan
                    pengetahuan tentang sejarah bumi.
                </p>
            </div>
        </div>

        <div class="story-slide">
            <img src="{{ asset('images/sibaganding1.JPG') }}" alt="Sibaganding">
            <div class="slide-overlay">
                <small>SLIDE 03 — SIBAGANDING</small>
                <h4>Sibaganding, Ruang Kecil dengan Cerita Alam yang Besar</h4>
                <p>
                    Sibaganding menjadi bagian dari wajah Geopark Toba yang dekat dengan masyarakat.
                    Di sini, cerita tentang alam, satwa, budaya Batak, dan kehidupan lokal bertemu
                    dalam satu kawasan yang dapat dijelajahi.
                </p>
            </div>
        </div>

        <div class="story-slide">
            <img src="{{ asset('images/unesco.jpg') }}" alt="UNESCO Global Geopark">
            <div class="slide-overlay">
                <small>SLIDE 04 — UNESCO GLOBAL GEOPARK</small>
                <h4>Danau Toba Diakui Dunia sebagai Warisan Geologi</h4>
                <p>
                    Pengakuan UNESCO Global Geopark memperkuat posisi Danau Toba sebagai kawasan
                    bernilai dunia. Sibaganding menjadi salah satu ruang untuk mengenalkan warisan
                    alam, edukasi, konservasi, dan budaya kepada pengunjung.
                </p>
            </div>
        </div>


       
</div>

        <div class="story-slide">
            <img src="{{ asset('images/sibaganding1.JPG') }}" alt="Sibaganding">
            <div class="geo-badge">
                <small>Sibaganding</small>
                <h4>Sibaganding menjadi ruang kecil dengan cerita alam yang besar</h4>
            </div>
            <div class="float-card">
                <span class="big">3</span>
                <span class="text">pilar utama bertemu di sini: geodiversity, biodiversity, dan culturediversity.</span>
            </div>
        </div>

        <div class="story-slide">
            <img src="{{ asset('images/unesco-toba.jpg') }}" alt="UNESCO Global Geopark">
            <div class="geo-badge">
                <small>UNESCO Global Geopark</small>
                <h4>Danau Toba diakui dunia sebagai warisan geologi bernilai tinggi</h4>
            </div>
            <div class="float-card">
                <span class="big">2020</span>
                <span class="text">Danau Toba ditetapkan sebagai UNESCO Global Geopark dan semakin dikenal dunia.</span>
            </div>
        </div>

       

    </div>
</div>
        </div>
    </div>
</section>

<!-- ==================== TIGA PILAR SIBAGANDING ==================== -->
<section id="destinasi" class="pilar-section">
    <div class="container">
        <div class="section-title pilar-title" data-aos="fade-up">
            <span class="pilar-kicker">Biodiversity • Geodiversity • Culturediversity</span>
            <h2>TIGA PILAR SIBAGANDING</h2>
            <div class="divider"></div>
            <p>
                Sibaganding menyimpan kekayaan alam, jejak geologi, dan budaya Batak yang saling terhubung
                dalam satu kawasan Geopark Danau Toba.
            </p>
        </div>

        <div class="pilar-list">

            <!-- PILAR 01 -->
            <div class="pilar-item" data-aos="fade-up">
                <div class="pilar-image">
                    <img src="{{ asset('images/monkey forest.jpg') }}" alt="Biodiversity">
                </div>

                <div class="pilar-content">
                    <div class="pilar-number">01 — BIODIVERSITY</div>
                    <h3>Biodiversity</h3>
                    <div class="pilar-location">Monkey Forest</div>
                    <p>
                        Keanekaragaman hayati menjadi salah satu kekuatan Sibaganding. Kawasan ini menyimpan
                        kehidupan alam yang tumbuh berdampingan dengan masyarakat, mulai dari kawasan hutan,
                        satwa, hingga lanskap hijau yang menjadi daya tarik ekowisata.
                    </p>

                    <div class="pilar-tags">
                        <span>Satwa Liar</span>
                        <span>Hutan</span>
                        <span>Ekowisata</span>
                        <span>Konservasi</span>
                    </div>

                    <a href="{{ url('/geosite/biodiversity') }}" class="pilar-link">Jelajahi Lebih Lanjut →</a>
                </div>
            </div>

            <!-- PILAR 02 -->
            <div class="pilar-item reverse" data-aos="fade-up">
                <div class="pilar-image">
                    <img src="{{ asset('images/geodiversity.jpg') }}" alt="Geodiversity">
                </div>

                <div class="pilar-content">
                    <div class="pilar-number">02 — GEODIVERSITY</div>
                    <h3>Geodiversity</h3>
                    <div class="pilar-location">Kaldera Toba dan Kawasan Sibaganding</div>
                    <p>
                        Jejak geologi Danau Toba terlihat melalui kaldera, tebing, batuan, perbukitan,
                        dan bentang alam yang terbentuk dari proses bumi ribuan tahun lalu. Nilai geologi
                        inilah yang membuat kawasan ini penting sebagai ruang edukasi dan wisata.
                    </p>

                    <div class="pilar-tags">
                        <span>Kaldera Toba</span>
                        <span>Batuan Unik</span>
                        <span>Panorama</span>
                        <span>Edukasi Geologi</span>
                    </div>

                    <a href="{{ url('/geosite/geodiversity') }}" class="pilar-link">Jelajahi Lebih Lanjut →</a>
                </div>
            </div>

            <!-- PILAR 03 -->
            <div class="pilar-item" data-aos="fade-up">
                <div class="pilar-image">
                    <img src="{{ asset('images/culturediversity.JPG') }}" alt="Culturediversity">
                </div>

                <div class="pilar-content">
                    <div class="pilar-number">03 — CULTUREDIVERSITY</div>
                    <h3>Culturediversity</h3>
                    <div class="pilar-location">Budaya Batak dan Kehidupan Lokal</div>
                    <p>
                        Budaya Batak memperkaya cerita Sibaganding melalui tradisi, rumah adat, cerita rakyat,
                        seni, dan kehidupan masyarakat. Nilai budaya ini menjadi bagian penting yang membuat
                        perjalanan wisata terasa lebih hidup dan bermakna.
                    </p>

                    <div class="pilar-tags">
                        <span>Budaya Batak</span>
                        <span>Rumah Adat</span>
                        <span>Cerita Rakyat</span>
                        <span>Tradisi Lokal</span>
                    </div>

                    <a href="{{ url('/geosite/culturediversitygit') }}" class="pilar-link">Jelajahi Lebih Lanjut →</a>
                </div>
            </div>

        </div>
    </div>
</section>
   
<!-- ==================== GALLERY ==================== -->
<section class="gallery-section" id="galeri">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Galeri Keindahan</h2>
            <div class="divider"></div>
            <p>Momen terbaik dari Geosite Danau Toba dan pesona Sibaganding</p>
        </div>

        <div class="gallery-slider" data-aos="fade-up">
            <div class="gallery-track" id="galleryTrack">

                <div class="gallery-card">
                    <img src="{{ asset('images/galleri-1.jpg') }}" alt="Galeri 1">
                    <div class="gallery-caption">
                        <span>01</span>
                        <h4>Panorama Danau Toba</h4>
                    </div>
                </div>

                <div class="gallery-card">
                    <img src="{{ asset('images/galleri-2.jpg') }}" alt="Galeri 2">
                    <div class="gallery-caption">
                        <span>02</span>
                        <h4>Lanskap Sibaganding</h4>
                    </div>
                </div>

                <div class="gallery-card">
                    <img src="{{ asset('images/galleri-3.jpg') }}" alt="Galeri 3">
                    <div class="gallery-caption">
                        <span>03</span>
                        <h4>Jejak Geopark</h4>
                    </div>
                </div>

                <div class="gallery-card">
                    <img src="{{ asset('images/galleri-4.jpg') }}" alt="Galeri 4">
                    <div class="gallery-caption">
                        <span>04</span>
                        <h4>Budaya Lokal</h4>
                    </div>
                </div>

                <div class="gallery-card">
                    <img src="{{ asset('images/galleri-5.jpg') }}" alt="Galeri 5">
                    <div class="gallery-caption">
                        <span>05</span>
                        <h4>Alam Hijau</h4>
                    </div>
                </div>

                <div class="gallery-card">
                    <img src="{{ asset('images/galleri-6.jpg') }}" alt="Galeri 6">
                    <div class="gallery-caption">
                        <span>06</span>
                        <h4>Perbukitan Toba</h4>
                    </div>
                </div>

                <div class="gallery-card">
                    <img src="{{ asset('images/galleri-7.jpg') }}" alt="Galeri 7">
                    <div class="gallery-caption">
                        <span>07</span>
                        <h4>Wisata Alam</h4>
                    </div>
                </div>

                <div class="gallery-card">
                    <img src="{{ asset('images/galleri-8.jpg') }}" alt="Galeri 8">
                    <div class="gallery-caption">
                        <span>08</span>
                        <h4>Keindahan Kaldera</h4>
                    </div>
                </div>

                <div class="gallery-card">
                    <img src="{{ asset('images/galleri-9.jpg') }}" alt="Galeri 9">
                    <div class="gallery-caption">
                        <span>09</span>
                        <h4>Pesona Geosite</h4>
                    </div>
                </div>

                <div class="gallery-card">
                    <img src="{{ asset('images/galleri-10.jpg') }}" alt="Galeri 10">
                    <div class="gallery-caption">
                        <span>10</span>
                        <h4>Warisan Dunia</h4>
                    </div>
                </div>

            </div>

  <button class="gallery-arrow gallery-prev" type="button">&#10094;</button>
<button class="gallery-arrow gallery-next" type="button">&#10095;</button>
        </div>

       <div class="gallery-dots" id="galleryDots">
    <button class="active" type="button"></button>
    <button type="button"></button>
    <button type="button"></button>
    <button type="button"></button>
    <button type="button"></button>
    <button type="button"></button>
    <button type="button"></button>
    <button type="button"></button>
    <button type="button"></button>
    <button type="button"></button>
</div>
    </div>
</section>

   <!-- ==================== PETUALANGAN / VIDEO / BERITA ==================== -->
<section class="adventure-section">
    <div class="container">

        <!-- MULAI PETUALANGAN -->
        <div class="adventure-hero" data-aos="fade-up">
            <span class="adventure-kicker">Mulai Dari Sini</span>
            <h2>Mulai Petualangan Anda</h2>
            <div class="divider"></div>
            <p>
                Temukan cerita alam, geologi, budaya, dan pengalaman wisata yang membuat
                Sibaganding menjadi bagian menarik dari Geopark Danau Toba.
            </p>
        </div>

        <!-- VIDEO TESTIMONI -->
        <div class="video-story" data-aos="fade-up">
            <div class="video-heading">
                <div>
                    <span class="adventure-kicker">Cerita Pengunjung</span>
                    <h3>Apa Kata Mereka Tentang Sibaganding?</h3>
                    <p>
                        Saksikan cerita, pengalaman, dan kesan pengunjung tentang keindahan alam,
                        budaya, dan suasana Sibaganding.
                    </p>
                </div>
            </div>

            <div class="video-slider">
                <div class="video-track" id="videoTrack">

                    <div class="video-card">
                        <div class="video-frame">
                            <iframe src="https://www.youtube.com/embed/https://youtu.be/gViE6bQCCoc?si=BGVxaaNHseVdTLnI" title="Video Sibaganding 1" allowfullscreen></iframe>
                        </div>
                        <div class="video-info">
                            <span>01</span>
                            <h4>Pesona Alam Sibaganding</h4>
                            <p>Pengalaman pertama menikmati suasana alam dan panorama kawasan Sibaganding.</p>
                        </div>
                    </div>

                    <div class="video-card">
                        <div class="video-frame">
                            <iframe src="https://www.youtube.com/embed/VIDEO_ID_2" title="Video Sibaganding 2" allowfullscreen></iframe>
                        </div>
                        <div class="video-info">
                            <span>02</span>
                            <h4>Wisata Edukasi Geopark</h4>
                            <p>Cerita tentang belajar geologi, alam, dan budaya di kawasan Geopark Toba.</p>
                        </div>
                    </div>

                    <div class="video-card">
                        <div class="video-frame">
                            <iframe src="https://www.youtube.com/embed/VIDEO_ID_3" title="Video Sibaganding 3" allowfullscreen></iframe>
                        </div>
                        <div class="video-info">
                            <span>03</span>
                            <h4>Hutan dan Satwa Sibaganding</h4>
                            <p>Kesan pengunjung saat melihat kekayaan hayati dan suasana hutan Sibaganding.</p>
                        </div>
                    </div>

                    <div class="video-card">
                        <div class="video-frame">
                            <iframe src="https://www.youtube.com/embed/VIDEO_ID_4" title="Video Sibaganding 4" allowfullscreen></iframe>
                        </div>
                        <div class="video-info">
                            <span>04</span>
                            <h4>Budaya dan Cerita Lokal</h4>
                            <p>Pengalaman mengenal budaya Batak dan kehidupan masyarakat sekitar kawasan.</p>
                        </div>
                    </div>

                    <div class="video-card">
                        <div class="video-frame">
                            <iframe src="https://www.youtube.com/embed/VIDEO_ID_5" title="Video Sibaganding 5" allowfullscreen></iframe>
                        </div>
                        <div class="video-info">
                            <span>05</span>
                            <h4>Perjalanan Menuju Sibaganding</h4>
                            <p>Cuplikan perjalanan wisata dan suasana terbaik saat menjelajahi Sibaganding.</p>
                        </div>
                    </div>

                </div>

                <button class="video-arrow video-prev" type="button">&#10094;</button>
                <button class="video-arrow video-next" type="button">&#10095;</button>
            </div>

            <div class="video-mini-list" id="videoDots">
                <button class="active" type="button">01</button>
                <button type="button">02</button>
                <button type="button">03</button>
                <button type="button">04</button>
                <button type="button">05</button>
            </div>
        </div>

    </div>
</section>

<!-- ==================== BERITA TERKINI ==================== -->
<section class="news-preview-section">
    <div class="container">
        <div class="news-header" data-aos="fade-up">
            <div>
                <span class="adventure-kicker">Update Terbaru</span>
                <h3>Berita Terkini Sibaganding</h3>
                <p>Ikuti informasi terbaru seputar kegiatan, destinasi, dan pengembangan Geopark Sibaganding.</p>
            </div>

            <a href="{{ url('/berita') }}" class="news-more">Lihat Berita Lainnya →</a>
        </div>

        <div class="news-slider" data-aos="fade-up">
            <div class="news-track" id="newsTrack">

                <div class="news-card">
                    <img src="{{ asset('images/galleri-1.jpg') }}" alt="Berita 1">
                    <div class="news-content">
                        <span>Berita • Geopark</span>
                        <h4>Pengembangan Wisata Sibaganding Terus Diperkuat</h4>
                        <p>Upaya pengenalan potensi alam, budaya, dan edukasi geopark semakin ditingkatkan.</p>
                        <a href="{{ url('/berita') }}">Baca Selengkapnya →</a>
                    </div>
                </div>

                <div class="news-card">
                    <img src="{{ asset('images/galleri-2.jpg') }}" alt="Berita 2">
                    <div class="news-content">
                        <span>Wisata • Alam</span>
                        <h4>Sibaganding Menjadi Daya Tarik Baru di Kawasan Danau Toba</h4>
                        <p>Keindahan alam dan akses wisata membuat kawasan ini semakin menarik dikunjungi.</p>
                        <a href="{{ url('/berita') }}">Baca Selengkapnya →</a>
                    </div>
                </div>

                <div class="news-card">
                    <img src="{{ asset('images/galleri-3.jpg') }}" alt="Berita 3">
                    <div class="news-content">
                        <span>Edukasi • Geologi</span>
                        <h4>Geopark Toba Sebagai Ruang Belajar Alam Terbuka</h4>
                        <p>Pengunjung dapat memahami proses terbentuknya Danau Toba melalui cerita geologi.</p>
                        <a href="{{ url('/berita') }}">Baca Selengkapnya →</a>
                    </div>
                </div>

                <div class="news-card">
                    <img src="{{ asset('images/galleri-4.jpg') }}" alt="Berita 4">
                    <div class="news-content">
                        <span>Budaya • Lokal</span>
                        <h4>Budaya Batak Menguatkan Cerita Wisata Sibaganding</h4>
                        <p>Tradisi lokal menjadi bagian penting dalam pengalaman wisata di kawasan geopark.</p>
                        <a href="{{ url('/berita') }}">Baca Selengkapnya →</a>
                    </div>
                </div>

            </div>

            <button class="news-arrow news-prev" type="button">&#10094;</button>
            <button class="news-arrow news-next" type="button">&#10095;</button>
        </div>
    </div>
</section>

<!-- ==================== JELAJAHI SIBAGANDING ==================== -->
<section class="explore-section">
    <div class="container">
        <div class="explore-box" data-aos="zoom-in">
            <span class="adventure-kicker">Siap Berkunjung?</span>
            <h3>Jelajahi Sibaganding</h3>
            <p>
                Pilih destinasi terbaik, temukan cerita alam dan budaya, lalu mulai perjalanan Anda
                menuju kawasan Geopark Danau Toba.
            </p>
            <a href="{{ url('/destinasi') }}" class="explore-btn">Jelajahi Sekarang</a>
        </div>
    </div>
</section>
<script>
document.addEventListener('DOMContentLoaded', function () {

    // ==================== AOS ====================
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            once: true,
            offset: 50
        });
    }

    // ==================== HERO SLIDER ====================
    let heroCurrent = 0;
    const heroSlides = document.querySelectorAll('.slide');
    const heroDots = document.querySelectorAll('.dot');

    function showHeroSlide(index) {
        if (!heroSlides.length) return;

        heroSlides.forEach(function (slide) {
            slide.classList.remove('active');
        });

        heroDots.forEach(function (dot) {
            dot.classList.remove('active');
        });

        if (index < 0) {
            heroCurrent = heroSlides.length - 1;
        } else if (index >= heroSlides.length) {
            heroCurrent = 0;
        } else {
            heroCurrent = index;
        }

        heroSlides[heroCurrent].classList.add('active');

        if (heroDots[heroCurrent]) {
            heroDots[heroCurrent].classList.add('active');
        }
    }

    function nextHeroSlide() {
        showHeroSlide(heroCurrent + 1);
    }

    heroDots.forEach(function (dot, index) {
        dot.addEventListener('click', function () {
            showHeroSlide(index);
        });
    });

    if (heroSlides.length) {
        showHeroSlide(0);
        setInterval(nextHeroSlide, 5000);
    }

    // ==================== SMOOTH SCROLL ====================
    document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
        anchor.addEventListener('click', function (e) {
            const target = document.querySelector(this.getAttribute('href'));

            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // ==================== MAP INTERACTIVE ====================
    const mapPoints = document.querySelectorAll('.map-point');
    const mapNumber = document.getElementById('mapNumber');
    const mapTitle = document.getElementById('mapTitle');
    const mapDesc = document.getElementById('mapDesc');
    const mapTags = document.getElementById('mapTags');

    mapPoints.forEach(function (point) {
        point.addEventListener('click', function () {
            mapPoints.forEach(function (item) {
                item.classList.remove('active');
            });

            point.classList.add('active');

            if (mapNumber) mapNumber.textContent = point.dataset.number;
            if (mapTitle) mapTitle.textContent = point.dataset.title;
            if (mapDesc) mapDesc.textContent = point.dataset.desc;

            if (mapTags) {
                mapTags.innerHTML = '';

                if (point.dataset.tags) {
                    point.dataset.tags.split(',').forEach(function (tag) {
                        const span = document.createElement('span');
                        span.textContent = tag.trim();
                        mapTags.appendChild(span);
                    });
                }
            }
        });
    });

    // ==================== ABOUT STORY SLIDER ====================
    let storyCurrent = 0;
    const storySlides = document.querySelectorAll('.story-slider .story-slide');
    const storyDots = document.querySelectorAll('.story-slider .story-dots button');
    const storyPrev = document.querySelector('.story-prev');
    const storyNext = document.querySelector('.story-next');

    function showStorySlide(index) {
        if (!storySlides.length) return;

        storySlides.forEach(function (slide) {
            slide.classList.remove('active');
        });

        storyDots.forEach(function (dot) {
            dot.classList.remove('active');
        });

        if (index < 0) {
            storyCurrent = storySlides.length - 1;
        } else if (index >= storySlides.length) {
            storyCurrent = 0;
        } else {
            storyCurrent = index;
        }

        storySlides[storyCurrent].classList.add('active');

        if (storyDots[storyCurrent]) {
            storyDots[storyCurrent].classList.add('active');
        }
    }

    if (storyPrev) {
        storyPrev.addEventListener('click', function () {
            showStorySlide(storyCurrent - 1);
        });
    }

    if (storyNext) {
        storyNext.addEventListener('click', function () {
            showStorySlide(storyCurrent + 1);
        });
    }

    storyDots.forEach(function (dot, index) {
        dot.addEventListener('click', function () {
            showStorySlide(index);
        });
    });

    if (storySlides.length) {
        showStorySlide(0);
        setInterval(function () {
            showStorySlide(storyCurrent + 1);
        }, 8000);
    }

    // ==================== GALLERY SLIDER ====================
    let galleryCurrent = 0;
    const galleryTrack = document.getElementById('galleryTrack');
    const galleryCards = document.querySelectorAll('.gallery-card');
    const galleryDots = document.querySelectorAll('#galleryDots button');
    const galleryPrev = document.querySelector('.gallery-prev');
    const galleryNext = document.querySelector('.gallery-next');

    function getGalleryPerView() {
        if (window.innerWidth <= 576) return 1;
        if (window.innerWidth <= 992) return 2;
        return 3;
    }

    function showGallerySlide(index) {
        if (!galleryTrack || !galleryCards.length) return;

        const perView = getGalleryPerView();
        const maxIndex = galleryCards.length - perView;

        if (index < 0) {
            galleryCurrent = maxIndex;
        } else if (index > maxIndex) {
            galleryCurrent = 0;
        } else {
            galleryCurrent = index;
        }

        const cardWidth = galleryCards[0].offsetWidth;
        const gap = 24;
        const move = galleryCurrent * (cardWidth + gap);

        galleryTrack.style.transform = 'translateX(-' + move + 'px)';

        galleryDots.forEach(function (dot) {
            dot.classList.remove('active');
        });

        if (galleryDots[galleryCurrent]) {
            galleryDots[galleryCurrent].classList.add('active');
        }
    }

    if (galleryPrev) {
        galleryPrev.addEventListener('click', function () {
            showGallerySlide(galleryCurrent - 1);
        });
    }

    if (galleryNext) {
        galleryNext.addEventListener('click', function () {
            showGallerySlide(galleryCurrent + 1);
        });
    }

    galleryDots.forEach(function (dot, index) {
        dot.addEventListener('click', function () {
            showGallerySlide(index);
        });
    });

    if (galleryCards.length) {
        showGallerySlide(0);

        setInterval(function () {
            showGallerySlide(galleryCurrent + 1);
        }, 5000);

        window.addEventListener('resize', function () {
            showGallerySlide(galleryCurrent);
        });
    }

});
// ==================== VIDEO SLIDER ====================
let videoCurrent = 0;
const videoTrack = document.getElementById('videoTrack');
const videoCards = document.querySelectorAll('.video-card');
const videoDots = document.querySelectorAll('#videoDots button');
const videoPrev = document.querySelector('.video-prev');
const videoNext = document.querySelector('.video-next');

function showVideoSlide(index) {
    if (!videoTrack || !videoCards.length) return;

    if (index < 0) {
        videoCurrent = videoCards.length - 1;
    } else if (index >= videoCards.length) {
        videoCurrent = 0;
    } else {
        videoCurrent = index;
    }

    const cardWidth = videoCards[0].offsetWidth;
    const gap = 26;
    const move = videoCurrent * (cardWidth + gap);

    videoTrack.style.transform = 'translateX(-' + move + 'px)';

    videoDots.forEach(function (dot) {
        dot.classList.remove('active');
    });

    if (videoDots[videoCurrent]) {
        videoDots[videoCurrent].classList.add('active');
    }
}

if (videoPrev) {
    videoPrev.addEventListener('click', function () {
        showVideoSlide(videoCurrent - 1);
    });
}

if (videoNext) {
    videoNext.addEventListener('click', function () {
        showVideoSlide(videoCurrent + 1);
    });
}

videoDots.forEach(function (dot, index) {
    dot.addEventListener('click', function () {
        showVideoSlide(index);
    });
});

if (videoCards.length) {
    showVideoSlide(0);
}


// ==================== NEWS SLIDER ====================
let newsCurrent = 0;
const newsTrack = document.getElementById('newsTrack');
const newsCards = document.querySelectorAll('.news-card');
const newsPrev = document.querySelector('.news-prev');
const newsNext = document.querySelector('.news-next');

function getNewsPerView() {
    if (window.innerWidth <= 576) return 1;
    if (window.innerWidth <= 992) return 2;
    return 3;
}

function showNewsSlide(index) {
    if (!newsTrack || !newsCards.length) return;

    const perView = getNewsPerView();
    const maxIndex = newsCards.length - perView;

    if (index < 0) {
        newsCurrent = maxIndex;
    } else if (index > maxIndex) {
        newsCurrent = 0;
    } else {
        newsCurrent = index;
    }

    const cardWidth = newsCards[0].offsetWidth;
    const gap = 24;
    const move = newsCurrent * (cardWidth + gap);

    newsTrack.style.transform = 'translateX(-' + move + 'px)';
}

if (newsPrev) {
    newsPrev.addEventListener('click', function () {
        showNewsSlide(newsCurrent - 1);
    });
}

if (newsNext) {
    newsNext.addEventListener('click', function () {
        showNewsSlide(newsCurrent + 1);
    });
}

if (newsCards.length) {
    showNewsSlide(0);

    window.addEventListener('resize', function () {
        showNewsSlide(newsCurrent);
    });
}
</script>

@endsection