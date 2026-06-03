@extends('layouts.admin')

@section('title', 'Tambah Slide Beranda')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-plus me-2" style="color: #c6a43b;"></i>
            Tambah Slide Baru
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.hero-slider.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar Slide <span class="text-danger">*</span></label>
                <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror" required>
                <div class="form-text text-muted">Format: jpeg, png, jpg, gif. Ukuran Maks: 3MB. Rekomendasi rasio: 16:9 (1920x1080).</div>
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="urutan" class="form-label">Urutan Tampilan <span class="text-danger">*</span></label>
                <input type="number" name="urutan" id="urutan" class="form-control @error('urutan') is-invalid @enderror" value="{{ old('urutan', 1) }}" min="1" required>
                <div class="form-text text-muted">Angka lebih kecil akan muncul terlebih dahulu.</div>
                @error('urutan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-check form-switch">
                <input class="form-check-input" type="checkbox" name="status" id="status" value="1" checked>
                <label class="form-check-label" for="status">Aktifkan Slide (Langsung Ditampilkan)</label>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.hero-slider.index') }}" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn" style="background: #c6a43b; color: white;">Simpan Slide</button>
            </div>
        </form>
    </div>
</div>
@endsection
