{{-- resources/views/admin/galeri/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'Edit Foto Galeri')

@section('content')

<style>
    .form-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.07);
        border: 1px solid #f0e8d3;
        overflow: hidden;
    }
    .form-card-header {
        background: linear-gradient(135deg, #c6a43b, #e8c96a);
        padding: 20px 28px;
        color: white;
    }
    .form-card-header h5 { margin: 0; font-size: 1.15rem; font-weight: 700; }
    .form-card-body { padding: 28px; }

    .current-img-wrapper {
        border-radius: 12px;
        overflow: hidden;
        border: 3px solid #c6a43b;
        position: relative;
        margin-bottom: 12px;
    }
    .current-img-wrapper img {
        width: 100%;
        max-height: 260px;
        object-fit: cover;
        display: block;
    }
    .current-img-badge {
        position: absolute;
        bottom: 8px;
        left: 8px;
        background: rgba(198,164,59,.9);
        color: white;
        font-size: .73rem;
        font-weight: 700;
        padding: 3px 10px;
        border-radius: 20px;
    }

    .upload-zone {
        border: 2.5px dashed #c6a43b;
        border-radius: 12px;
        padding: 20px;
        text-align: center;
        background: #fffdf5;
        cursor: pointer;
        transition: all .2s ease;
        position: relative;
    }
    .upload-zone:hover { background: #fff8e0; border-color: #b8962e; }
    .upload-zone input[type="file"] {
        position: absolute;
        inset: 0;
        opacity: 0;
        cursor: pointer;
        width: 100%;
        height: 100%;
    }
    .upload-zone i { font-size: 2rem; color: #c6a43b; margin-bottom: 8px; }
    .upload-zone p { color: #888; font-size: .83rem; margin: 0; }
    .upload-zone .upload-title { font-size: .92rem; font-weight: 600; color: #555; margin-bottom: 4px; }

    .new-preview {
        margin-top: 12px;
        display: none;
        border-radius: 12px;
        overflow: hidden;
        border: 2px solid #3b82f6;
        position: relative;
    }
    .new-preview img {
        width: 100%;
        max-height: 180px;
        object-fit: cover;
        display: block;
    }
    .new-preview .preview-label {
        position: absolute;
        top: 8px;
        left: 8px;
        background: rgba(59,130,246,.9);
        color: white;
        font-size: .7rem;
        font-weight: 700;
        padding: 3px 10px;
        border-radius: 20px;
    }
    .new-preview .remove-new {
        position: absolute;
        top: 6px;
        right: 6px;
        background: rgba(0,0,0,.6);
        color: white;
        border: none;
        border-radius: 50%;
        width: 26px;
        height: 26px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: .8rem;
    }

    .form-label { font-weight: 600; font-size: .88rem; color: #444; margin-bottom: 5px; }
    .required::after { content: ' *'; color: #ef4444; }
    .form-control, .form-select {
        border-radius: 10px;
        border: 1.5px solid #e0d0b0;
        padding: 10px 14px;
        font-size: .9rem;
        transition: border .2s;
    }
    .form-control:focus, .form-select:focus {
        border-color: #c6a43b;
        box-shadow: 0 0 0 3px rgba(198,164,59,.15);
    }

    .section-divider {
        height: 1px;
        background: linear-gradient(to right, #f0e8d3, transparent);
        margin: 24px 0;
    }

    .toggle-switch {
        display: flex;
        align-items: center;
        gap: 12px;
        background: #fffdf5;
        border: 1.5px solid #f0e8d3;
        border-radius: 12px;
        padding: 14px 18px;
    }
    .toggle-switch .form-check-input {
        width: 3rem; height: 1.5rem; cursor: pointer;
    }
    .toggle-switch .form-check-input:checked { background-color: #c6a43b; border-color: #c6a43b; }
    .toggle-label strong { display: block; color: #333; font-size: .88rem; }
    .toggle-label small { color: #999; }

    .hero-info {
        background: linear-gradient(135deg, #fef3c7, #fffbeb);
        border: 1.5px solid #f59e0b;
        border-radius: 12px;
        padding: 12px 16px;
        font-size: .83rem;
        color: #92400e;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .btn-submit {
        background: linear-gradient(135deg, #c6a43b, #e8c96a);
        color: white;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        padding: 11px 28px;
        font-size: .95rem;
        transition: all .2s;
    }
    .btn-submit:hover {
        background: linear-gradient(135deg, #b8962e, #d4a840);
        transform: translateY(-1px);
        box-shadow: 0 4px 14px rgba(198,164,59,.35);
        color: white;
    }
    .btn-cancel { border-radius: 10px; font-weight: 600; padding: 11px 22px; font-size: .95rem; }
    .char-counter { font-size: .75rem; color: #aaa; text-align: right; margin-top: 3px; }
</style>

{{-- Breadcrumb --}}
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb" style="font-size:.85rem;">
        <li class="breadcrumb-item"><a href="{{ route('admin.galeri.index') }}" style="color:#c6a43b;">Galeri</a></li>
        <li class="breadcrumb-item active">Edit Foto</li>
    </ol>
</nav>

<div class="form-card">
    <div class="form-card-header">
        <h5><i class="fas fa-edit me-2"></i> Edit Foto Galeri</h5>
    </div>

    <div class="form-card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

<form id="formEdit" action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

            <div class="row g-4">

                {{-- ===== KOLOM KIRI ===== --}}
                <div class="col-lg-7">

                    {{-- Judul --}}
                    <div class="mb-4">
                        <label class="form-label required">Judul Foto</label>
                        <input type="text" name="judul" id="judulInput"
                               class="form-control @error('judul') is-invalid @enderror"
                               value="{{ old('judul', $galeri->judul) }}"
                               maxlength="255" required>
                        <div class="char-counter"><span id="judulCount">{{ strlen(old('judul', $galeri->judul)) }}</span>/255 karakter</div>
                        @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-4">
                        <label class="form-label required">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsiInput"
                                  class="form-control @error('deskripsi') is-invalid @enderror"
                                  rows="5" required>{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
                        <div class="char-counter"><span id="deskripsiCount">{{ strlen(old('deskripsi', $galeri->deskripsi)) }}</span> karakter</div>
                        @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="row g-3">
                        {{-- Kategori (DINAMIS dari DB) --}}
                        <div class="col-md-6">
                            <label class="form-label required">Kategori</label>
                            <select name="kategori_id" class="form-select @error('kategori_id') is-invalid @enderror" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($kategoris as $kat)
                                    <option value="{{ $kat->id }}"
                                        {{ old('kategori_id', $galeri->kategori_id) == $kat->id ? 'selected' : '' }}>
                                        {{ $kat->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kategori_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        {{-- Lokasi --}}
                        <div class="col-md-6">
                            <label class="form-label">Lokasi</label>
                            <input type="text" name="lokasi"
                                   class="form-control @error('lokasi') is-invalid @enderror"
                                   value="{{ old('lokasi', $galeri->lokasi) }}"
                                   placeholder="Geosite Sibaganding">
                            @error('lokasi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="section-divider"></div>

                    {{-- Status --}}
                    <div class="toggle-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="status" value="1"
                               id="statusCheck" {{ old('status', $galeri->status) ? 'checked' : '' }}>
                        <div class="toggle-label">
                            <strong>Tampilkan di Galeri Publik</strong>
                            <small>Foto akan terlihat oleh pengunjung jika diaktifkan</small>
                        </div>
                    </div>

                    {{-- Hero Switch --}}
                    <div class="toggle-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="is_hero" value="1"
                               id="heroCheck" {{ old('is_hero', $galeri->is_hero) ? 'checked' : '' }}>
                        <div class="toggle-label">
                            <strong>Jadikan Hero Background</strong>
                            <small>Jadikan foto ini sebagai gambar utama di halaman galeri publik</small>
                        </div>
                    </div>
                </div>

                {{-- ===== KOLOM KANAN — GAMBAR ===== --}}
                <div class="col-lg-5">

                   {{-- Gambar Saat Ini --}}
<label class="form-label">Foto Saat Ini</label>

@php
    $rawGambar = $galeri->gambar ? ltrim($galeri->gambar, '/') : null;

    if ($rawGambar) {
        if (str_starts_with($rawGambar, 'http://') || str_starts_with($rawGambar, 'https://')) {
            $fotoSaatIni = $rawGambar;
        } elseif (str_starts_with($rawGambar, 'storage/')) {
            $fotoSaatIni = asset($rawGambar);
        } else {
            $fotoSaatIni = asset('storage/' . $rawGambar);
        }
    } else {
        $fotoSaatIni = null;
    }
@endphp

@if($fotoSaatIni)
    <div class="current-img-wrapper">
        <img 
            src="{{ $fotoSaatIni }}"
            alt="{{ $galeri->judul }}"
            onerror="this.onerror=null;this.src='{{ asset('images/sibaganding1.JPG') }}';"
        >
        <div class="current-img-badge">
            <i class="fas fa-image me-1"></i> Foto Saat Ini
        </div>
    </div>
@else
    <div style="border:2px dashed #e0d0b0;border-radius:12px;height:140px;display:flex;align-items:center;justify-content:center;color:#ccc;margin-bottom:12px;">
        <i class="fas fa-image" style="font-size:2.5rem;"></i>
    </div>
@endif
                    {{-- Upload Ganti Gambar --}}
                    <label class="form-label">Ganti Foto <small class="text-muted fw-normal">(Opsional)</small></label>
                    <div class="upload-zone" id="uploadZone">
                        <input type="file" name="gambar" id="inputGambar" class="form-control" accept="image/*">
                        <i class="fas fa-sync-alt d-block"></i>
                        <div class="upload-title">Klik untuk ganti foto</div>
                        <p>JPG, PNG, WEBP · <strong>Maks 2 MB</strong><br>Kosongkan jika tidak ingin mengubah</p>
                    </div>
                    <div class="new-preview" id="newPreview">
                        <img id="newPreviewImage" src="" alt="Preview Baru">
                        <div class="preview-label"><i class="fas fa-check me-1"></i> Foto Baru</div>
                        <button type="button" class="remove-new" id="removeNew"><i class="fas fa-times"></i></button>
                    </div>
                    <div id="newFileInfo" style="font-size:.8rem;color:#888;display:none;margin-top:6px;"></div>
                    @error('gambar')
                        <div class="text-danger mt-2" style="font-size:.83rem;"><i class="fas fa-exclamation-circle me-1"></i>{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="section-divider"></div>

            {{-- TOMBOL --}}
            <div class="d-flex gap-3">
                <button type="submit" class="btn btn-submit" id="btnSubmit">
                    <i class="fas fa-save me-2"></i> Simpan Perubahan
                </button>
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-secondary btn-cancel">
                    <i class="fas fa-arrow-left me-2"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
// ===== CHAR COUNTER =====
const judulInput = document.getElementById('judulInput');
const judulCount = document.getElementById('judulCount');
judulInput.addEventListener('input', () => judulCount.textContent = judulInput.value.length);

const deskripsiInput = document.getElementById('deskripsiInput');
const deskripsiCount = document.getElementById('deskripsiCount');
deskripsiInput.addEventListener('input', () => deskripsiCount.textContent = deskripsiInput.value.length);

// ===== NEW IMAGE PREVIEW =====
const inputGambar   = document.getElementById('inputGambar');
const newPreview    = document.getElementById('newPreview');
const newPreviewImg = document.getElementById('newPreviewImage');
const removeNew     = document.getElementById('removeNew');
const newFileInfo   = document.getElementById('newFileInfo');

inputGambar.addEventListener('change', function () {
    const file = this.files[0];
    if (!file) return;

    if (file.size > 2 * 1024 * 1024) {
        alert('Ukuran file terlalu besar! Maksimal 2 MB.');
        this.value = '';
        return;
    }

    const reader = new FileReader();
    reader.onload = e => {
        newPreviewImg.src = e.target.result;
        newPreview.style.display = 'block';
        newFileInfo.style.display = 'block';
        newFileInfo.innerHTML = `<i class="fas fa-file-image me-1" style="color:#c6a43b;"></i>${file.name} (${(file.size/1024/1024).toFixed(2)} MB)`;
    };
    reader.readAsDataURL(file);
});

removeNew.addEventListener('click', () => {
    inputGambar.value = '';
    newPreview.style.display = 'none';
    newFileInfo.style.display = 'none';
});

// ===== DRAG & DROP =====
const uploadZone = document.getElementById('uploadZone');
['dragover','dragenter'].forEach(e => uploadZone.addEventListener(e, ev => {
    ev.preventDefault();
    uploadZone.style.background = '#fff8e0';
}));
['dragleave','drop'].forEach(e => uploadZone.addEventListener(e, ev => {
    ev.preventDefault();
    uploadZone.style.background = '';
}));
uploadZone.addEventListener('drop', ev => {
    const file = ev.dataTransfer.files[0];
    if (file) {
        const dt = new DataTransfer();
        dt.items.add(file);
        inputGambar.files = dt.files;
        inputGambar.dispatchEvent(new Event('change'));
    }
});

// ===== PREVENT DOUBLE SUBMIT =====
document.getElementById('formEdit').addEventListener('submit', function () {
    const btn = document.getElementById('btnSubmit');
    btn.disabled = true;
    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Menyimpan...';
});
</script>

@endsection