@extends('layouts.admin')

@section('title', 'Manajemen Hotel & Penginapan')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
    <h5 class="mb-0"><i class="fas fa-hotel me-2 text-primary"></i> Daftar Hotel & Penginapan</h5>
    <a href="{{ route('admin.penginapan.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i> Tambah Penginapan
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
                        <th>Harga Estimasi</th>
                        <th>Alamat</th>
                        <th>Kontak / WA</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($penginapans as $item)
                    <tr>
                        <td>{{ ($penginapans->currentPage() - 1) * $penginapans->perPage() + $loop->iteration }}</td>
                        <td>
                            @if($item->gambar)
                                <img src="{{ asset($item->gambar) }}" class="preview-img" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </td>
                        <td><strong>{{ $item->nama }}</strong></td>
                        <td>
                            @if($item->harga)
                                Rp {{ number_format($item->harga) }} / malam
                            @else
                                <span class="text-muted">Hubungi kontak</span>
                            @endif
                        </td>
                        <td>{{ Str::limit($item->alamat, 30) ?? '-' }}</td>
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
                                <a href="{{ route('admin.penginapan.edit', $item->id) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('admin.penginapan.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus penginapan ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-4 text-muted">Belum ada data Hotel & Penginapan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $penginapans->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
