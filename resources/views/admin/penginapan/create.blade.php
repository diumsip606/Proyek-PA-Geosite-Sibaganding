@extends('layouts.admin')

@section('title', 'Tambah Penginapan')

@section('content')
<div class="d-flex align-items-center mb-3">
    <a href="{{ route('admin.penginapan.index') }}" class="btn btn-sm btn-secondary me-2"><i class="fas fa-arrow-left"></i></a>
    <h5 class="mb-0">Tambah Penginapan Baru</h5>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.penginapan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">Nama Penginapan / Hotel <span class="text-danger">*</span></label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required placeholder="Contoh: Hotel Sibaganding Indah">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi Lengkap <span class="text-danger">*</span></label>
                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="6" required placeholder="Tulis detail fasilitas, tipe kamar, pemandangan, dll..."></textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat Lengkap</label>
                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" placeholder="Contoh: Jl. Lintas Samosir KM 12, Sibaganding">
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Estimasi Harga Per Malam (Rp)</label>
                <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}" placeholder="Contoh: 350000">
                <small class="text-muted">Biarkan kosong jika harga bervariasi.</small>
                @error('harga')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Nomor WhatsApp / Kontak Pemesanan (Gunakan format 62xxx atau 08xxx)</label>
                <input type="text" name="kontak" class="form-control @error('kontak') is-invalid @enderror" value="{{ old('kontak') }}" placeholder="Contoh: 081234567890">
                @error('kontak')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar Penginapan <span class="text-danger">*</span></label>
                <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*" required>
                <small class="text-muted">Format yang didukung: JPG, PNG, WEBP. Maksimal 2MB.</small>
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status" value="1" checked id="statusCheck">
                    <label class="form-check-label" for="statusCheck">Aktifkan (Akan tampil di halaman utama / informasi)</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary px-4">Simpan</button>
            <a href="{{ route('admin.penginapan.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
