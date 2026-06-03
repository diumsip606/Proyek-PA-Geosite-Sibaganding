@extends('layouts.admin')

@section('title', 'Edit Video Youtube')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-edit me-2" style="color: #c6a43b;"></i>
            Edit Video Youtube
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.video-youtube.update', $video->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label d-block">Preview Video</label>
                @if($video->youtube_id)
                <div class="ratio ratio-16x9 mb-2" style="max-width: 400px; border-radius: 8px; overflow: hidden; border: 1px solid #ddd;">
                    <iframe src="https://www.youtube.com/embed/{{ $video->youtube_id }}" title="Preview" allowfullscreen style="border: none;"></iframe>
                </div>
                @endif
            </div>

            <div class="mb-3">
                <label for="judul" class="form-label">Judul Video <span class="text-danger">*</span></label>
                <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $video->judul) }}" placeholder="Contoh: Pesona Alam Sibaganding" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="youtube_id" class="form-label">URL Video Youtube atau ID Video <span class="text-danger">*</span></label>
                <input type="text" name="youtube_id" id="youtube_id" class="form-control @error('youtube_id') is-invalid @enderror" value="{{ old('youtube_id', $video->youtube_id) }}" placeholder="Contoh: https://www.youtube.com/watch?v=gYiE6bQCoc atau cukup ketik ID: gYiE6bQCoc" required>
                <div class="form-text text-muted">Sistem akan mengekstrak ID video secara otomatis jika Anda menempelkan URL lengkap Youtube.</div>
                @error('youtube_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Singkat Video <span class="text-danger">*</span></label>
                <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Tuliskan ulasan / cerita singkat tentang isi video..." required>{{ old('deskripsi', $video->deskripsi) }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="urutan" class="form-label">Urutan Tampilan <span class="text-danger">*</span></label>
                    <input type="number" name="urutan" id="urutan" class="form-control @error('urutan') is-invalid @enderror" value="{{ old('urutan', $video->urutan) }}" min="1" required>
                    @error('urutan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3 form-check form-switch d-flex align-items-center ps-5 pt-3">
                    <input class="form-check-input" type="checkbox" name="status" id="status" value="1" {{ $video->status ? 'checked' : '' }}>
                    <label class="form-check-label ms-2" for="status">Aktifkan Video (Ditampilkan)</label>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.video-youtube.index') }}" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn" style="background: #c6a43b; color: white;">Perbarui Video</button>
            </div>
        </form>
    </div>
</div>
@endsection
