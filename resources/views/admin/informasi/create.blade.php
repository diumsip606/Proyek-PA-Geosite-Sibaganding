@extends('layouts.admin')

@section('title', request('kategori') === 'Pengurus' ? 'Tambah Pengurus' : 'Tambah Informasi')

@section('content')
<div class="d-flex align-items-center mb-3">
    <a href="{{ route('admin.informasi.index', ['kategori' => request('kategori')]) }}" class="btn btn-sm btn-secondary me-2"><i class="fas fa-arrow-left"></i></a>
    <h5 class="mb-0">{{ request('kategori') === 'Pengurus' ? 'Tambah Pengurus Baru' : 'Tambah Informasi Baru' }}</h5>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.informasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">{{ request('kategori') === 'Pengurus' ? 'Nama Pengurus' : 'Judul' }} <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control" placeholder="{{ request('kategori') === 'Pengurus' ? 'Masukkan nama lengkap pengurus' : 'Contoh: Sejarah Geosite Sibaganding' }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Kategori <span class="text-danger">*</span></label>
                <select name="kategori" class="form-control" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Geologi" {{ request('kategori') === 'Geologi' ? 'selected' : '' }}>Geologi</option>
                    <option value="Budaya" {{ request('kategori') === 'Budaya' ? 'selected' : '' }}>Budaya</option>
                    <option value="Wisata" {{ request('kategori') === 'Wisata' ? 'selected' : '' }}>Wisata</option>
                    <option value="Transportasi" {{ request('kategori') === 'Transportasi' ? 'selected' : '' }}>Transportasi</option>
                    <option value="Pengurus" {{ request('kategori') === 'Pengurus' ? 'selected' : '' }}>Pengurus (Tim Pengelola)</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label class="form-label">{{ request('kategori') === 'Pengurus' ? 'Jabatan / Role' : 'Penulis' }} <span class="text-danger">*</span></label>
                <input type="text" name="penulis" class="form-control" placeholder="{{ request('kategori') === 'Pengurus' ? 'Contoh: Ketua Pengelola, Koordinator Lapangan' : 'Contoh: Admin' }}" required>
                <small class="text-muted">
                    @if(request('kategori') === 'Pengurus')
                        Isi dengan Jabatan / Role pengurus tersebut di Geosite.
                    @else
                        Isi nama penulis artikel/informasi ini.
                    @endif
                </small>
            </div>
            
            <div class="mb-3">
                <label class="form-label">{{ request('kategori') === 'Pengurus' ? 'Deskripsi Profil / Bio' : 'Konten / Deskripsi' }} <span class="text-danger">*</span></label>
                <textarea name="konten" class="form-control" rows="8" placeholder="{{ request('kategori') === 'Pengurus' ? 'Masukkan penjelasan singkat mengenai pengurus ini' : 'Tulis konten informasi di sini...' }}" required></textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Gambar / Foto <span class="text-danger">*</span></label>
                <input type="file" name="gambar" class="form-control" accept="image/*" required>
            </div>
            
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status" value="1" checked>
                    <label class="form-check-label">Aktifkan / Publish</label>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.informasi.index', ['kategori' => request('kategori')]) }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection