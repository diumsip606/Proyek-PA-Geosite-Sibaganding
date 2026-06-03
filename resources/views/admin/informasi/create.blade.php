@extends('layouts.admin')

@section('title', 'Tambah Informasi')

@section('content')
<div class="d-flex align-items-center mb-3">
    <a href="{{ route('admin.informasi.index') }}" class="btn btn-sm btn-secondary me-2"><i class="fas fa-arrow-left"></i></a>
    <h5 class="mb-0">Tambah Informasi Baru</h5>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.informasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
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
                </select>
            </div>
            
            <div class="mb-3">
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
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status" value="1" checked>
                    <label class="form-check-label">Aktifkan / Publish</label>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.informasi.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection