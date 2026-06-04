@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')
<div class="d-flex align-items-center mb-3">
    <a href="{{ route('admin.berita.index') }}" class="btn btn-sm btn-secondary me-2">
        <i class="fas fa-arrow-left"></i>
    </a>
    <h5 class="mb-0">Tambah Berita Baru</h5>
</div>

@if($errors->any())
    <div class="alert alert-danger mb-3">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif

<div class="card shadow-sm">
    <div class="card-body">

        {{-- ✅ ERROR GLOBAL --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            {{-- JUDUL --}}
            <div class="mb-3">
                <label>Judul <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control" value="{{ old('judul') }}">
                
                @error('judul')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            
            {{-- PENULIS --}}
            <div class="mb-3">
                <label>Penulis</label>
                <input type="text" name="penulis" class="form-control" value="{{ old('penulis', 'Admin') }}">
            </div>
            
            {{-- TANGGAL --}}
            <div class="mb-3">
                <label>Tanggal Terbit <span class="text-danger">*</span></label>
                <input type="date" name="tanggal_terbit" class="form-control" value="{{ old('tanggal_terbit', date('Y-m-d')) }}">
                
                @error('tanggal_terbit')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            
            {{-- KONTEN --}}
            <div class="mb-3">
                <label>Konten <span class="text-danger">*</span></label>
                <textarea name="konten" class="form-control" rows="8">{{ old('konten') }}</textarea>
                
                @error('konten')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            
            {{-- GAMBAR --}}
            <div class="mb-3">
                <label>Gambar (Max 2MB) <span class="text-danger">*</span></label>
                <input type="file" name="gambar" class="form-control" accept="image/*">
                
                @error('gambar')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- LINK BERITA --}}
            <div class="mb-3">
                <label>Link Berita (Optional)</label>
                <input type="url" name="link" class="form-control" placeholder="https://example.com" value="{{ old('link') }}">
                
                @error('link')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            
            {{-- STATUS --}}
            <div class="mb-3">
                <div class="form-check">
                    <input 
                        class="form-check-input" 
                        type="checkbox" 
                        name="status" 
                        value="1"
                        {{ old('status', true) ? 'checked' : '' }}>
                    <label>Publish</label>

            <div class="mb-3">
                <label class="form-label fw-semibold">Judul <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                    value="{{ old('judul') }}" required>
                @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Penulis</label>
                <input type="text" name="penulis" class="form-control" value="{{ old('penulis', 'Admin') }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal Terbit <span class="text-danger">*</span></label>
                <input type="date" name="tanggal_terbit" class="form-control @error('tanggal_terbit') is-invalid @enderror"
                    value="{{ old('tanggal_terbit', date('Y-m-d')) }}" required>
                @error('tanggal_terbit') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Konten <span class="text-danger">*</span></label>
                <textarea name="konten" class="form-control @error('konten') is-invalid @enderror"
                    rows="8" required>{{ old('konten') }}</textarea>
                @error('konten') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Gambar <span class="text-danger">*</span></label>
                <input type="file" name="gambar" id="gambarInput"
                    class="form-control @error('gambar') is-invalid @enderror"
                    accept="image/jpeg,image/png,image/jpg,image/webp"
                    onchange="previewGambar(this)" required>
                <div class="form-text">
                    <i class="fas fa-info-circle text-primary me-1"></i>
                    Format: JPG, PNG, WEBP. <strong>Maks 2 MB.</strong>
                </div>
                @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                <div class="mt-2" id="previewWrapper" style="display:none;">
                    <img id="previewImg" src="" alt="Preview"
                        style="max-height:180px; border-radius:10px; border:1px solid #dee2e6; object-fit:cover;">
                    <div id="fileInfo" class="mt-1" style="font-size:.8rem; color:#666;"></div>
                </div>
            </div>

            <div class="mb-4">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="status" value="1"
                        id="statusToggle" {{ old('status', '1') ? 'checked' : '' }}>
                    <label class="form-check-label" for="statusToggle">Publish</label>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Simpan
                </button>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
function previewGambar(input) {
    const wrapper  = document.getElementById('previewWrapper');
    const img      = document.getElementById('previewImg');
    const fileInfo = document.getElementById('fileInfo');

    if (input.files && input.files[0]) {
        const file = input.files[0];

        // Validasi client-side 2MB
        if (file.size > 2 * 1024 * 1024) {
            alert('Ukuran file terlalu besar! Maksimal 2 MB.');
            input.value = '';
            wrapper.style.display = 'none';
            return;
        }

        const reader = new FileReader();
        reader.onload = function(e) {
            img.src = e.target.result;
            wrapper.style.display = 'block';
            fileInfo.innerHTML = `<i class="fas fa-file-image me-1 text-success"></i>${file.name} (${(file.size/1024/1024).toFixed(2)} MB)`;
        };
        reader.readAsDataURL(file);
    }
}
</script>
@endpush
@endsection