@extends('layouts.admin')

@section('title', request('kategori') === 'Pengurus' ? 'Manajemen Pengurus' : 'Manajemen Informasi')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
    <h5 class="mb-0">
        @if(request('kategori') === 'Pengurus')
            <i class="fas fa-users me-2 text-primary"></i> Daftar Pengurus
        @else
            <i class="fas fa-info-circle me-2 text-primary"></i> Daftar Informasi
        @endif
    </h5>
    <a href="{{ route('admin.informasi.create', ['kategori' => request('kategori')]) }}" class="btn-primary-custom btn">
        <i class="fas fa-plus me-2"></i> {{ request('kategori') === 'Pengurus' ? 'Tambah Pengurus' : 'Tambah Informasi' }}
    </a>
</div>

<div class="card-premium">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-custom">
            <thead>
                @if(request('kategori') === 'Pengurus')
                    <tr><th>#</th><th>Nama Pengurus</th><th>Jabatan / Role</th><th>Status</th><th>Aksi</th></tr>
                @else
                    <tr><th>#</th><th>Judul</th><th>Kategori</th><th>Penulis</th><th>Status</th><th>Aksi</th></tr>
                @endif
            </thead>
            <tbody>
                @forelse($informasi as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><strong>{{ Str::limit($item->judul, 40) }}</strong></td>
                    @if(request('kategori') === 'Pengurus')
                        <td>{{ $item->penulis }}</td>
                    @else
                        <td><span class="badge-info badge">{{ $item->kategori }}</span></td>
                        <td>{{ $item->penulis }}</td>
                    @endif
                    <td>@if($item->status)<span class="badge-success badge">Aktif</span>@else<span class="badge-danger badge">Tidak Aktif</span>@endif</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.informasi.edit', $item->id) }}" class="btn btn-outline-custom"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.informasi.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-outline-custom" style="border-color: #ef4444; color: #ef4444;" onclick="return confirm('Yakin hapus?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="{{ request('kategori') === 'Pengurus' ? 5 : 6 }}" class="text-center py-4">
                        Belum ada data {{ request('kategori') === 'Pengurus' ? 'pengurus' : 'informasi' }}
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $informasi->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
</div>
@endsection
