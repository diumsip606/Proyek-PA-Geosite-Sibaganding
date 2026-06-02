@extends('layouts.admin')

@section('title', 'Edit Slide Warisan Geologi')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-edit me-2" style="color: #c6a43b;"></i>
            Edit Slide Warisan Geologi
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.warisan-geologi.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label d-block">Gambar Saat Ini</label>
                @if($slide->gambar)
                    <img src="{{ asset($slide->gambar) }}" 
                         style="width: 200px; height: 120px; object-fit: cover; border-radius: 6px; border: 2px solid #ddd;" 
                         class="mb-2" alt="Gambar Slide">
                @else
                    <p class="text-muted">Tidak ada gambar</p>
                @endif
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="sub_judul" class="form-label">Sub Judul (Kicker) <span class="text-danger">*</span></label>
                    <input type="text" name="sub_judul" id="sub_judul" class="form-control @error('sub_judul') is-invalid @enderror" value="{{ old('sub_judul', $slide->sub_judul) }}" placeholder="Contoh: SLIDE 01 — TERBENTUKNYA DANAU TOBA" required>
                    @error('sub_judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="judul" class="form-label">Judul Utama <span class="text-danger">*</span></label>
                    <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $slide->judul) }}" placeholder="Contoh: Letusan Purba Melahirkan Danau Toba" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Cerita <span class="text-danger">*</span></label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Tuliskan penjelasan detail cerita geologi..." required>{{ old('deskripsi', $slide->deskripsi) }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Ganti Gambar Slide</label>
                <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror">
                <div class="form-text text-muted">Biarkan kosong jika tidak ingin mengganti gambar. Format: jpeg, png, jpg, gif. Maks: 3MB.</div>
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
                    <input type="text" name="card_angka" id="card_angka" class="form-control @error('card_angka') is-invalid @enderror" value="{{ old('card_angka', $slide->card_angka) }}" placeholder="Contoh: 74k, 2020, atau 3" required>
                    @error('card_angka')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-8 mb-3">
                    <label for="card_teks" class="form-label">Keterangan Angka <span class="text-danger">*</span></label>
                    <input type="text" name="card_teks" id="card_teks" class="form-control @error('card_teks') is-invalid @enderror" value="{{ old('card_teks', $slide->card_teks) }}" placeholder="Contoh: pilar utama bertemu di sini..." required>
                    @error('card_teks')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="urutan" class="form-label">Urutan Tampilan <span class="text-danger">*</span></label>
                    <input type="number" name="urutan" id="urutan" class="form-control @error('urutan') is-invalid @enderror" value="{{ old('urutan', $slide->urutan) }}" min="1" required>
                    @error('urutan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3 form-check form-switch d-flex align-items-center ps-5 pt-3">
                    <input class="form-check-input" type="checkbox" name="status" id="status" value="1" {{ $slide->status ? 'checked' : '' }}>
                    <label class="form-check-label ms-2" for="status">Aktifkan Slide (Ditampilkan)</label>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.warisan-geologi.index') }}" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn" style="background: #c6a43b; color: white;">Perbarui Slide</button>
            </div>
        </form>
    </div>
</div>
@endsection
