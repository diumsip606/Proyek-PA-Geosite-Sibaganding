@extends('layouts.admin')

@section('title', 'Tambah Informasi')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Tambah Informasi</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.informasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" placeholder="Masukkan judul informasi / nama pengurus" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="kategori" class="form-control" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Geologi">Geologi</option>
                    <option value="Budaya">Budaya</option>
                    <option value="Wisata">Wisata</option>
                    <option value="Transportasi">Transportasi</option>
                    <option value="Pengurus">Pengurus (Tim Pengelola)</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Penulis / Jabatan</label>
                <input type="text" name="penulis" class="form-control" placeholder="Contoh: Admin GeoToba (atau Jabatan jika kategori Pengurus, misal: Ketua Pengelola)">
                <small class="text-muted">Untuk kategori Pengurus, isi kolom ini dengan Jabatan/Role.</small>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Konten / Deskripsi</label>
                <textarea name="konten" class="form-control" rows="8" placeholder="Masukkan isi informasi / deskripsi profil pengurus" required></textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Gambar</label>
                <input type="file" name="gambar" class="form-control" accept="image/*">
            </div>
            
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status" value="1" checked>
                    <label class="form-check-label">Aktifkan</label>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.informasi.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection