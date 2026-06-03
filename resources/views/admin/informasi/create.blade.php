@extends('layouts.admin')

<<<<<<< HEAD
@section('title', 'Tambah Informasi')

@section('content')
<div class="d-flex align-items-center mb-3">
    <a href="{{ route('admin.informasi.index') }}" class="btn btn-sm btn-secondary me-2"><i class="fas fa-arrow-left"></i></a>
    <h5 class="mb-0">Tambah Informasi Baru</h5>
</div>

<div class="card">
=======
@section('title', request('kategori') === 'Pengurus' ? 'Tambah Pengurus' : 'Tambah Informasi')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>{{ request('kategori') === 'Pengurus' ? 'Tambah Pengurus' : 'Tambah Informasi' }}</h5>
    </div>
>>>>>>> c6b1f46a5c477ae0a4cec1c7fe9c0cfc2aec48e5
    <div class="card-body">
        <form action="{{ route('admin.informasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
<<<<<<< HEAD
                <label class="form-label">Judul <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control" required placeholder="Contoh: Sejarah Geosite Sibaganding">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Kategori <span class="text-danger">*</span></label>
                <select name="kategori" class="form-control" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Geologi">Geologi</option>
                    <option value="Budaya">Budaya</option>
                    <option value="Wisata">Wisata</option>
                    <option value="Transportasi">Transportasi</option>
                    <option value="Sejarah">Sejarah</option>
=======
                <label class="form-label">{{ request('kategori') === 'Pengurus' ? 'Nama Pengurus' : 'Judul' }}</label>
                <input type="text" name="judul" class="form-control" placeholder="{{ request('kategori') === 'Pengurus' ? 'Masukkan nama lengkap pengurus' : 'Masukkan judul informasi' }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Kategori</label>
<<<<<<< HEAD
                <select name="kategori" class="form-control" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Geologi" {{ request('kategori') === 'Geologi' ? 'selected' : '' }}>Geologi</option>
                    <option value="Budaya" {{ request('kategori') === 'Budaya' ? 'selected' : '' }}>Budaya</option>
                    <option value="Wisata" {{ request('kategori') === 'Wisata' ? 'selected' : '' }}>Wisata</option>
                    <option value="Transportasi" {{ request('kategori') === 'Transportasi' ? 'selected' : '' }}>Transportasi</option>
                    <option value="Pengurus" {{ request('kategori') === 'Pengurus' ? 'selected' : '' }}>Pengurus (Tim Pengelola)</option>
=======
                <select name="kategori" class="form-select" required>
                    <option value="">Pilih</option>
                    <option value="Biodiversity">Biodiversity</option>
                    <option value="Geodiversity">Geodiversity</option>
                    <option value="Culture Diversity">Culture Diversity</option>
>>>>>>> 83f11f0d6598cfc10d99f3793a4c2f8882a7071d
>>>>>>> c6b1f46a5c477ae0a4cec1c7fe9c0cfc2aec48e5
                </select>
            </div>
            
            <div class="mb-3">
<<<<<<< HEAD
                <label class="form-label">Penulis</label>
                <input type="text" name="penulis" class="form-control" value="Admin">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Konten <span class="text-danger">*</span></label>
                <textarea name="konten" class="form-control" rows="8" required placeholder="Tulis konten informasi di sini..."></textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Gambar <span class="text-danger">*</span></label>
                <input type="file" name="gambar" class="form-control" accept="image/*" required>
            </div>
            
            <div class="mb-3">
=======
                <label class="form-label">{{ request('kategori') === 'Pengurus' ? 'Jabatan / Role' : 'Penulis' }}</label>
                <input type="text" name="penulis" class="form-control" placeholder="{{ request('kategori') === 'Pengurus' ? 'Contoh: Ketua Pengelola, Koordinator Lapangan' : 'Contoh: Admin GeoToba' }}" required>
                <small class="text-muted">
                    @if(request('kategori') === 'Pengurus')
                        Isi dengan Jabatan / Role pengurus tersebut di Geosite.
                    @else
                        Isi nama penulis artikel/informasi ini.
                    @endif
                </small>
            </div>
            
            <div class="mb-3">
                <label class="form-label">{{ request('kategori') === 'Pengurus' ? 'Deskripsi Profil / Bio' : 'Konten / Deskripsi' }}</label>
                <textarea name="konten" class="form-control" rows="8" placeholder="{{ request('kategori') === 'Pengurus' ? 'Masukkan penjelasan singkat mengenai pengurus ini' : 'Masukkan isi deskripsi informasi' }}" required></textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Gambar / Foto</label>
                <input type="file" name="gambar" class="form-control" accept="image/*">
            </div>
            
            <div class="mb-3">
>>>>>>> c6b1f46a5c477ae0a4cec1c7fe9c0cfc2aec48e5
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status" value="1" checked>
                    <label class="form-check-label">Aktifkan / Publish</label>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
<<<<<<< HEAD
            <a href="{{ route('admin.informasi.index') }}" class="btn btn-secondary">Batal</a>
=======
            <a href="{{ route('admin.informasi.index', ['kategori' => request('kategori')]) }}" class="btn btn-secondary">Batal</a>
>>>>>>> c6b1f46a5c477ae0a4cec1c7fe9c0cfc2aec48e5
        </form>
    </div>
</div>
@endsection