@extends('layouts.admin')

@section('title', 'Tambah Titik Fakta Unik')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-plus me-2" style="color: #c6a43b;"></i>
            Tambah Titik Baru
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.fakta-unik.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="nomor" class="form-label">Nomor Titik <span class="text-danger">*</span></label>
                    <input type="text" name="nomor" id="nomor" class="form-control @error('nomor') is-invalid @enderror" value="{{ old('nomor') }}" placeholder="Contoh: 01, 02, atau 10" required>
                    @error('nomor')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-8 mb-3">
                    <label for="judul" class="form-label">Judul Titik <span class="text-danger">*</span></label>
                    <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" placeholder="Nama Destinasi / Fakta" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Cerita / Fakta <span class="text-danger">*</span></label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Tuliskan cerita menarik tentang fakta unik ini..." required>{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tag" class="form-label">Tags / Kategori Kecil</label>
                <input type="text" name="tag" id="tag" class="form-control @error('tag') is-invalid @enderror" value="{{ old('tag') }}" placeholder="Pisahkan dengan koma. Contoh: Ekowisata,Satwa Liar,Hutan">
                @error('tag')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row border p-3 rounded mb-3 bg-light">
                <div class="col-12 mb-2">
                    <strong class="text-muted"><i class="fas fa-map me-1"></i> Atur Koordinat Titik Peta (%)</strong>
                    <div class="form-text text-muted">Tentukan letak titik dalam persentase (0-100) dari tepi gambar peta.</div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="x_koordinat" class="form-label">Posisi Horizontal (X / Left) % <span class="text-danger">*</span></label>
                    <input type="number" step="0.1" name="x_koordinat" id="x_koordinat" class="form-control @error('x_koordinat') is-invalid @enderror" value="{{ old('x_koordinat', 50.0) }}" min="0" max="100" required>
                    @error('x_koordinat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="y_koordinat" class="form-label">Posisi Vertikal (Y / Top) % <span class="text-danger">*</span></label>
                    <input type="number" step="0.1" name="y_koordinat" id="y_koordinat" class="form-control @error('y_koordinat') is-invalid @enderror" value="{{ old('y_koordinat', 50.0) }}" min="0" max="100" required>
                    @error('y_koordinat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 form-check form-switch">
                <input class="form-check-input" type="checkbox" name="status" id="status" value="1" checked>
                <label class="form-check-label" for="status">Aktifkan Titik (Ditampilkan di peta halaman utama)</label>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.fakta-unik.index') }}" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn" style="background: #c6a43b; color: white;">Simpan Titik</button>
            </div>
        </form>
    </div>
</div>
@endsection
