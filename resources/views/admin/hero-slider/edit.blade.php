@extends('layouts.admin')

@section('title', 'Edit Slide Beranda')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-edit me-2" style="color: #c6a43b;"></i>
            Edit Slide
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.hero-slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label d-block">Gambar Saat Ini</label>
                @if($slider->gambar)
                    <img src="{{ asset($slider->gambar) }}" 
                         style="width: 250px; height: 140px; object-fit: cover; border-radius: 8px; border: 2px solid #ddd;" 
                         class="mb-2" alt="Gambar Slide">
                @else
                    <p class="text-muted">Tidak ada gambar</p>
                @endif
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Ganti Gambar Slide</label>
                <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror">
                <div class="form-text text-muted">Biarkan kosong jika tidak ingin mengganti gambar. Format: jpeg, png, jpg, gif. Max: 3MB.</div>
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="urutan" class="form-label">Urutan Tampilan <span class="text-danger">*</span></label>
                <input type="number" name="urutan" id="urutan" class="form-control @error('urutan') is-invalid @enderror" value="{{ old('urutan', $slider->urutan) }}" min="1" required>
                <div class="form-text text-muted">Angka lebih kecil akan muncul terlebih dahulu.</div>
                @error('urutan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-check form-switch">
                <input class="form-check-input" type="checkbox" name="status" id="status" value="1" {{ $slider->status ? 'checked' : '' }}>
                <label class="form-check-label" for="status">Aktifkan Slide (Ditampilkan)</label>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.hero-slider.index') }}" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn" style="background: #c6a43b; color: white;">Perbarui Slide</button>
            </div>
        </form>
    </div>
</div>
@endsection
