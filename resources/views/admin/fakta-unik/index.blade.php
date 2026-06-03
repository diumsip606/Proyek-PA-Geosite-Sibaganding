@extends('layouts.admin')

@section('title', 'Manajemen Fakta Unik')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">
            <i class="fas fa-map-marker-alt me-2" style="color: #c6a43b;"></i>
            Daftar Titik Fakta Unik
        </h5>
        <a href="{{ route('admin.fakta-unik.create') }}" class="btn btn-sm" style="background: #c6a43b; color: white;">
            <i class="fas fa-plus me-1"></i> Tambah Titik
        </a>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th width="50">No</th>
                        <th width="70">Nomor</th>
                        <th>Judul Titik</th>
                        <th>Deskripsi</th>
                        <th>Tags</th>
                        <th width="120">Koordinat (X, Y)</th>
                        <th width="90">Status</th>
                        <th width="100">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($faktas as $key => $fakta)
                    <tr>
                        <td>{{ $faktas->firstItem() + $key }}</td>
                        <td class="fw-bold text-center" style="color: #c6a43b;">{{ $fakta->nomor }}</td>
                        <td>{{ $fakta->judul }}</td>
                        <td>{{ Str::limit($fakta->deskripsi, 80) }}</td>
                        <td>
                            @if($fakta->tag)
                                @foreach(explode(',', $fakta->tag) as $tag)
                                    <span class="badge bg-secondary" style="font-size: 0.65rem;">{{ trim($tag) }}</span>
                                @endforeach
                            @else
                                -
                            @endif
                        </td>
                        <td class="font-monospace text-center" style="font-size: 0.85rem;">
                            L: <strong>{{ $fakta->x_koordinat }}%</strong><br>
                            T: <strong>{{ $fakta->y_koordinat }}%</strong>
                        </td>
                        <td>
                            @if($fakta->status)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-danger">Tidak Aktif</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.fakta-unik.edit', $fakta->id) }}" class="btn btn-sm btn-warning me-2" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('admin.fakta-unik.destroy', $fakta->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus titik ini?')" style="display: inline-block;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada data fakta unik.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $faktas->links() }}
        </div>
    </div>
</div>
@endsection
