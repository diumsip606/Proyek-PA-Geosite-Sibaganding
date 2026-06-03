{{-- resources/views/admin/galeri/create.blade.php --}}
@extends('layouts.admin')

@section('title', 'Tambah Foto Galeri')

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

    .upload-zone {
        border: 2.5px dashed #c6a43b;
        border-radius: 12px;
        padding: 32px 20px;
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
    .upload-zone i { font-size: 2.5rem; color: #c6a43b; margin-bottom: 10px; }
    .upload-zone p { color: #888; font-size: .88rem; margin: 0; }
    .upload-zone .upload-title { font-size: 1rem; font-weight: 600; color: #444; margin-bottom: 6px; }

    .preview-wrapper {
        margin-top: 16px;
        display: none;
        border-radius: 12px;
        overflow: hidden;
        position: relative;
        border: 2px solid #c6a43b;
    }
    .preview-wrapper img {
        width: 100%;
        max-height: 280px;
        object-fit: cover;
        display: block;
    }
    .preview-wrapper .remove-preview {
        position: absolute;
        top: 8px;
        right: 8px;
        background: rgba(0,0,0,.6);
        color: white;
        border: none;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: .9rem;
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
    .form-control.is-invalid { border-color: #ef4444; }

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
        width: 3rem; height: 1.5rem;
        cursor: pointer;
    }
    .toggle-switch .form-check-input:checked { background-color: #c6a43b; border-color: #c6a43b; }
    .toggle-label { font-size: .88rem; }
    .toggle-label strong { display: block; color: #333; }
    .toggle-label small { color: #999; }

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
    .btn-cancel {
        border-radius: 10px;
        font-weight: 600;
        padding: 11px 22px;
        font-size: .95rem;
    }

    /* Char counter */
    .char-counter { font-size: .75rem; color: #aaa; text-align: right; margin-top: 3px; }
</style>

{{-- Breadcrumb --}}
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb" style="font-size:.85rem;">
        <li class="breadcrumb-item"><a href="{{ route('admin.galeri.index') }}" style="color:#c6a43b;">Galeri</a></li>
        <li class="breadcrumb-item active">Tambah Foto</li>
    </ol>
</nav>

<div class="form-card">
    <div class="form-card-header">
        <h5><i class="fas fa-plus-circle me-2"></i> Tambah Foto Galeri Baru</h5>
    </div>

    <div class="form-card-body">
        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" id="formGaleri">
            @csrf

            <div class="row g-4">

                {{-- ===== KOLOM KIRI ===== --}}
                <div class="col-lg-7">

                    {{-- Judul --}}
                    <div class="mb-4">
                        <label class="form-label required">Judul Foto</label>
                        <input type="text" name="judul" id="judulInput"
                               class="form-control @error('judul') is-invalid @enderror"
                               value="{{ old('judul') }}"
                               placeholder="Contoh: Panorama Danau Toba dari Sibaganding"
                               maxlength="255" required>
                        <div class="char-counter"><span id="judulCount">0</span>/255 karakter</div>
                        @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-4">
                        <label class="form-label required">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsiInput"
                                  class="form-control @error('deskripsi') is-invalid @enderror"
                                  rows="5"
                                  placeholder="Tuliskan deskripsi foto ini..." required>{{ old('deskripsi') }}</textarea>
                        <div class="char-counter"><span id="deskripsiCount">0</span> karakter</div>
                        @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="row g-3">
                        {{-- Kategori (DINAMIS dari DB) --}}
                        <div class="col-md-6">
                            <label class="form-label required">Kategori</label>
                            <select name="kategori_id" class="form-select @error('kategori_id') is-invalid @enderror" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($kategoris as $kat)
                                    <option value="{{ $kat->id }}" {{ old('kategori_id') == $kat->id ? 'selected' : '' }}>
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
                                   value="{{ old('lokasi', 'Geosite Sibaganding') }}"
                                   placeholder="Geosite Sibaganding">
                            @error('lokasi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="section-divider"></div>

                    {{-- Status --}}
                    <div class="toggle-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="status" value="1"
                               id="statusCheck" {{ old('status', '1') ? 'checked' : '' }}>
                        <div class="toggle-label">
                            <strong>Tampilkan di Galeri Publik</strong>
                            <small>Foto akan terlihat oleh pengunjung jika diaktifkan</small>
                        </div>
                    </div>

                    {{-- Hero Switch --}}
                    <div class="toggle-switch">
                        <input class="form-check-input" type="checkbox" name="is_hero" value="1"
                               id="heroCheck" {{ old('is_hero') ? 'checked' : '' }}>
                        <div class="toggle-label">
                            <strong>Jadikan Hero Background</strong>
                            <small>Jadikan foto ini sebagai gambar utama di halaman galeri publik</small>
                        </div>
                    </div>
                </div>

                {{-- ===== KOLOM KANAN — UPLOAD ===== --}}
                <div class="col-lg-5">
                    <label class="form-label required">Upload Foto</label>
                    <div class="upload-zone" id="uploadZone">
                        <input type="file" name="gambar" id="inputGambar"
                               accept="image/jpeg,image/png,image/jpg,image/webp" required>
                        <i class="fas fa-cloud-upload-alt d-block"></i>
                        <div class="upload-title">Klik atau seret gambar ke sini</div>
                        <p>Format: JPG, PNG, WEBP · Maks 4 MB</p>
                    </div>
                    <div class="preview-wrapper" id="previewWrapper">
                        <img id="previewImage" src="" alt="Preview">
                        <button type="button" class="remove-preview" id="removePreview" title="Hapus">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="mt-2" id="fileInfo" style="font-size:.8rem;color:#888;display:none;"></div>
                    @error('gambar')
                        <div class="text-danger mt-2" style="font-size:.83rem;"><i class="fas fa-exclamation-circle me-1"></i>{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="section-divider"></div>

            {{-- TOMBOL --}}
            <div class="d-flex gap-3">
                <button type="submit" class="btn btn-submit" id="btnSubmit">
                    <i class="fas fa-save me-2"></i> Simpan Foto
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

// ===== IMAGE PREVIEW =====
const inputGambar   = document.getElementById('inputGambar');
const previewWrapper = document.getElementById('previewWrapper');
const previewImage  = document.getElementById('previewImage');
const removePreview = document.getElementById('removePreview');
const fileInfo      = document.getElementById('fileInfo');

inputGambar.addEventListener('change', function () {
    const file = this.files[0];
    if (!file) return;

    // Validasi ukuran
    if (file.size > 4 * 1024 * 1024) {
        alert('Ukuran file terlalu besar! Maksimal 4 MB.');
        this.value = '';
        return;
    }

    const reader = new FileReader();
    reader.onload = e => {
        previewImage.src = e.target.result;
        previewWrapper.style.display = 'block';
        fileInfo.style.display = 'block';
        fileInfo.innerHTML = `<i class="fas fa-file-image me-1" style="color:#c6a43b;"></i>${file.name} (${(file.size/1024/1024).toFixed(2)} MB)`;
    };
    reader.readAsDataURL(file);
});

removePreview.addEventListener('click', () => {
    inputGambar.value = '';
    previewWrapper.style.display = 'none';
    fileInfo.style.display = 'none';
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
document.getElementById('formGaleri').addEventListener('submit', function () {
    const btn = document.getElementById('btnSubmit');
    btn.disabled = true;
    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Menyimpan...';
});
</script>

@endsection