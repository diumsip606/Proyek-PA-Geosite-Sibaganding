@extends('layouts.admin')

@section('title', 'Tambah UMKM')

@section('content')
<div class="d-flex align-items-center mb-3">
    <a href="{{ route('admin.umkm.index') }}" class="btn btn-sm btn-secondary me-2"><i class="fas fa-arrow-left"></i></a>
    <h5 class="mb-0">Tambah UMKM Baru</h5>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.umkm.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">Nama UMKM <span class="text-danger">*</span></label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required placeholder="Contoh: Kerajinan Tenun Sibaganding">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi Singkat / Detail <span class="text-danger">*</span></label>
                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="6" required placeholder="Tulis deskripsi produk, sejarah singkat, atau jenis usaha..."></textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat Lengkap</label>
                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" placeholder="Contoh: Jl. Sipiso-piso No. 4, Sibaganding">
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Nomor WhatsApp / Kontak (Gunakan format 62xxx atau 08xxx)</label>
                <input type="text" name="kontak" class="form-control @error('kontak') is-invalid @enderror" value="{{ old('kontak') }}" placeholder="Contoh: 081234567890">
                @error('kontak')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar Produk / Banner <span class="text-danger">*</span></label>
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
                    <div id="fileInfo" class="mt-1" style="font-size:.8rem;color:#666;"></div>
                </div>
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status" value="1" checked id="statusCheck">
                    <label class="form-check-label" for="statusCheck">Aktifkan (Akan tampil di halaman utama / informasi)</label>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary px-4">
                    <i class="fas fa-save me-1"></i> Simpan
                </button>
                <a href="{{ route('admin.umkm.index') }}" class="btn btn-secondary">Batal</a>
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
        if (file.size > 2 * 1024 * 1024) {
            alert('Ukuran file terlalu besar! Maksimal 2 MB.');
            input.value = '';
            wrapper.style.display = 'none';
            return;
        }
        const reader = new FileReader();
        reader.onload = e => {
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
