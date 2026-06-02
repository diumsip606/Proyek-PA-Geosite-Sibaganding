@extends('layouts.app')

@section('title', 'Geosite Sibaganding - Gallery')

@section('content')

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

/* ================= HERO ================= */
.gallery-hero{
    position:relative;
    width:100%;
    height:85vh;
    overflow:hidden;
}

.gallery-hero img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.hero-overlay{
    position:absolute;
    inset:0;
    background:
        linear-gradient(
            to bottom,
            rgba(0,0,0,0.45),
            rgba(0,0,0,0.75)
        );
    z-index:1;
}

.hero-content{
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%, -50%);
    z-index:2;
    text-align:center;
    color:white;
    width:90%;
}

.hero-content h1{
    font-size:5rem;
    font-weight:800;
    margin-bottom:20px;
    text-shadow:0 10px 30px rgba(0,0,0,0.5);
}

.hero-content p{
    font-size:1.3rem;
    color:#e2e8f0;
    max-width:700px;
    margin:auto;
    line-height:1.8;
}

/* ================= GALLERY ================= */
.gallery-wrapper{
    padding:80px 20px;
    text-align:center;
    max-width:1400px;
    margin:auto;
}

.gallery-title{
    margin-bottom:60px;
}

.gallery-title h2{
    font-size:3.5rem;
    font-family:serif;
    color:#000000;
}

.gallery-title p{
    color:#000000;;
    margin-top:10px;
}

/* ================= BAGIAN GALERI/FOTO DOKUMENTASI ================= */
.stack-area {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); /* Mengatur kolom responsif */
    gap: 20px; /* Jarak antar gambar */
    padding: 40px 20px;
    max-width: 1200px;
    margin: 0 auto;
}

.card-item {
    position: relative;
    width: 100%; /* Mengikuti lebar grid */
    height: 320px; /* Tinggi gambar dibuat seragam */
    margin: 0; /* Menghapus margin negatif sebelumnya */
    border: 8px solid #ffffff; /* Menambahkan bingkai putih tebal */
    background: #333;
    overflow: hidden;
    box-shadow: 0 10px 20px rgba(0,0,0,0.5); /* Efek bayangan figura */
    transition: all .3s ease;
    cursor: pointer;
    border-radius: 0; /* Figura biasanya kotak, hapus radius */
}

.card-item img{
    width:100%;
    height:100%;
    object-fit:cover;
    transition:.5s ease;
}

.card-item::after{
    display: none;
}

.card-item:hover{
    transform: scale(1.15);
    box-shadow: 0 15px 30px rgba(0,0,0,0.8);
    z-index:20;
}

.card-item:hover img{
    transform:scale(1.1);
}

/* ================= MODAL ================= */
.modal-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.85);
    z-index: 9999;
    display: none;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(8px);
    padding: 20px;
}

.modal-box {
    background: #1a1a1a;
    width: 100%;
    max-width: 700px; /* Diperkecil agar pas untuk layout vertikal */
    max-height: 90vh; /* Membatasi tinggi maksimal agar tidak tembus layar */
    display: flex;
    flex-direction: column; /* Mengubah susunan menjadi atas-bawah */
    border-radius: 20px;
    overflow: hidden;
    animation: zoomIn .3s ease;
    box-shadow: 0 15px 40px rgba(0,0,0,0.5);
}

@keyframes zoomIn {
    from { opacity: 0; transform: scale(.9); }
    to { opacity: 1; transform: scale(1); }
}

.modal-img-part {
    width: 100%;
    height: 350px; /* Tinggi gambar dibuat statis */
    background: #000;
    flex-shrink: 0;
}

.modal-img-part img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Gambar memenuhi area atas */
}

.modal-text-part {
    padding: 30px 40px;
    color: white;
    text-align: left;
    overflow-y: auto; /* MENGAKTIFKAN SCROLL JIKA TEKS PANJANG */
}

/* Custom Scrollbar untuk bagian teks */
.modal-text-part::-webkit-scrollbar {
    width: 6px;
}
.modal-text-part::-webkit-scrollbar-track {
    background: #1a1a1a;
}
.modal-text-part::-webkit-scrollbar-thumb {
    background: #444;
    border-radius: 10px;
}
.modal-text-part::-webkit-scrollbar-thumb:hover {
    background: #0dcaf0;
}

.modal-text-part small {
    color: #0dcaf0;
    letter-spacing: 2px;
    font-weight: bold;
    font-size: 0.85rem;
    text-transform: uppercase;
}

.modal-text-part h2 {
    font-size: 1.8rem;
    margin: 10px 0 15px 0;
}

.modal-text-part p {
    color: #bbb;
    line-height: 1.7;
    margin: 0;
}

.close-btn {
    position: absolute;
    top: 20px;
    right: 25px;
    color: white;
    font-size: 2rem;
    cursor: pointer;
    z-index: 10000;
    transition: 0.2s;
}
.close-btn:hover {
    color: #0dcaf0;
    transform: scale(1.1);
}

/* ================= MOBILE ================= */
@media(max-width:768px){

    .gallery-hero{
        height:60vh;
    }

    .hero-content h1{
        font-size:2.8rem;
    }

    .hero-content p{
        font-size:1rem;
    }

    .modal-box {
        max-height: 95vh;
    }
    .modal-img-part {
        height: 250px; /* Gambar lebih pendek di HP */
    }
    .modal-text-part {
        padding: 20px;
    }
    .modal-text-part h2 {
        font-size: 1.4rem;
    }

    .card-item{
        width: 100%;
        height: 250px;
        border: 5px solid #ffffff; /* Bingkai sedikit ditipiskan di HP */
        margin: 0;
    }

    .stack-area {
        grid-template-columns: repeat(auto-fill, minmax(140px, 1fr)); /* Buat 2 kolom di HP */
        gap: 15px;
    }

    .gallery-title h2{
        font-size:2.5rem;
    }
}

</style>




<!-- ================= HERO ================= -->
<div class="gallery-hero">

    <div class="hero-overlay"></div>

   <img
    src="{{ asset('image/tuktuk/Tuktuk.jpg') }}"
    alt="Danau Toba">

    <div class="hero-content">
        <h1>Sibaganding</h1>

        <p>
            Galeri ke Indahan Sibaganding
        </p>
    </div>

</div>

<!-- ================= GALLERY ================= -->
<div class="gallery-wrapper">

    <div class="gallery-title">
        <h2>SIBAGANDING</h2>
        <p>Kumpulan dokumentasi wisata Geosite Sibaganding</p>
    </div>

    <div class="stack-area">

        @foreach($galeriByKategori as $kategori => $items)

            @foreach($items as $item)

                @php

                    if(strlen($item->gambar) > 500){
                        $src = 'data:image/jpeg;base64,' . base64_encode($item->gambar);
                    }else{
                        $src = asset('storage/' . $item->gambar);
                    }



                @endphp

                <div class="card-item"
                    data-src="{{ $src }}"
                    data-title="{{ $item->judul }}"
                    data-desc="{{ $item->deskripsi }}"

                    data-tag="{{ is_string($kategori) && json_decode($kategori) ? json_decode($kategori)->nama ?? 'Tanpa Kategori' : $kategori }}"

                    onclick="openPhoto(this)">

                    <img
                        src="{{ $src }}"
                        onerror="this.src='https://via.placeholder.com/300x500?text=Upload+Foto'">

                </div>

            @endforeach

        @endforeach

    </div>

</div>

<!-- ================= MODAL ================= -->
<div id="pModal" class="modal-overlay" onclick="closePhoto()">

    <div class="close-btn">
        <i class="bi bi-x-lg"></i>
    </div>

    <div class="modal-box" onclick="event.stopPropagation()">

        <div class="modal-img-part">
            <img src="" id="mImg">
        </div>

        <div class="modal-text-part">

            <small id="mTag"></small>

            <h2 id="mTitle"></h2>

            <p id="mDesc"></p>

        </div>

    </div>

</div>

<script>

/* ================= JAVASCRIPT OPEN PHOTO ================= */
function openPhoto(element){
    // Menarik data dinamis dengan aman dari atribut HTML
    let src = element.getAttribute('data-src');
    let title = element.getAttribute('data-title');
    let desc = element.getAttribute('data-desc');
    let tag = element.getAttribute('data-tag');

    document.getElementById('mImg').src = src;
    document.getElementById('mTitle').innerText = title;
    document.getElementById('mTag').innerText = tag;
    document.getElementById('mDesc').innerText = desc || 'Tidak ada deskripsi.';

    document.getElementById('pModal').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

/* ================= CLOSE PHOTO ================= */
function closePhoto(){

    document.getElementById('pModal').style.display = 'none';

    document.body.style.overflow = 'auto';
}

/* ================= ESC CLOSE ================= */
document.addEventListener('keydown', function(e){

    if(e.key === 'Escape'){
        closePhoto();
    }

});

</script>

@endsection
