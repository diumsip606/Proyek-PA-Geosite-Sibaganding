@extends('layouts.app')

@section('content')

<style>
.hero-detail {
    height: 75vh;
    background-size: cover;
    background-position: center;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    overflow: hidden;
}

.hero-overlay {
    position: absolute;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, rgba(0,0,0,0.4), rgba(0,0,0,0.7));
}

.hero-text {
    position: relative;
    z-index: 2;
    text-align: center;
    animation: fadeIn 1.5s ease-in-out;
}

@keyframes fadeIn {
    from {opacity: 0; transform: translateY(20px);}
    to {opacity: 1; transform: translateY(0);}
}

.gallery img {
    height: 220px;
    object-fit: cover;
    border-radius: 15px;
    transition: 0.4s;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
}

.gallery img:hover {
    transform: scale(1.07);
}

.card-custom {
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    padding: 25px;
    background: white;
    transition: 0.3s;
}

.card-custom:hover {
    transform: translateY(-5px);
}
</style>

<!-- HERO -->
<div class="hero-detail" style="background-image: url('{{ asset('storage/' . $data->gambar_utama) }}')">
    <div class="hero-overlay"></div>
    <div class="hero-text">
        <h1 class="display-3 fw-bold">{{ $data->nama }}</h1>
        <p class="lead">{{ $data->kategori->nama ?? 'Geosite Danau Toba' }}</p>
    </div>
</div>

<!-- CONTENT -->
<div class="container py-5">

    <!-- DESKRIPSI -->
    <div class="card-custom mb-5">
        <h2 class="mb-3">Deskripsi</h2>
        <p>{{ $data->deskripsi }}</p>
    </div>

    

    <!-- GOOGLE MAPS -->
    <div class="card-custom mb-5">
        <h2 class="mb-3">Lokasi</h2>

        <iframe 
            src="https://www.google.com/maps?q={{ $data->maps ?? 'Danau Toba' }}&output=embed"
            width="100%" 
            height="400" 
            style="border:none;">
        </iframe>
    </div>

    <!-- DESTINASI LAINNYA -->
    @if(isset($otherDestinasi) && count($otherDestinasi) > 0)
    <div class="card-custom mb-5">
        <h2 class="mb-4">Destinasi Lainnya</h2>
        <div class="row">
            @foreach($otherDestinasi as $other)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="{{ asset('storage/' . $other->gambar_utama) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $other->nama }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $other->nama }}</h5>
                        <p class="card-text text-muted small">{{ Str::limit($other->deskripsi, 80) }}</p>
                        <a href="{{ route('destinasi.show', $other->id) }}" class="btn btn-outline-primary btn-sm rounded-pill">Jelajahi <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- BUTTON -->
    <a href="{{ url('/destinasi') }}" class="btn btn-primary rounded-pill px-4 shadow">
        ← Kembali
    </a>

</div>

@endsection