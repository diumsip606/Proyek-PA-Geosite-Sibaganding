@extends('layouts.admin')

@section('title', 'Tambah Slide Warisan Geologi')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-plus me-2" style="color: #c6a43b;"></i>
            Tambah Slide Warisan Geologi Baru
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.warisan-geologi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="sub_judul" class="form-label">Sub Judul (Kicker) <span class="text-danger">*</span></label>
                    <input type="text" name="sub_judul" id="sub_judul" class="form-control @error('sub_judul') is-invalid @enderror" value="{{ old('sub_judul') }}" placeholder="Contoh: SLIDE 01 — TERBENTUKNYA DANAU TOBA" required>
                    @error('sub_judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="judul" class="form-label">Judul Utama <span class="text-danger">*</span></label>
                    <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" placeholder="Contoh: Letusan Purba Melahirkan Danau Toba" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Cerita <span class="text-danger">*</span></label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Tuliskan penjelasan detail cerita geologi..." required>{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar Slide <span class="text-danger">*</span></label>
                <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror" required>
                <div class="form-text text-muted">Format: jpeg, png, jpg, gif. Maks: 3MB. Rasio Rekomendasi: 4:3 atau 16:9.</div>
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row border p-3 rounded mb-3 bg-light">
                <div class="col-12 mb-2">
                    <strong class="text-muted"><i class="fas fa-id-card me-1"></i> Atur Info Kartu Melayang (Float Card)</strong>
                    <div class="form-text text-muted">Kartu kecil berisi data statistik/angka singkat yang melayang di atas gambar slide.</div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="card_angka" class="form-label">Angka Singkat / Tahun <span class="text-danger">*</span></label>
                    <input type="text" name="card_angka" id="card_angka" class="form-control @error('card_angka') is-invalid @enderror" value="{{ old('card_angka') }}" placeholder="Contoh: 74k, 2020, atau 3" required>
                    @error('card_angka')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-8 mb-3">
                    <label for="card_teks" class="form-label">Keterangan Angka <span class="text-danger">*</span></label>
                    <input type="text" name="card_teks" id="card_teks" class="form-control @error('card_teks') is-invalid @enderror" value="{{ old('card_teks') }}" placeholder="Contoh: pilar utama bertemu di sini..." required>
                    @error('card_teks')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="urutan" class="form-label">Urutan Tampilan <span class="text-danger">*</span></label>
                    <input type="number" name="urutan" id="urutan" class="form-control @error('urutan') is-invalid @enderror" value="{{ old('urutan', 1) }}" min="1" required>
                    @error('urutan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3 form-check form-switch d-flex align-items-center ps-5 pt-3">
                    <input class="form-check-input" type="checkbox" name="status" id="status" value="1" checked>
                    <label class="form-check-label ms-2" for="status">Aktifkan Slide (Ditampilkan)</label>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.warisan-geologi.index') }}" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn" style="background: #c6a43b; color: white;">Simpan Slide</button>
            </div>
        </form>
    </div>
</div>
@endsection
