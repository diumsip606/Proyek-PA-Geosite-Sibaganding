@extends('layouts.admin')

@section('title', 'Manajemen Galeri')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">
            <i class="fas fa-image me-2" style="color: #c6a43b;"></i>
            Daftar Galeri
        </h5>
        <a href="{{ route('admin.galeri.create') }}" class="btn btn-sm" style="background: #c6a43b; color: white;">
            <i class="fas fa-plus me-1"></i> Tambah Galeri
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
                        <th width="80">Gambar</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Lokasi</th>
                        <th width="100">Status</th>
                        <th width="100">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($galeris as $key => $galeri)
                    <tr>
                        <td>{{ $galeris->firstItem() + $key }}</td>
                        <td>
                            @if($galeri->gambar)
                            <img src="{{ asset('storage/' . $galeri->gambar) }}"
                                    style="width: 70px; height: 60px; object-fit: cover; border-radius: 5px;"
                                    alt="Gambar Galeri">
                            @else
                                <div class="bg-secondary text-white text-center"
                                     style="width: 60px; height: 60px; line-height: 60px; border-radius: 5px;">
                                    <i class="fas fa-image"></i>
                                </div>
                            @endif
                        </td>
                        <td>{{ $galeri->judul }}</td>
                        <td>
                            <span class="badge" style="background: #c6a43b;">
                                {{ $galeri->kategori ?->nama ?? 'Tanpa Kategori'}}
                            </span>
                        </td>
                        <td>{{ $galeri->lokasi ?: '-' }}</td>
                        <td>
                            @if($galeri->status)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-danger">Tidak Aktif</span>
                            @endif
                        </td>
<td>
                            <a href="{{ route('admin.galeri.edit', $galeri->id) }}" class="btn btn-sm btn-warning me-2" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('admin.galeri.destroy', $galeri->id) }}" method="POST" onsubmit="return confirm('Yakin?')" style="display: inline-block; margin-right: 8px;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>

                            @if($galeri->is_hero)
                                <span class="badge bg-success" style="padding: 6px 10px;">Hero Aktif</span>
                            @else
                                <form action="{{ route('admin.galeri.set_hero', $galeri->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-info text-white" onclick="return confirm('Jadikan gambar ini sebagai background halaman galerry?')" title="Jadikan Hero Halaman Depan">
                                        <i class="fas fa-star me-1"></i> Jadikan Background Utama
                                    </button>
                                </form>
                            @endif
                        </td>

                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center">Tidak ada data</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    <div class="mt-3">
        {{ $galeris->links() }}
    </div>
</div>
@endsection
