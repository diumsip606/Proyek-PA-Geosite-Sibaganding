@extends('layouts.admin')

@section('title', request('kategori') === 'Pengurus' ? 'Tambah Pengurus' : 'Tambah Informasi')

@section('content')
<div class="d-flex align-items-center mb-3">
    <a href="{{ route('admin.informasi.index', ['kategori' => request('kategori')]) }}" class="btn btn-sm btn-secondary me-2">
        <i class="fas fa-arrow-left"></i>
    </a>
    <h5 class="mb-0">
        {{ request('kategori') === 'Pengurus' ? 'Tambah Pengurus Baru' : 'Tambah Informasi Baru' }}
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
        <form action="{{ route('admin.informasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Judul --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">
                    {{ request('kategori') === 'Pengurus' ? 'Nama Pengurus' : 'Judul Informasi' }}
                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                    value="{{ old('judul') }}"
                    placeholder="{{ request('kategori') === 'Pengurus' ? 'Masukkan nama lengkap pengurus' : 'Contoh: Sejarah Geosite Sibaganding' }}"
                    required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Kategori --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                <select name="kategori" class="form-control @error('kategori') is-invalid @enderror" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Geologi"      {{ request('kategori') === 'Geologi'      || old('kategori') === 'Geologi'      ? 'selected' : '' }}>Geologi</option>
                    <option value="Budaya"       {{ request('kategori') === 'Budaya'       || old('kategori') === 'Budaya'       ? 'selected' : '' }}>Budaya</option>
                    <option value="Wisata"       {{ request('kategori') === 'Wisata'       || old('kategori') === 'Wisata'       ? 'selected' : '' }}>Wisata</option>
                    <option value="Transportasi" {{ request('kategori') === 'Transportasi' || old('kategori') === 'Transportasi' ? 'selected' : '' }}>Transportasi</option>
                    <option value="Pengurus"     {{ request('kategori') === 'Pengurus'     || old('kategori') === 'Pengurus'     ? 'selected' : '' }}>Pengurus (Tim Pengelola)</option>
                </select>
                @error('kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Penulis / Jabatan --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">
                    {{ request('kategori') === 'Pengurus' ? 'Jabatan / Role' : 'Penulis' }}
                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="penulis" class="form-control @error('penulis') is-invalid @enderror"
                    value="{{ old('penulis') }}"
                    placeholder="{{ request('kategori') === 'Pengurus' ? 'Contoh: Ketua Pengelola, Koordinator Lapangan' : 'Contoh: Admin' }}"
                    required>
                <small class="text-muted">
                    @if(request('kategori') === 'Pengurus')
                        Isi dengan jabatan/role pengurus di Geosite.
                    @else
                        Isi nama penulis artikel/informasi ini.
                    @endif
                </small>
                @error('penulis')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Konten / Deskripsi --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">
                    {{ request('kategori') === 'Pengurus' ? 'Bio / Deskripsi Profil' : 'Konten / Deskripsi' }}
                    <span class="text-danger">*</span>
                </label>
                <textarea name="konten" class="form-control @error('konten') is-invalid @enderror" rows="8"
                    placeholder="{{ request('kategori') === 'Pengurus' ? 'Masukkan penjelasan singkat mengenai pengurus ini' : 'Tulis konten informasi di sini...' }}"
                    required>{{ old('konten') }}</textarea>
                @error('konten')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Gambar --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">
                    {{ request('kategori') === 'Pengurus' ? 'Foto Pengurus' : 'Gambar Artikel' }}
                    <span class="text-danger">*</span>
                </label>
                <input type="file" name="gambar" id="gambarInput"
                    class="form-control @error('gambar') is-invalid @enderror"
                    accept="image/jpeg,image/png,image/jpg,image/webp"
                    required onchange="previewGambar(this)">
                <small class="text-muted">Format: JPG, PNG, WEBP. Maks 2MB.</small>
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="mt-2" id="previewWrapper" style="display:none;">
                    <img id="previewImg" src="" alt="Preview" style="max-height:180px; border-radius:10px; border:1px solid #dee2e6; object-fit:cover;">
                </div>
            </div>

            {{-- Status --}}
            <div class="mb-4">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="status" value="1" id="statusToggle"
                        {{ old('status', '1') ? 'checked' : '' }}>
                    <label class="form-check-label" for="statusToggle">Aktifkan / Publish</label>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Simpan
                </button>
                <a href="{{ route('admin.informasi.index', ['kategori' => request('kategori')]) }}" class="btn btn-secondary">
                    Batal
                </a>
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