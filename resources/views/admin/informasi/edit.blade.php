@extends('layouts.admin')

@section('title', $informasi->kategori === 'Pengurus' ? 'Edit Pengurus' : 'Edit Informasi')

@section('content')
<div class="d-flex align-items-center mb-3">
    <a href="{{ route('admin.informasi.index', ['kategori' => $informasi->kategori === 'Pengurus' ? 'Pengurus' : null]) }}"
       class="btn btn-sm btn-secondary me-2">
        <i class="fas fa-arrow-left"></i>
    </a>
    <h5 class="mb-0">
        {{ $informasi->kategori === 'Pengurus' ? 'Edit Pengurus' : 'Edit Informasi' }}
        — <span class="text-muted fw-normal">{{ $informasi->judul }}</span>
    </h5>
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
        <form action="{{ route('admin.informasi.update', $informasi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">
                    {{ $informasi->kategori === 'Pengurus' ? 'Nama Pengurus' : 'Judul Informasi' }}
                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="judul"
                    class="form-control @error('judul') is-invalid @enderror"
                    value="{{ old('judul', $informasi->judul) }}" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Kategori --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                <select name="kategori" class="form-control @error('kategori') is-invalid @enderror" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach(['Geologi','Budaya','Wisata','Transportasi','Pengurus'] as $kat)
                        <option value="{{ $kat }}" {{ old('kategori', $informasi->kategori) === $kat ? 'selected' : '' }}>
                            {{ $kat === 'Pengurus' ? 'Pengurus (Tim Pengelola)' : $kat }}
                        </option>
                    @endforeach
                </select>
                @error('kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Penulis / Jabatan --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">
                    {{ $informasi->kategori === 'Pengurus' ? 'Jabatan / Role' : 'Penulis' }}
                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="penulis"
                    class="form-control @error('penulis') is-invalid @enderror"
                    value="{{ old('penulis', $informasi->penulis) }}" required>
                <small class="text-muted">
                    {{ $informasi->kategori === 'Pengurus' ? 'Jabatan/role pengurus di Geosite.' : 'Nama penulis artikel/informasi.' }}
                </small>
                @error('penulis')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Konten --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">
                    {{ $informasi->kategori === 'Pengurus' ? 'Bio / Deskripsi Profil' : 'Konten / Deskripsi' }}
                    <span class="text-danger">*</span>
                </label>
                <textarea name="konten" class="form-control @error('konten') is-invalid @enderror" rows="8" required>{{ old('konten', $informasi->konten) }}</textarea>
                @error('konten')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Gambar --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">
                    {{ $informasi->kategori === 'Pengurus' ? 'Foto Pengurus' : 'Gambar Artikel' }}
                </label>

                {{-- Preview Gambar Saat Ini --}}
                @if($informasi->gambar)
                    <div class="mb-2" id="currentImgWrapper">
                        <p class="small text-muted mb-1">Gambar saat ini:</p>
                        <img src="{{ asset($informasi->gambar) }}" alt="{{ $informasi->judul }}"
                            style="max-height:180px; border-radius:10px; border:1px solid #dee2e6; object-fit:cover;"
                            onerror="this.src='{{ asset('images/placeholder.jpg') }}'">
                    </div>
                @endif

                <input type="file" name="gambar" id="gambarInput"
                    class="form-control @error('gambar') is-invalid @enderror"
                    accept="image/jpeg,image/png,image/jpg,image/webp"
                    onchange="previewGambar(this)">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar. Format: JPG, PNG, WEBP. Maks 2MB.</small>
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <div class="mt-2" id="previewWrapper" style="display:none;">
                    <p class="small text-muted mb-1">Preview gambar baru:</p>
                    <img id="previewImg" src="" alt="Preview"
                        style="max-height:180px; border-radius:10px; border:1px solid #dee2e6; object-fit:cover;">
                </div>
            </div>

            {{-- Status --}}
            <div class="mb-4">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="status" value="1" id="statusToggle"
                        {{ old('status', $informasi->status) ? 'checked' : '' }}>
                    <label class="form-check-label" for="statusToggle">Aktifkan / Publish</label>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Simpan Perubahan
                </button>
                <a href="{{ route('admin.informasi.index', ['kategori' => $informasi->kategori === 'Pengurus' ? 'Pengurus' : null]) }}"
                   class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
function previewGambar(input) {
    const wrapper = document.getElementById('previewWrapper');
    const img = document.getElementById('previewImg');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            img.src = e.target.result;
            wrapper.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
@endsection