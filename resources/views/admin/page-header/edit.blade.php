@extends('layouts.admin')

@section('title', 'Edit Header: ' . $pageHeader->label)

@section('content')

<style>
.form-card { background: white; border-radius: 12px; padding: 25px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); margin-bottom: 20px; }
.form-label { font-size: 0.82rem; font-weight: 600; color: #334155; margin-bottom: 5px; display: block; }
.form-input { width: 100%; padding: 10px 14px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 0.85rem; color: #1e293b; background: #f8fafc; transition: 0.2s; }
.form-input:focus { outline: none; border-color: #3b82f6; background: white; box-shadow: 0 0 0 3px rgba(59,130,246,0.12); }
.form-textarea { width: 100%; padding: 10px 14px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 0.85rem; color: #1e293b; background: #f8fafc; transition: 0.2s; resize: vertical; min-height: 90px; }
.form-textarea:focus { outline: none; border-color: #3b82f6; background: white; box-shadow: 0 0 0 3px rgba(59,130,246,0.12); }
.btn-save { background: #3b82f6; color: white; border: none; padding: 10px 24px; border-radius: 8px; font-size: 0.82rem; font-weight: 600; cursor: pointer; transition: 0.2s; }
.btn-save:hover { background: #2563eb; transform: translateY(-1px); }
.btn-cancel { background: #f1f5f9; color: #334155; border: none; padding: 10px 20px; border-radius: 8px; font-size: 0.82rem; font-weight: 600; cursor: pointer; text-decoration: none; transition: 0.2s; }
.btn-cancel:hover { background: #e2e8f0; }
.preview-box { border: 2px dashed #e2e8f0; border-radius: 12px; overflow: hidden; height: 200px; position: relative; background: #f8fafc; }
.preview-box img { width: 100%; height: 100%; object-fit: cover; }
.preview-overlay { position: absolute; inset: 0; background: rgba(0,0,0,0.5); display: flex; align-items: center; justify-content: center; color: white; font-size: 0.8rem; text-align: center; opacity: 0; transition: 0.3s; }
.preview-box:hover .preview-overlay { opacity: 1; }
.upload-area { border: 2px dashed #cbd5e1; border-radius: 10px; padding: 20px; text-align: center; cursor: pointer; transition: 0.2s; background: #f8fafc; }
.upload-area:hover { border-color: #3b82f6; background: #eff6ff; }
.upload-area i { font-size: 2rem; color: #94a3b8; margin-bottom: 8px; display: block; }
.upload-area span { font-size: 0.8rem; color: #64748b; }
.field-group { margin-bottom: 18px; }
</style>

<div class="card-table">
    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:20px;">
        <div>
            <h5 style="margin:0;"><i class="fas fa-edit me-2" style="color:#3b82f6;"></i>Edit Header: {{ $pageHeader->label }}</h5>
            <p style="margin:4px 0 0; font-size:0.78rem; color:#94a3b8;">page_name: <code>{{ $pageHeader->page_name }}</code></p>
        </div>
        <a href="{{ route('admin.page-header.index') }}" class="btn-cancel">← Kembali</a>
    </div>

    <form action="{{ route('admin.page-header.update', $pageHeader->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">

            {{-- LEFT: Fields --}}
            <div>
                <div class="field-group">
                    <label class="form-label">Judul (Title) Halaman</label>
                    <input type="text" name="title" class="form-input" value="{{ old('title', $pageHeader->title) }}" placeholder="Contoh: Hubungi Kami">
                    @error('title') <span style="color:#ef4444; font-size:0.75rem;">{{ $message }}</span> @enderror
                </div>

                <div class="field-group">
                    <label class="form-label">Subjudul (Subtitle)</label>
                    <textarea name="subtitle" class="form-textarea" placeholder="Contoh: Senang mendengar dari Anda">{{ old('subtitle', $pageHeader->subtitle) }}</textarea>
                    @error('subtitle') <span style="color:#ef4444; font-size:0.75rem;">{{ $message }}</span> @enderror
                </div>

                <div class="field-group">
                    <label class="form-label">Gambar Latar Belakang Header</label>
                    <div class="upload-area" onclick="document.getElementById('gambarInput').click()">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <span>Klik untuk upload gambar baru<br><small style="color:#94a3b8;">JPG, PNG, WEBP — Maks 5MB</small></span>
                    </div>
                    <input type="file" id="gambarInput" name="gambar" accept="image/*" style="display:none;" onchange="previewImage(this)">
                    @error('gambar') <span style="color:#ef4444; font-size:0.75rem;">{{ $message }}</span> @enderror
                    <p style="font-size:0.72rem; color:#94a3b8; margin-top:8px;">Biarkan kosong jika tidak ingin mengganti gambar.</p>
                </div>

                <div style="display:flex; gap:10px; margin-top:24px;">
                    <button type="submit" class="btn-save"><i class="fas fa-save me-2"></i>Simpan Perubahan</button>
                    <a href="{{ route('admin.page-header.index') }}" class="btn-cancel">Batal</a>
                </div>
            </div>

            {{-- RIGHT: Preview --}}
            <div>
                <label class="form-label">Preview Gambar Saat Ini</label>
                <div class="preview-box" id="previewContainer">
                    @if($pageHeader->gambar)
                        <img src="{{ asset($pageHeader->gambar) }}" id="previewImg" alt="Preview">
                        <div class="preview-overlay"><i class="fas fa-image" style="font-size:1.5rem;"></i><br>Ganti gambar</div>
                    @else
                        <div style="display:flex; flex-direction:column; align-items:center; justify-content:center; height:100%; color:#94a3b8;">
                            <i class="fas fa-image" style="font-size:3rem; margin-bottom:10px;"></i>
                            <span style="font-size:0.8rem;">Belum ada gambar</span>
                        </div>
                    @endif
                </div>

                <div style="margin-top:15px; padding:15px; background:#f8fafc; border-radius:10px; border:1px solid #e2e8f0;">
                    <p style="font-size:0.78rem; color:#64748b; margin:0 0 8px; font-weight:600;">Preview Header Teks:</p>
                    <div style="background:linear-gradient(135deg,rgba(0,36,65,0.8),rgba(0,80,120,0.7)); padding:20px; border-radius:8px; text-align:center; color:white;">
                        <h4 id="liveTitle" style="margin:0 0 6px; font-family:'Cormorant Garamond',serif; font-size:1.4rem; font-weight:700;">{{ $pageHeader->title ?? 'Judul Halaman' }}</h4>
                        <p id="liveSubtitle" style="margin:0; font-size:0.75rem; opacity:0.85; letter-spacing:1px; text-transform:uppercase;">{{ $pageHeader->subtitle ?? 'Subjudul halaman' }}</p>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const container = document.getElementById('previewContainer');
            container.innerHTML = '<img src="' + e.target.result + '" id="previewImg" style="width:100%;height:100%;object-fit:cover;"><div class="preview-overlay"><i class="fas fa-image" style="font-size:1.5rem;"></i><br>Gambar Baru</div>';
        };
        reader.readAsDataURL(input.files[0]);
    }
}

// Live preview title & subtitle
document.querySelector('[name="title"]').addEventListener('input', function() {
    document.getElementById('liveTitle').textContent = this.value || 'Judul Halaman';
});
document.querySelector('[name="subtitle"]').addEventListener('input', function() {
    document.getElementById('liveSubtitle').textContent = this.value || 'Subjudul halaman';
});
</script>

@endsection
