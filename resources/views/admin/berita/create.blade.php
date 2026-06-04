@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Tambah Berita Baru</h5>
    </div>

    <div class="card-body">

        {{-- ✅ ERROR GLOBAL --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            {{-- JUDUL --}}
            <div class="mb-3">
                <label>Judul <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control" value="{{ old('judul') }}">
                
                @error('judul')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            
            {{-- PENULIS --}}
            <div class="mb-3">
                <label>Penulis</label>
                <input type="text" name="penulis" class="form-control" value="{{ old('penulis', 'Admin') }}">
            </div>
            
            {{-- TANGGAL --}}
            <div class="mb-3">
                <label>Tanggal Terbit <span class="text-danger">*</span></label>
                <input type="date" name="tanggal_terbit" class="form-control" value="{{ old('tanggal_terbit', date('Y-m-d')) }}">
                
                @error('tanggal_terbit')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            
            {{-- KONTEN --}}
            <div class="mb-3">
                <label>Konten <span class="text-danger">*</span></label>
                <textarea name="konten" class="form-control" rows="8">{{ old('konten') }}</textarea>
                
                @error('konten')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            
            {{-- GAMBAR --}}
            <div class="mb-3">
                <label>Gambar (Max 2MB) <span class="text-danger">*</span></label>
                <input type="file" name="gambar" class="form-control" accept="image/*">
                
                @error('gambar')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- LINK BERITA --}}
            <div class="mb-3">
                <label>Link Berita (Optional)</label>
                <input type="url" name="link" class="form-control" placeholder="https://example.com" value="{{ old('link') }}">
                
                @error('link')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            
            {{-- STATUS --}}
            <div class="mb-3">
                <div class="form-check">
                    <input 
                        class="form-check-input" 
                        type="checkbox" 
                        name="status" 
                        value="1"
                        {{ old('status', true) ? 'checked' : '' }}>
                    <label>Publish</label>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection