@extends('layouts.admin')

@section('title', 'Manajemen UMKM')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
    <h5 class="mb-0"><i class="fas fa-store me-2 text-primary"></i> Daftar UMKM</h5>
    <a href="{{ route('admin.umkm.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i> Tambah UMKM
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table align-middle table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Kontak / WA</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($umkms as $item)
                    <tr>
                        <td>{{ ($umkms->currentPage() - 1) * $umkms->perPage() + $loop->iteration }}</td>
                        <td>
                            @if($item->gambar)
                                <img src="{{ asset($item->gambar) }}" class="preview-img" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </td>
                        <td><strong>{{ $item->nama }}</strong></td>
                        <td>{{ Str::limit($item->alamat, 40) ?? '-' }}</td>
                        <td>{{ $item->kontak ?? '-' }}</td>
                        <td>
                            @if($item->status)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-danger">Nonaktif</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.umkm.edit', $item->id) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('admin.umkm.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus UMKM ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">Belum ada data UMKM.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $umkms->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
