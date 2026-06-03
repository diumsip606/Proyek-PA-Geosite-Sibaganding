@extends('layouts.admin')
 
@section('title', 'Detail Pesan Masuk')
 
@section('content')
<div class="mb-4">
    <a href="{{ route('admin.pesan.index') }}" class="btn btn-sm btn-secondary" style="border-radius: 8px;">
        <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar
    </a>
</div>
 
<div class="card shadow-sm border-0" style="border-radius: 16px;">
    <div class="card-header bg-white py-3 border-0" style="border-radius: 16px 16px 0 0; border-bottom: 1px solid #f0f0f0 !important;">
        <h5 class="mb-0 text-dark font-weight-bold">
            <i class="fas fa-envelope-open-text me-2 text-primary"></i> Detail Pesan Masuk
        </h5>
    </div>
    <div class="card-body p-4">
        <div class="row mb-3">
            <div class="col-md-3 text-muted"><strong>Nama Pengirim</strong></div>
            <div class="col-md-9"><strong>{{ $pesan->nama }}</strong></div>
        </div>
        <hr class="text-light" style="border-top: 1px solid #f0f0f0;">
        
        <div class="row mb-3">
            <div class="col-md-3 text-muted"><strong>Email</strong></div>
            <div class="col-md-9"><a href="mailto:{{ $pesan->email }}">{{ $pesan->email }}</a></div>
        </div>
        <hr class="text-light" style="border-top: 1px solid #f0f0f0;">
 
        <div class="row mb-3">
            <div class="col-md-3 text-muted"><strong>Nomor Telepon</strong></div>
            <div class="col-md-9">
                @if($pesan->telepon)
                    <a href="tel:{{ $pesan->telepon }}">{{ $pesan->telepon }}</a>
                @else
                    -
                @endif
            </div>
        </div>
        <hr class="text-light" style="border-top: 1px solid #f0f0f0;">
 
        <div class="row mb-3">
            <div class="col-md-3 text-muted"><strong>Subjek</strong></div>
            <div class="col-md-9"><span class="badge bg-secondary" style="font-size: 0.85rem; padding: 6px 12px; border-radius: 6px;">{{ $pesan->subjek }}</span></div>
        </div>
        <hr class="text-light" style="border-top: 1px solid #f0f0f0;">
 
        <div class="row mb-3">
            <div class="col-md-3 text-muted"><strong>Tanggal Kirim</strong></div>
            <div class="col-md-9">{{ $pesan->created_at->format('d M Y H:i') }} ({{ $pesan->created_at->diffForHumans() }})</div>
        </div>
        <hr class="text-light" style="border-top: 1px solid #f0f0f0;">
 
        <div class="row mb-4">
            <div class="col-md-3 text-muted mb-2 mb-md-0"><strong>Isi Pesan</strong></div>
            <div class="col-md-9 bg-light p-3 rounded" style="border-radius: 12px; min-height: 120px; white-space: pre-wrap; font-size: 0.95rem; line-height: 1.6;">{{ $pesan->pesan }}</div>
        </div>
 
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mt-4 pt-3 border-top" style="border-top: 1px solid #f0f0f0 !important;">
            <div>
                <a href="mailto:{{ $pesan->email }}?subject=Balasan: {{ rawurlencode($pesan->subjek) }}&body=Halo {{ rawurlencode($pesan->nama) }},%0D%0A%0D%0A" class="btn btn-primary px-4" style="border-radius: 8px;">
                    <i class="fas fa-reply me-2"></i> Balas via Email
                </a>
            </div>
            <div>
                <form action="{{ route('admin.pesan.destroy', $pesan->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger px-4" style="border-radius: 8px;" onclick="return confirm('Yakin ingin menghapus pesan ini?')">
                        <i class="fas fa-trash me-2"></i> Hapus Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
