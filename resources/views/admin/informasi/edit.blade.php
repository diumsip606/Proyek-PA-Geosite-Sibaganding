@extends('layouts.admin')

@section('title', $informasi->kategori === 'Pengurus' ? 'Edit Pengurus' : 'Edit Informasi')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>{{ $informasi->kategori === 'Pengurus' ? 'Edit Pengurus' : 'Edit Informasi' }}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.informasi.update', $informasi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label">{{ $informasi->kategori === 'Pengurus' ? 'Nama Pengurus' : 'Judul' }}</label>
                <input type="text" name="judul" class="form-control" value="{{ $informasi->judul }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="kategori" class="form-control" required>
                    <option value="Geologi" {{ $informasi->kategori == 'Geologi' ? 'selected' : '' }}>Geologi</option>
                    <option value="Budaya" {{ $informasi->kategori == 'Budaya' ? 'selected' : '' }}>Budaya</option>
                    <option value="Wisata" {{ $informasi->kategori == 'Wisata' ? 'selected' : '' }}>Wisata</option>
                    <option value="Transportasi" {{ $informasi->kategori == 'Transportasi' ? 'selected' : '' }}>Transportasi</option>
                    <option value="Pengurus" {{ $informasi->kategori == 'Pengurus' ? 'selected' : '' }}>Pengurus (Tim Pengelola)</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label class="form-label">{{ $informasi->kategori === 'Pengurus' ? 'Jabatan / Role' : 'Penulis' }}</label>
                <input type="text" name="penulis" class="form-control" value="{{ $informasi->penulis }}" required>
                <small class="text-muted">
                    @if($informasi->kategori === 'Pengurus')
                        Isi dengan Jabatan / Role pengurus tersebut di Geosite.
                    @else
                        Isi nama penulis artikel/informasi ini.
                    @endif
                </small>
            </div>
            
            <div class="mb-3">
                <label class="form-label">{{ $informasi->kategori === 'Pengurus' ? 'Deskripsi Profil / Bio' : 'Konten / Deskripsi' }}</label>
                <textarea name="konten" class="form-control" rows="8" required>{{ $informasi->konten }}</textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Gambar / Foto Saat Ini</label>
                @if($informasi->gambar)
                    <br><img src="{{ asset($informasi->gambar) }}" width="100" class="mb-2 rounded" onerror="this.src='{{ asset('storage/'.$informasi->gambar) }}'">
                @endif
                <input type="file" name="gambar" class="form-control" accept="image/*">
            </div>
            
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status" value="1" {{ $informasi->status ? 'checked' : '' }}>
                    <label class="form-check-label">Aktifkan</label>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.informasi.index', ['kategori' => $informasi->kategori === 'Pengurus' ? 'Pengurus' : '']) }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection