@extends('layouts.admin')

@section('title', 'Edit UMKM')

@section('content')
<div class="d-flex align-items-center mb-3">
    <a href="{{ route('admin.umkm.index') }}" class="btn btn-sm btn-secondary me-2"><i class="fas fa-arrow-left"></i></a>
    <h5 class="mb-0">Edit UMKM: {{ $umkm->nama }}</h5>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.umkm.update', $umkm->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label">Nama UMKM <span class="text-danger">*</span></label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $umkm->nama) }}" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi Singkat / Detail <span class="text-danger">*</span></label>
                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="6" required>{{ old('deskripsi', $umkm->deskripsi) }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat Lengkap</label>
                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat', $umkm->alamat) }}">
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Nomor WhatsApp / Kontak (Gunakan format 62xxx atau 08xxx)</label>
                <input type="text" name="kontak" class="form-control @error('kontak') is-invalid @enderror" value="{{ old('kontak', $umkm->kontak) }}">
                @error('kontak')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar Saat Ini</label>
                <div class="mb-2">
                    @if($umkm->gambar)
                        <img src="{{ asset($umkm->gambar) }}" class="rounded shadow-sm" style="max-width: 200px; max-height: 150px; object-fit: cover;">
                    @else
                        <span class="text-muted">Tidak ada gambar</span>
                    @endif
                </div>
                <label class="form-label">Ganti Gambar Banner</label>
                <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
                <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar. Format yang didukung: JPG, PNG, WEBP. Maksimal 2MB.</small>
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status" value="1" {{ old('status', $umkm->status) ? 'checked' : '' }} id="statusCheck">
                    <label class="form-check-label" for="statusCheck">Aktifkan (Akan tampil di halaman utama / informasi)</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary px-4">Update</button>
            <a href="{{ route('admin.umkm.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
