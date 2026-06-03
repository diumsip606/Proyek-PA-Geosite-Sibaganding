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
{{-- Dynamic Hero Slider CSS akan di-generate via inline style --}}

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
    z-index: 80;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    border: 2px solid rgba(255,255,255,0.75);
    background: rgba(7, 59, 99, 0.78);
    color: #fff;
    font-size: 1.45rem;
    cursor: pointer;
    backdrop-filter: blur(10px);
    transition: all 0.25s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    pointer-events: auto;
}

.story-nav:hover {
    background: #c6a43b;
    color: #073b63;
    transform: translateY(-50%) scale(1.08);
}

.story-nav.prev {
    left: 22px;
}

.story-nav.next {
    right: 22px;
}

.slide-overlay {
    position: absolute;
    left: 118px;
    right: 118px;
    bottom: 48px;
    z-index: 20;
    color: #fff;
    display: block;
    pointer-events: none;
}

.slide-overlay h4 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.75rem;
    line-height: 1.18;
    color: #ffffff;
    margin-bottom: 14px;
    max-width: 560px;
    text-shadow: 0 3px 12px rgba(0,0,0,0.45);
}

.slide-overlay p {
    max-width: 610px;
    font-size: 0.93rem;
    line-height: 1.65;
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
    padding: 28px;
    border-radius: 34px;
    overflow: hidden;

    background:
        radial-gradient(circle at 18% 22%, rgba(232, 182, 47, 0.32), transparent 28%),
        radial-gradient(circle at 82% 78%, rgba(7, 59, 99, 0.45), transparent 38%),
        linear-gradient(135deg, #dceef8 0%, #b7d6ea 45%, #7faac6 100%) !important;

    box-shadow:
        0 35px 90px rgba(7, 59, 99, 0.22),
        inset 0 1px 0 rgba(255, 255, 255, 0.65);

    border: 1px solid rgba(255, 255, 255, 0.75);
    backdrop-filter: blur(14px);
}

.map-wrapper::before {
    content: "";
    position: absolute;
    inset: 0;
    background:
        radial-gradient(circle at 30% 30%, rgba(255,255,255,0.35), transparent 32%),
        linear-gradient(120deg, rgba(255,255,255,0.25), transparent 55%);
    z-index: 0;
    pointer-events: none;
}

.map-wrapper::after {
    content: "";
    position: absolute;
    width: 520px;
    height: 520px;
    right: -170px;
    bottom: -190px;
    border-radius: 50%;
    background: rgba(3, 39, 68, 0.22);
    filter: blur(10px);
    z-index: 0;
    pointer-events: none;
}

.map-inner-container {
    position: relative;
    z-index: 2;
    width: 100%;
    line-height: 0;
    border-radius: 28px;
    overflow: hidden;
    background: transparent !important;
}

.map-img {
    width: 100%;
    display: block;
    border-radius: 28px;
    filter:
        drop-shadow(0 24px 32px rgba(7, 59, 99, 0.20))
        saturate(1.08)
        contrast(1.03);
}

/* Inner container jadi positioning context untuk titik peta */



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
    transition: all 0.3s ease;
}

.map-point::after {
    content: "";
    position: absolute;
    inset: -10px;
    border-radius: 50%;
    border: 1px solid rgba(232,182,47,0.55);
    animation: mapPulse 1.8s infinite;
}

.map-point:hover {
    transform: translate(-50%, -50%) scale(1.25);
    background: #f0c040;
    box-shadow:
        0 0 0 6px rgba(232,182,47,0.3),
        0 0 0 14px rgba(232,182,47,0.12),
        0 15px 28px rgba(232,182,47,0.3);
}

.map-point.active {
    transform: translate(-50%, -50%) scale(1.3);
    background: #e8b62f;
    box-shadow:
        0 0 0 5px rgba(232,182,47,0.4),
        0 0 0 12px rgba(232,182,47,0.18),
        0 0 0 20px rgba(232,182,47,0.08),
        0 15px 30px rgba(232,182,47,0.35);
    z-index: 10;
}

.map-point.active::before {
    inset: 6px;
    background: rgba(255,255,255,0.95);
}

.map-point.active::after {
    inset: -14px;
    border: 2px solid rgba(232,182,47,0.7);
    animation: mapPulse 1.2s infinite;
}

@keyframes mapPulse {
    0% { transform: scale(0.7); opacity: 0.9; }
    100% { transform: scale(1.45); opacity: 0; }
}


/* Posisi titik diatur via inline style dari database */

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


/* ==================== PENGURUS SIBAGANDING ==================== */
.team-section {
    padding: 110px 0;
    background:
        radial-gradient(circle at 12% 20%, rgba(198, 164, 59, 0.12), transparent 28%),
        radial-gradient(circle at 88% 45%, rgba(0, 51, 102, 0.08), transparent 30%),
        linear-gradient(180deg, #e8f2fb 0%, #f4f8fc 100%);
    overflow: hidden;
}

.team-title {
    margin-bottom: 70px;
}

.team-kicker {
    display: inline-block;
    color: #c6a43b;
    font-size: 0.72rem;
    font-weight: 800;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    margin-bottom: 14px;
}

.team-title h2 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2.8rem;
    color: #003366;
}

.team-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 34px;
    align-items: end;
}

.team-card {
    position: relative;
    border-radius: 34px;
    overflow: hidden;
    background: #ffffff;
    box-shadow: 0 28px 70px rgba(0, 51, 102, 0.14);
    border: 8px solid rgba(255,255,255,0.68);
    transition: all 0.35s ease;
}

.team-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 35px 90px rgba(0, 51, 102, 0.22);
}

.team-center {
    transform: translateY(-28px);
}

.team-center:hover {
    transform: translateY(-38px);
}

.team-image {
    height: 390px;
    position: relative;
    overflow: hidden;
}

.team-center .team-image {
    height: 450px;
}

.team-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.7s ease;
}

.team-card:hover .team-image img {
    transform: scale(1.08);
}

.team-image::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(
        180deg,
        rgba(0, 35, 70, 0.02) 0%,
        rgba(0, 35, 70, 0.10) 45%,
        rgba(0, 35, 70, 0.78) 100%
    );
}

.team-info {
    position: absolute;
    left: 28px;
    right: 28px;
    bottom: 28px;
    z-index: 3;
    color: white;
}

.team-info span {
    display: inline-block;
    color: #e7c24a;
    font-size: 0.72rem;
    font-weight: 800;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    margin-bottom: 10px;
}

.team-info h3 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2rem;
    line-height: 1.15;
    color: #fff8df;
    margin-bottom: 12px;
}

.team-info p {
    color: rgba(255,255,255,0.86);
    line-height: 1.65;
    font-size: 0.88rem;
}

.team-action {
    text-align: center;
    margin-top: 55px;
}

.team-contact-btn {
    display: inline-block;
    padding: 14px 42px;
    border-radius: 45px;
    background: #c6a43b;
    color: #003366;
    text-decoration: none;
    font-size: 0.75rem;
    font-weight: 900;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    box-shadow: 0 18px 40px rgba(198, 164, 59, 0.25);
    transition: all 0.25s ease;
}

.team-contact-btn:hover {
    background: #003366;
    color: #fff8df;
    transform: translateY(-3px);
}

@media (max-width: 992px) {
    .team-grid {
        grid-template-columns: 1fr;
        max-width: 520px;
        margin: 0 auto;
    }

    .team-center {
        transform: none;
    }

    .team-center:hover {
        transform: translateY(-10px);
    }

    .team-image,
    .team-center .team-image {
        height: 420px;
    }
}

@media (max-width: 576px) {
    .team-section {
        padding: 75px 0;
    }

    .team-title h2 {
        font-size: 2rem;
    }

    .team-image,
    .team-center .team-image {
        height: 340px;
    }

    .team-info h3 {
        font-size: 1.55rem;
    }

    .team-info {
        left: 22px;
        right: 22px;
        bottom: 22px;
    }
}


/* ==================== STORY IMAGE MODAL ==================== */
.story-modal-overlay {
    display: none;
    position: fixed;
    inset: 0;
    z-index: 9999;
    background: rgba(0, 15, 30, 0.88);
    backdrop-filter: blur(12px);
    align-items: center;
    justify-content: center;
    padding: 24px;
    animation: modalFadeIn 0.35s ease;
}

.story-modal-overlay.open {
    display: flex;
}

@keyframes modalFadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.story-modal-box {
    position: relative;
    background: #021d33;
    border-radius: 32px;
    border: 1px solid rgba(255,255,255,0.15);
    box-shadow: 0 40px 100px rgba(0,0,0,0.55);
    max-width: 1100px;
    width: 100%;
    max-height: 90vh;
    overflow: hidden;
    display: grid;
    grid-template-columns: 1.2fr 0.8fr;
    animation: modalSlideUp 0.4s cubic-bezier(0.22, 1, 0.36, 1);
}

@keyframes modalSlideUp {
    from { opacity: 0; transform: translateY(40px) scale(0.96); }
    to { opacity: 1; transform: translateY(0) scale(1); }
}

.story-modal-img {
    position: relative;
    overflow: hidden;
    min-height: 500px;
}

.story-modal-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.5s ease;
}

.story-modal-img:hover img {
    transform: scale(1.04);
}

.story-modal-img::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,20,40,0.55) 100%);
}

.story-modal-content {
    padding: 50px 42px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    overflow-y: auto;
    max-height: 90vh;
}

.story-modal-kicker {
    color: #e8b62f;
    font-size: 0.72rem;
    font-weight: 800;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    margin-bottom: 18px;
}

.story-modal-content h2 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2.4rem;
    color: #fff8df;
    line-height: 1.15;
    margin-bottom: 20px;
}

.story-modal-content p {
    color: rgba(255,255,255,0.82);
    line-height: 1.85;
    font-size: 0.95rem;
    margin-bottom: 22px;
}

.story-modal-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 32px;
}

.story-modal-tags span {
    padding: 7px 16px;
    border-radius: 30px;
    background: rgba(232,182,47,0.18);
    color: #e8b62f;
    font-size: 0.78rem;
    font-weight: 600;
}

.story-modal-close {
    position: absolute;
    top: 22px;
    right: 22px;
    z-index: 10;
    width: 44px;
    height: 44px;
    border-radius: 50%;
    border: 2px solid rgba(255,255,255,0.3);
    background: rgba(0,0,0,0.45);
    color: white;
    font-size: 1.3rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.25s ease;
    backdrop-filter: blur(8px);
}

.story-modal-close:hover {
    background: #c6a43b;
    border-color: #c6a43b;
    color: #003366;
    transform: rotate(90deg);
}

.story-modal-btn {
    display: inline-block;
    padding: 13px 34px;
    border-radius: 40px;
    background: #c6a43b;
    color: #003366;
    text-decoration: none;
    font-size: 0.75rem;
    font-weight: 900;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    transition: all 0.25s ease;
    align-self: flex-start;
}

.story-modal-btn:hover {
    background: #fff8df;
    transform: translateY(-3px);
}

@media (max-width: 768px) {
    .story-modal-box {
        grid-template-columns: 1fr;
        max-height: 95vh;
    }
    .story-modal-img {
        min-height: 260px;
    }
    .story-modal-content {
        padding: 32px 28px;
    }
    .story-modal-content h2 {
        font-size: 1.8rem;
    }
}

/* ==================== TEAM BIODATA MODAL ==================== */
.team-modal-overlay {
    display: none;
    position: fixed;
    inset: 0;
    z-index: 9999;
    background: rgba(0, 15, 30, 0.88);
    backdrop-filter: blur(12px);
    align-items: center;
    justify-content: center;
    padding: 24px;
    animation: modalFadeIn 0.35s ease;
}

.team-modal-overlay.open {
    display: flex;
}

.team-modal-box {
    position: relative;
    background: linear-gradient(145deg, #021d33 0%, #073b63 100%);
    border-radius: 32px;
    border: 1px solid rgba(255,255,255,0.14);
    box-shadow: 0 40px 100px rgba(0,0,0,0.55);
    max-width: 820px;
    width: 100%;
    display: grid;
    grid-template-columns: 320px 1fr;
    overflow: hidden;
    animation: modalSlideUp 0.4s cubic-bezier(0.22, 1, 0.36, 1);
}

.team-modal-img {
    position: relative;
    overflow: hidden;
    min-height: 460px;
}

.team-modal-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.team-modal-img::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(0,0,0,0.05), rgba(0,20,50,0.6));
}

.team-modal-body {
    padding: 50px 42px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    overflow-y: auto;
    max-height: 90vh;
}

.team-modal-role {
    display: inline-block;
    color: #e8b62f;
    font-size: 0.72rem;
    font-weight: 800;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    margin-bottom: 16px;
    padding: 7px 16px;
    border-radius: 40px;
    background: rgba(232,182,47,0.15);
    border: 1px solid rgba(232,182,47,0.3);
    align-self: flex-start;
}

.team-modal-body h2 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2.4rem;
    color: #fff8df;
    line-height: 1.15;
    margin-bottom: 20px;
}

.team-modal-divider {
    width: 50px;
    height: 2px;
    background: #c6a43b;
    margin-bottom: 22px;
    border-radius: 2px;
}

.team-modal-bio-row {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    margin-bottom: 14px;
}

.team-modal-bio-row .bio-icon {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: rgba(232,182,47,0.15);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #e8b62f;
    font-size: 0.9rem;
    flex-shrink: 0;
}

.team-modal-bio-row .bio-text {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.team-modal-bio-row .bio-label {
    color: rgba(255,255,255,0.5);
    font-size: 0.7rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.1em;
}

.team-modal-bio-row .bio-value {
    color: rgba(255,255,255,0.9);
    font-size: 0.92rem;
    line-height: 1.5;
}

.team-modal-desc {
    color: rgba(255,255,255,0.78);
    line-height: 1.85;
    font-size: 0.9rem;
    margin-top: 20px;
    padding-top: 20px;
    border-top: 1px solid rgba(255,255,255,0.1);
}

.team-modal-close {
    position: absolute;
    top: 22px;
    right: 22px;
    z-index: 10;
    width: 44px;
    height: 44px;
    border-radius: 50%;
    border: 2px solid rgba(255,255,255,0.3);
    background: rgba(0,0,0,0.45);
    color: white;
    font-size: 1.3rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.25s ease;
    backdrop-filter: blur(8px);
}

.team-modal-close:hover {
    background: #c6a43b;
    border-color: #c6a43b;
    color: #003366;
    transform: rotate(90deg);
}

.team-card {
    cursor: pointer;
}

.team-card-click-hint {
    position: absolute;
    bottom: 28px;
    right: 28px;
    z-index: 4;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: rgba(232,182,47,0.85);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #003366;
    font-size: 0.85rem;
    transition: all 0.3s ease;
    opacity: 0;
    transform: scale(0.8);
}

.team-card:hover .team-card-click-hint {
    opacity: 1;
    transform: scale(1);
}

@media (max-width: 768px) {
    .team-modal-box {
        grid-template-columns: 1fr;
        max-height: 95vh;
        overflow-y: auto;
    }
    .team-modal-img {
        min-height: 260px;
    }
    .team-modal-body {
        padding: 32px 28px;
        max-height: none;
    }
    .team-modal-body h2 {
        font-size: 1.8rem;
    }
}

/* ==================== NEWS AUTO-SLIDE DOTS ==================== */
.news-dots {
    display: flex;
    justify-content: center;
    gap: 9px;
    margin-top: 28px;
}

.news-dots button {
    width: 9px;
    height: 9px;
    border-radius: 50%;
    border: none;
    background: rgba(0,51,102,0.25);
    cursor: pointer;
    transition: all 0.25s ease;
}

.news-dots button.active {
    width: 30px;
    border-radius: 20px;
    background: #c6a43b;
}

</style>


    <!-- ==================== HERO SLIDER (DYNAMIC) ==================== -->
    <section class="hero-section" id="home">
        <div class="slides-container">
            @forelse($sliders as $i => $slider)
            <div class="slide {{ $i === 0 ? 'active' : '' }}"
                 style="background-image: linear-gradient(rgba(0,36,65,0.55), rgba(0,36,65,0.55)), url('{{ $slider->gambar ? asset($slider->gambar) : asset('images/sibaganding'.($i+1).'.jpg') }}');"></div>
            @empty
            <div class="slide active" style="background-image: linear-gradient(rgba(0,36,65,0.55), rgba(0,36,65,0.55)), url('{{ asset('images/sibaganding1.jpg') }}');"></div>
            @endforelse
        </div>

        <div class="slider-dots">
            @forelse($sliders as $i => $slider)
            <div class="dot {{ $i === 0 ? 'active' : '' }}" data-slide="{{ $i }}"></div>
            @empty
            <div class="dot active" data-slide="0"></div>
            @endforelse
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
                    <div class="map-inner-container" style="position:relative; width:100%; line-height:0;">
                        <img src="{{ asset('images/peta-sibaganding.png') }}" alt="Peta Sibaganding" class="map-img" style="width:100%;display:block;border-radius:26px;">

                    @forelse($faktaUniks as $i => $fakta)
                    @php
                        $px = max(20, min(75, (float)($fakta->x_koordinat ?? 50)));
                        $py = max(25, min(72, (float)($fakta->y_koordinat ?? 50)));
                    @endphp
                    <button class="map-point {{ $i === 0 ? 'active' : '' }}"
                        style="top: {{ $py }}%; left: {{ $px }}%;"
                        data-number="{{ str_pad($fakta->nomor, 2, '0', STR_PAD_LEFT) }}"
                        data-title="{{ $fakta->judul }}"
                        data-desc="{{ $fakta->deskripsi }}"
                        data-tags="{{ $fakta->tag ?? '' }}">
                    </button>
                    @empty
                    {{-- 10 titik tersebar di dalam peta, semua dalam batas 15%-82% --}}
                    <button class="map-point active" style="top:42%;left:36%;" data-number="01" data-title="Taman Wisata Kera Sibaganding" data-desc="Pengunjung dapat melihat monyet ekor panjang dan siamang yang hidup di kawasan hutan sekitar Sibaganding." data-tags="Satwa Liar,Hutan,Ekowisata"></button>
                    <button class="map-point" style="top:32%;left:52%;" data-number="02" data-title="Batu Gantung" data-desc="Batu Gantung adalah fenomena alam yang memiliki legenda mistis dan menjadi daya tarik wisata geologi di kawasan Sibaganding." data-tags="Geologi,Legenda,Wisata"></button>
                    <button class="map-point" style="top:50%;left:63%;" data-number="03" data-title="Panorama Danau Toba" data-desc="Panorama Danau Toba yang memukau terlihat jelas dari kawasan Sibaganding, membentang luas dengan keindahan alam kaldera vulkanik." data-tags="Panorama,Danau,Geologi"></button>
                    <button class="map-point" style="top:64%;left:48%;" data-number="04" data-title="Hutan Pinus Sibaganding" data-desc="Kawasan hutan pinus yang rindang menjadi habitat satwa liar dan destinasi ekowisata yang populer di Sibaganding." data-tags="Hutan,Ekowisata,Alam"></button>
                    <button class="map-point" style="top:58%;left:30%;" data-number="05" data-title="Tradisi Batak Lokal" data-desc="Kehidupan budaya Batak yang kaya masih terjaga di sekitar Sibaganding, mulai dari rumah adat hingga seni tradisional." data-tags="Budaya,Batak,Tradisi"></button>
                    <button class="map-point" style="top:44%;left:20%;" data-number="06" data-title="Jalur Trekking Alam" data-desc="Jalur trekking melintasi perbukitan dan hutan Sibaganding menawarkan pengalaman alam yang otentik dan menakjubkan." data-tags="Trekking,Alam,Petualangan"></button>
                    <button class="map-point" style="top:25%;left:38%;" data-number="07" data-title="Spot Foto Kaldera" data-desc="Titik foto terbaik untuk mengabadikan keindahan kaldera Danau Toba dari ketinggian kawasan Sibaganding." data-tags="Fotografi,Kaldera,Panorama"></button>
                    <button class="map-point" style="top:72%;left:58%;" data-number="08" data-title="Sumber Mata Air Alam" data-desc="Sumber mata air alami yang jernih terdapat di beberapa titik kawasan Sibaganding, menjadi bagian dari ekosistem yang lestari." data-tags="Air,Ekosistem,Alam"></button>
                    <button class="map-point" style="top:78%;left:36%;" data-number="09" data-title="Pertanian Tradisional" data-desc="Lahan pertanian tradisional masyarakat Batak di sekitar Sibaganding mencerminkan harmoni antara manusia dan alam." data-tags="Pertanian,Budaya,Lokal"></button>
                    <button class="map-point" style="top:55%;left:75%;" data-number="10" data-title="Tebing Kaldera Toba" data-desc="Tebing curam hasil letusan purba 74.000 tahun lalu yang membentuk kaldera Toba menjadi bukti nyata sejarah geologi bumi." data-tags="Geologi,Tebing,Sejarah"></button>
                    @endforelse
                    </div>{{-- end map-inner-container --}}
                </div>

                <div class="map-hint">Klik salah satu titik emas pada peta untuk mengganti informasi.</div>
            </div>

            @php $firstFakta = $faktaUniks->first(); @endphp
            <div class="map-info-card" data-aos="fade-left">
                <div class="map-info-label">Titik Informasi</div>
                <div class="map-info-number" id="mapNumber">{{ $firstFakta ? str_pad($firstFakta->nomor, 2, '0', STR_PAD_LEFT) : '01' }}</div>
                <h3 id="mapTitle">{{ $firstFakta ? $firstFakta->judul : 'Fakta Unik Sibaganding' }}</h3>
                <p id="mapDesc">{{ $firstFakta ? $firstFakta->deskripsi : 'Klik titik pada peta untuk melihat informasi.' }}</p>
                <div class="map-info-tags" id="mapTags">
                    @if($firstFakta && $firstFakta->tag)
@foreach(explode(',', $firstFakta->tag) as $tagItem)
                        <span>{{ trim($tagItem) }}</span>
                        @endforeach
                    @endif
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
    <div class="story-slider" style="cursor:pointer;" title="Klik gambar untuk memperbesar">
                    @forelse($warisanGeologis as $warisan)
                    @php
                        $imgUrl = $warisan->gambar ? asset($warisan->gambar) : asset('images/sibaganding1.JPG');
                        $slideLabel = 'SLIDE ' . str_pad($loop->iteration,'2','0',STR_PAD_LEFT) . ' — ' . strtoupper($warisan->sub_judul ?? $warisan->judul);
                        $tags = $warisan->tags ?? ($warisan->tag ?? '');
                        $i = $loop->index;
                    @endphp
        <div class="story-slide {{ $i === 0 ? 'active' : '' }}"
             data-img="{{ $imgUrl }}"
             data-label="{{ $slideLabel }}"
             data-title="{{ $warisan->judul }}"
             data-desc="{{ $warisan->deskripsi }}"
             data-tags="{{ $tags }}"
             data-link="{{ url('/destinasi') }}"
             onclick="openStoryModal(this)">
            <img src="{{ $imgUrl }}" alt="{{ $warisan->judul }}">
            <div class="slide-overlay">
                <small>{{ $slideLabel }}</small>
                <h4>{{ $warisan->judul }}</h4>
                <p>{{ $warisan->deskripsi }}</p>
            </div>
        </div>
        @empty
        <div class="story-slide active"
             data-img="{{ asset('images/danau toba home.jpg') }}"
             data-label="SLIDE 01 — WARISAN GEOLOGI"
             data-title="Warisan Geologi Sibaganding"
             data-desc="Kawasan Sibaganding menyimpan warisan geologi yang bernilai tinggi sebagai bagian dari Geopark Danau Toba. Kaldera Toba terbentuk dari letusan supermassive 74.000 tahun lalu yang mengubah bentang alam Sumatera Utara."
             data-tags="Geologi,Kaldera,Geopark"
             data-link="{{ url('/destinasi') }}"
             onclick="openStoryModal(this)">
            <img src="{{ asset('images/danau toba home.jpg') }}" alt="Danau Toba">
            <div class="slide-overlay">
                <small>SLIDE 01 — WARISAN GEOLOGI</small>
                <h4>Warisan Geologi Sibaganding</h4>
                <p>Kawasan Sibaganding menyimpan warisan geologi yang bernilai tinggi sebagai bagian dari Geopark Danau Toba.</p>
            </div>
        </div>
        @endforelse

     <button class="story-nav prev" type="button" onclick="event.preventDefault(); event.stopPropagation(); changeStorySlide(-1);">
    &#10094;
</button>

<button class="story-nav next" type="button" onclick="event.preventDefault(); event.stopPropagation(); changeStorySlide(1);">
    &#10095;
</button>

        <div class="story-dots" onclick="event.stopPropagation()">
            @forelse($warisanGeologis as $i => $warisan)
            <button class="{{ $i === 0 ? 'active' : '' }}" type="button"></button>
            @empty
            <button class="active" type="button"></button>
            @endforelse
        </div>

        {{-- Hint klik --}}
        <div style="position:absolute;top:16px;right:16px;z-index:8;background:rgba(0,0,0,0.45);color:#e8b62f;padding:7px 14px;border-radius:30px;font-size:0.7rem;font-weight:700;letter-spacing:0.12em;backdrop-filter:blur(8px);pointer-events:none;">🔍 Klik untuk perbesar</div>
    </div>
</div>

{{-- Story Image Modal --}}
<div class="story-modal-overlay" id="storyModalOverlay" onclick="if(event.target===this) closeStoryModal()">
    <div class="story-modal-box">
        <button class="story-modal-close" onclick="closeStoryModal()">&#10005;</button>
        <div class="story-modal-img">
            <img id="storyModalImg" src="" alt="">
        </div>
        <div class="story-modal-content">
            <div class="story-modal-kicker" id="storyModalLabel"></div>
            <h2 id="storyModalTitle"></h2>
            <p id="storyModalDesc"></p>
            <div class="story-modal-tags" id="storyModalTags"></div>
            <a href="{{ url('/informasi') }}" class="story-modal-btn">Jelajahi Lebih Lanjut →</a>
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

                    <a href="{{ route('destinasi.biodiversity') }}" class="pilar-link">Jelajahi Lebih Lanjut →</a>
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

                    <a href="{{ route('destinasi.geodiversity') }}" class="pilar-link">Jelajahi Lebih Lanjut →</a>
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

                    <a href="{{ route('destinasi.culture-diversity') }}" class="pilar-link">Jelajahi Lebih Lanjut →</a>
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
              @forelse($galeri as $i => $item)
<div class="gallery-card">
   @php
    $rawGambar = $item->gambar ? ltrim($item->gambar, '/') : null;

    if ($rawGambar) {
        if (str_starts_with($rawGambar, 'http://') || str_starts_with($rawGambar, 'https://')) {
            $gambarGaleri = $rawGambar;
        } elseif (str_starts_with($rawGambar, 'storage/')) {
            $gambarGaleri = asset($rawGambar);
        } else {
            $gambarGaleri = asset('storage/' . $rawGambar);
        }
    } else {
        $gambarGaleri = asset('images/sibaganding1.JPG');
    }
@endphp


<img 
    src="{{ $gambarGaleri }}" 
    alt="{{ $item->judul ?? 'Galeri '.($i+1) }}"
    onerror="this.onerror=null; this.src='{{ asset('images/sibaganding1.JPG') }}';"
>

    <div class="gallery-caption">
        <span>{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
        <h4>{{ $item->judul ?? 'Keindahan Sibaganding' }}</h4>
    </div>
</div>
@empty
                {{-- 10 gambar default menggunakan galleri-1 s/d galleri-10 yang sudah ada --}}
               @php
    $defaultGallery = [
        0 => asset('images/galleri-1.jpg'),
        1 => asset('images/galleri-2.JPG'),
        2 => asset('images/galleri-3.jpg'),
        3 => asset('images/galleri-4.jpg'),
        4 => asset('images/galleri-5.JPG'),
        5 => asset('images/galleri-6.JPG'),
        6 => asset('images/galleri-7.JPG'),
        7 => asset('images/galleri-8.JPG'),
        8 => asset('images/galleri-9.jpg'),
        9 => asset('images/galleri-10.jpg'),
    ];

    $i = 0;
    $fallbackGambar = $defaultGallery[$i % 10];
    
    $galeriExts = [
        1 => 'jpg', 2 => 'JPG', 3 => 'jpg', 4 => 'jpg', 5 => 'JPG',
        6 => 'JPG', 7 => 'JPG', 8 => 'JPG', 9 => 'jpg', 10 => 'jpg'
    ];
    
    $galeriTitles = [
        1 => 'Pemandangan Sibaganding', 2 => 'Danau Toba', 3 => 'Warisan Geologi',
        4 => 'Keindahan Alam', 5 => 'Destinasi Wisata', 6 => 'Landscape',
        7 => 'Panorama', 8 => 'Geologi Unik', 9 => 'Sibaganding', 10 => 'Geosite'
    ];
@endphp
                @for($g = 1; $g <= 10; $g++)
                <div class="gallery-card">
                    <img src="{{ asset('images/galleri-'.$g.'.'.$galeriExts[$g]) }}" alt="{{ $galeriTitles[$g] }}" onerror="this.src='{{ asset('images/sibaganding1.JPG') }}'">
                    <div class="gallery-caption">
                        <span>{{ str_pad($g, 2, '0', STR_PAD_LEFT) }}</span>
                        <h4>{{ $galeriTitles[$g] }}</h4>
                    </div>
                </div>
                @endfor
                @endforelse
            </div>

            <button class="gallery-arrow gallery-prev" type="button">&#10094;</button>
            <button class="gallery-arrow gallery-next" type="button">&#10095;</button>
        </div>

        <div class="gallery-dots" id="galleryDots">
            @forelse($galeri as $i => $item)
            <button class="{{ $i === 0 ? 'active' : '' }}" type="button"></button>
            @empty
            @for($g = 0; $g < 10; $g++)
            <button class="{{ $g === 0 ? 'active' : '' }}" type="button"></button>
            @endfor
            @endforelse
        </div>

        <div style="text-align:center; margin-top: 40px;" data-aos="fade-up">
            <a href="{{ route('galeri') }}" class="pilar-link" style="font-size:0.8rem;">Jelajahi Galeri Lebih Banyak →</a>
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
                    @forelse($videoYoutubes as $i => $video)
                    <div class="video-card">
                        <div class="video-frame">
                            <iframe
                                src="https://www.youtube.com/embed/{{ $video->youtube_id }}"
                                title="{{ $video->judul }}"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        </div>
                        <div class="video-info">
                            <span>{{ str_pad($i+1, 2, '0', STR_PAD_LEFT) }}</span>
                            <h4>{{ $video->judul }}</h4>
                            <p>{{ $video->deskripsi }}</p>
                        </div>
                    </div>
                    @empty
                    <div class="video-card">
                        <div class="video-frame">
                            <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Video Sibaganding" allowfullscreen></iframe>
                        </div>
                        <div class="video-info">
                            <span>01</span>
                            <h4>Pesona Alam Sibaganding</h4>
                            <p>Nikmati keindahan alam dan panorama kawasan Geosite Sibaganding.</p>
                        </div>
                    </div>
                    @endforelse
                </div>

                <button class="video-arrow video-prev" type="button">&#10094;</button>
                <button class="video-arrow video-next" type="button">&#10095;</button>
            </div>

            <div class="video-mini-list" id="videoDots">
                @forelse($videoYoutubes as $i => $video)
                <button class="{{ $i === 0 ? 'active' : '' }}" type="button">{{ str_pad($i+1, 2, '0', STR_PAD_LEFT) }}</button>
                @empty
                <button class="active" type="button">01</button>
                @endforelse
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

                @forelse($berita as $i => $b)
                <div class="news-card">
                    <img src="{{ $b->gambar ? asset($b->gambar) : asset('images/galleri-'.($i+1).'.jpg') }}" alt="{{ $b->judul }}">
                    <div class="news-content">
                        <span>{{ $b->kategori ? $b->kategori->nama : 'Berita' }} • Sibaganding</span>
                        <h4>{{ $b->judul }}</h4>
                        <p>{{ Str::limit(strip_tags($b->konten ?? $b->isi ?? ''), 100) }}</p>
                        <a href="{{ route('berita.detail', $b->slug) }}">Baca Selengkapnya →</a>
                    </div>
                </div>
                @empty
                @for($n = 1; $n <= 3; $n++)
                <div class="news-card">
                    <img src="{{ asset('images/galleri-'.$n.'.jpg') }}" alt="Berita">
                    <div class="news-content">
                        <span>Berita • Sibaganding</span>
                        <h4>Informasi Terbaru Geosite Sibaganding</h4>
                        <p>Ikuti informasi terbaru seputar kegiatan dan pengembangan Geopark Sibaganding.</p>
                        <a href="{{ route('berita') }}">Baca Selengkapnya →</a>
                    </div>
                </div>
                @endfor
                @endforelse

            </div>

            <button class="news-arrow news-prev" type="button">&#10094;</button>
            <button class="news-arrow news-next" type="button">&#10095;</button>
        </div>

        <div class="news-dots" id="newsDots">
            @forelse($berita as $i => $b)
            <button class="{{ $i === 0 ? 'active' : '' }}" type="button"></button>
            @empty
            @for($n = 0; $n < 3; $n++)
            <button class="{{ $n === 0 ? 'active' : '' }}" type="button"></button>
            @endfor
            @endforelse
        </div>
    </div>
</section>

<!-- ==================== PENGURUS SIBAGANDING ==================== -->
<section class="team-section">
    <div class="container">
        <div class="section-title team-title" data-aos="fade-up">
            <span class="team-kicker">Tim Pengelola</span>
            <h2>Pengurus Sibaganding</h2>
            <div class="divider"></div>
            <p>
                Orang-orang yang berperan dalam menjaga, mengembangkan, dan memperkenalkan
                potensi wisata, geologi, budaya, serta kekayaan alam Sibaganding.
            </p>
        </div>

        <div class="team-grid" style="grid-template-columns: repeat(2, 1fr); max-width: 820px; margin: 0 auto;">

            <div class="team-card" data-aos="fade-right"
                 onclick="openTeamModal({
                     img: '{{ asset('images/pengurus-1.jpg') }}',
                     role: 'Ketua Pengelola',
                     name: 'Pengelola Sibaganding',
                     instansi: 'Geosite Sibaganding — Geopark Danau Toba',
                     bidang: 'Manajemen & Pengembangan Kawasan',
                     kontak: 'sibaganding@geotoba.id',
                     desc: 'Bertanggung jawab mengoordinasikan seluruh pengelolaan kawasan Geosite Sibaganding, termasuk pengembangan program wisata, kerja sama kelembagaan, dan peningkatan fasilitas pengunjung. Memimpin tim dalam menjaga kelestarian alam, budaya, dan nilai geologi kawasan sebagai bagian dari Geopark Danau Toba UNESCO Global Geopark.'
                 })">
                <div class="team-image">
                    <img src="{{ asset('images/pengurus-1.jpg') }}" alt="Pengurus Sibaganding 1">
                </div>
                <div class="team-info">
                    <span>Ketua Pengelola</span>
                    <h3>Pengelola Sibaganding</h3>
                    <p>
                        Bertanggung jawab mengoordinasikan pengelolaan kawasan,
                        pengembangan program, dan kerja sama terkait Geosite Sibaganding.
                    </p>
                </div>
                <div class="team-card-click-hint">👁</div>
            </div>

            <div class="team-card" data-aos="fade-left"
                 onclick="openTeamModal({
                     img: '{{ asset('images/pengurus-2.jpg') }}',
                     role: 'Koordinator Lapangan',
                     name: 'Koordinator Wisata',
                     instansi: 'Geosite Sibaganding — Lapangan Operasional',
                     bidang: 'Operasional Wisata & Pelayanan Pengunjung',
                     kontak: 'wisata.sibaganding@geotoba.id',
                     desc: 'Bertugas mendampingi seluruh kegiatan lapangan di kawasan Geosite Sibaganding, membantu dan melayani pengunjung, serta memastikan semua aktivitas wisata berjalan aman, nyaman, dan optimal. Berkoordinasi langsung dengan tim pengelola dan pemandu wisata lokal.'
                 })">
                <div class="team-image">
                    <img src="{{ asset('images/pengurus-2.jpg') }}" alt="Pengurus Sibaganding 2">
                </div>
                <div class="team-info">
                    <span>Koordinator Lapangan</span>
                    <h3>Koordinator Wisata</h3>
                    <p>
                        Bertugas mendampingi kegiatan lapangan, membantu pengunjung,
                        dan memastikan aktivitas wisata berjalan optimal.
                    </p>
                </div>
                <div class="team-card-click-hint">👁</div>
            </div>

        </div>

        {{-- Team Biodata Modal --}}
        <div class="team-modal-overlay" id="teamModalOverlay" onclick="if(event.target===this) closeTeamModal()">
            <div class="team-modal-box">
                <button class="team-modal-close" onclick="closeTeamModal()">&#10005;</button>
                <div class="team-modal-img">
                    <img id="teamModalImg" src="" alt="">
                </div>
                <div class="team-modal-body">
                    <span class="team-modal-role" id="teamModalRole"></span>
                    <h2 id="teamModalName"></h2>
                    <div class="team-modal-divider"></div>
                    <div class="team-modal-bio-row">
                        <div class="bio-icon">🏛</div>
                        <div class="bio-text">
                            <span class="bio-label">Instansi</span>
                            <span class="bio-value" id="teamModalInstansi"></span>
                        </div>
                    </div>
                    <div class="team-modal-bio-row">
                        <div class="bio-icon">📋</div>
                        <div class="bio-text">
                            <span class="bio-label">Bidang Tugas</span>
                            <span class="bio-value" id="teamModalBidang"></span>
                        </div>
                    </div>
                    <div class="team-modal-bio-row">
                        <div class="bio-icon">✉</div>
                        <div class="bio-text">
                            <span class="bio-label">Kontak</span>
                            <span class="bio-value" id="teamModalKontak"></span>
                        </div>
                    </div>
                    <p class="team-modal-desc" id="teamModalDesc"></p>
                </div>
            </div>
        </div>

        <div class="team-action" data-aos="fade-up">
            <a href="{{ url('/kontak') }}" class="team-contact-btn">Hubungi Pengurus</a>
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
    let galleryAutoTimer = null;

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

        galleryTrack.style.transition = 'transform 0.85s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
        galleryTrack.style.transform = 'translateX(-' + move + 'px)';

        galleryDots.forEach(function (dot) {
            dot.classList.remove('active');
        });

        if (galleryDots[galleryCurrent]) {
            galleryDots[galleryCurrent].classList.add('active');
        }
    }

    function startGalleryAuto() {
        if (galleryAutoTimer) clearInterval(galleryAutoTimer);
        galleryAutoTimer = setInterval(function () {
            showGallerySlide(galleryCurrent + 1);
        }, 4500);
    }

    if (galleryPrev) {
        galleryPrev.addEventListener('click', function () {
            showGallerySlide(galleryCurrent - 1);
            startGalleryAuto();
        });
    }

    if (galleryNext) {
        galleryNext.addEventListener('click', function () {
            showGallerySlide(galleryCurrent + 1);
            startGalleryAuto();
        });
    }

    galleryDots.forEach(function (dot, index) {
        dot.addEventListener('click', function () {
            showGallerySlide(index);
            startGalleryAuto();
        });
    });

    if (galleryCards.length) {
        showGallerySlide(0);
        startGalleryAuto();

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
const newsDots = document.querySelectorAll('#newsDots button');
const newsPrev = document.querySelector('.news-prev');
const newsNext = document.querySelector('.news-next');
let newsAutoTimer = null;

function getNewsPerView() {
    if (window.innerWidth <= 576) return 1;
    if (window.innerWidth <= 992) return 2;
    return 3;
}

function showNewsSlide(index) {
    if (!newsTrack || !newsCards.length) return;

    const perView = getNewsPerView();
    const maxIndex = Math.max(0, newsCards.length - perView);

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

    newsTrack.style.transition = 'transform 0.75s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
    newsTrack.style.transform = 'translateX(-' + move + 'px)';

    newsDots.forEach(function (dot) { dot.classList.remove('active'); });
    if (newsDots[newsCurrent]) { newsDots[newsCurrent].classList.add('active'); }
}

function startNewsAuto() {
    if (newsAutoTimer) clearInterval(newsAutoTimer);
    newsAutoTimer = setInterval(function () {
        showNewsSlide(newsCurrent + 1);
    }, 5500);
}

if (newsPrev) {
    newsPrev.addEventListener('click', function () {
        showNewsSlide(newsCurrent - 1);
        startNewsAuto();
    });
}

if (newsNext) {
    newsNext.addEventListener('click', function () {
        showNewsSlide(newsCurrent + 1);
        startNewsAuto();
    });
}

newsDots.forEach(function (dot, index) {
    dot.addEventListener('click', function () {
        showNewsSlide(index);
        startNewsAuto();
    });
});

if (newsCards.length) {
    showNewsSlide(0);
    startNewsAuto();

    window.addEventListener('resize', function () {
        showNewsSlide(newsCurrent);
    });
}

// ==================== STORY IMAGE MODAL ====================
function openStoryModal(el) {
    const overlay = document.getElementById('storyModalOverlay');
    if (!overlay) return;
    document.getElementById('storyModalImg').src = el.dataset.img || '';
    document.getElementById('storyModalImg').alt = el.dataset.title || '';
    document.getElementById('storyModalLabel').textContent = el.dataset.label || '';
    document.getElementById('storyModalTitle').textContent = el.dataset.title || '';
    document.getElementById('storyModalDesc').textContent = el.dataset.desc || '';
    const tagsContainer = document.getElementById('storyModalTags');
    tagsContainer.innerHTML = '';
    if (el.dataset.tags) {
        el.dataset.tags.split(',').forEach(function(tag) {
            if (tag.trim()) {
                const sp = document.createElement('span');
                sp.textContent = tag.trim();
                tagsContainer.appendChild(sp);
            }
        });
    }
    const link = document.getElementById('storyModalLink');
    if (link) link.href = el.dataset.link || '#';
    overlay.classList.add('open');
    document.body.style.overflow = 'hidden';
}

function closeStoryModal() {
    const overlay = document.getElementById('storyModalOverlay');
    if (overlay) overlay.classList.remove('open');
    document.body.style.overflow = '';
}

// ==================== TEAM BIODATA MODAL ====================
function openTeamModal(data) {
    const overlay = document.getElementById('teamModalOverlay');
    if (!overlay) return;
    document.getElementById('teamModalImg').src = data.img || '';
    document.getElementById('teamModalRole').textContent = data.role || '';
    document.getElementById('teamModalName').textContent = data.name || '';
    document.getElementById('teamModalInstansi').textContent = data.instansi || '-';
    document.getElementById('teamModalBidang').textContent = data.bidang || '-';
    document.getElementById('teamModalKontak').textContent = data.kontak || '-';
    document.getElementById('teamModalDesc').textContent = data.desc || '';
    overlay.classList.add('open');
    document.body.style.overflow = 'hidden';
}

function closeTeamModal() {
    const overlay = document.getElementById('teamModalOverlay');
    if (overlay) overlay.classList.remove('open');
    document.body.style.overflow = '';
}

// Keyboard ESC close modals
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeStoryModal();
        closeTeamModal();
    }
});


let storyCurrentSlide = 0;

function showStorySlide(index) {
    const slides = document.querySelectorAll('.story-slide');
    const dots = document.querySelectorAll('.story-dots button');

    if (!slides.length) return;

    if (index < 0) {
        storyCurrentSlide = slides.length - 1;
    } else if (index >= slides.length) {
        storyCurrentSlide = 0;
    } else {
        storyCurrentSlide = index;
    }

    slides.forEach(slide => slide.classList.remove('active'));
    dots.forEach(dot => dot.classList.remove('active'));

    slides[storyCurrentSlide].classList.add('active');

    if (dots[storyCurrentSlide]) {
        dots[storyCurrentSlide].classList.add('active');
    }
}

function changeStorySlide(direction) {
    showStorySlide(storyCurrentSlide + direction);
}
</script>




@endsection
