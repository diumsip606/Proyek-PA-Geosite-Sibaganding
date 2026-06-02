@extends('layouts.admin')

@section('title', 'Manajemen Warisan Geologi')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">
            <i class="fas fa-landmark me-2" style="color: #c6a43b;"></i>
            Daftar Slide Warisan Geologi
        </h5>
        <a href="{{ route('admin.warisan-geologi.create') }}" class="btn btn-sm" style="background: #c6a43b; color: white;">
            <i class="fas fa-plus me-1"></i> Tambah Slide
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
                        <th width="120">Gambar</th>
                        <th>Sub Judul</th>
                        <th>Judul Utama</th>
                        <th>Angka Card</th>
                        <th>Teks Card</th>
                        <th width="80">Urutan</th>
                        <th width="90">Status</th>
                        <th width="100">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($slides as $key => $slide)
                    <tr>
                        <td>{{ $slides->firstItem() + $key }}</td>
                        <td>
                            @if($slide->gambar)
                            <img src="{{ asset($slide->gambar) }}"
                                 style="width: 100px; height: 60px; object-fit: cover; border-radius: 6px; border: 2px solid #ddd;"
                                 alt="Gambar Warisan">
                            @else
                                <div class="bg-secondary text-white text-center"
                                     style="width: 100px; height: 60px; line-height: 60px; border-radius: 6px;">
                                    <i class="fas fa-image"></i>
                                </div>
                            @endif
                        </td>
                        <td><span class="text-muted" style="font-size: 0.8rem;">{{ $slide->sub_judul }}</span></td>
                        <td><strong>{{ $slide->judul }}</strong></td>
                        <td class="text-center font-monospace" style="color: #c6a43b; font-weight: 700;">{{ $slide->card_angka }}</td>
                        <td style="font-size: 0.8rem;">{{ Str::limit($slide->card_teks, 50) }}</td>
                        <td class="text-center fw-bold">{{ $slide->urutan }}</td>
                        <td>
                            @if($slide->status)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-danger">Tidak Aktif</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.warisan-geologi.edit', $slide->id) }}" class="btn btn-sm btn-warning me-2" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('admin.warisan-geologi.destroy', $slide->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus slide warisan geologi ini?')" style="display: inline-block;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">Tidak ada slide warisan geologi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $slides->links() }}
        </div>
    </div>
</div>
@endsection
