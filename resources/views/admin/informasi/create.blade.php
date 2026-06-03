@extends('layouts.admin')

@section('title', request('kategori') === 'Pengurus' ? 'Tambah Pengurus' : 'Tambah Informasi')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>{{ request('kategori') === 'Pengurus' ? 'Tambah Pengurus' : 'Tambah Informasi' }}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.informasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">{{ request('kategori') === 'Pengurus' ? 'Nama Pengurus' : 'Judul' }}</label>
                <input type="text" name="judul" class="form-control" placeholder="{{ request('kategori') === 'Pengurus' ? 'Masukkan nama lengkap pengurus' : 'Masukkan judul informasi' }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Kategori</label>
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
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status" value="1" checked>
                    <label class="form-check-label">Aktifkan</label>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.informasi.index', ['kategori' => request('kategori')]) }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection