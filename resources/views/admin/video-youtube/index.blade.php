@extends('layouts.admin')

@section('title', 'Manajemen Video Youtube')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">
            <i class="fab fa-youtube me-2" style="color: #c6a43b;"></i>
            Daftar Video Youtube Testimoni
        </h5>
        <a href="{{ route('admin.video-youtube.create') }}" class="btn btn-sm" style="background: #c6a43b; color: white;">
            <i class="fas fa-plus me-1"></i> Tambah Video
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
                        <th width="180">Video</th>
                        <th>Judul Video</th>
                        <th>Deskripsi</th>
                        <th width="150">ID Youtube</th>
                        <th width="80">Urutan</th>
                        <th width="90">Status</th>
                        <th width="100">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($videos as $key => $video)
                    <tr>
                        <td>{{ $videos->firstItem() + $key }}</td>
                        <td>
                            @if($video->youtube_id)
                            <div class="ratio ratio-16x9" style="width: 150px; border-radius: 6px; overflow: hidden; border: 1px solid #ddd;">
                                <iframe src="https://www.youtube.com/embed/{{ $video->youtube_id }}" title="Preview" allowfullscreen style="border: none;"></iframe>
                            </div>
                            @else
                                <div class="bg-secondary text-white text-center"
                                     style="width: 150px; height: 85px; line-height: 85px; border-radius: 6px;">
                                    <i class="fab fa-youtube"></i> No Video
                                </div>
                            @endif
                        </td>
                        <td><strong>{{ $video->judul }}</strong></td>
                        <td style="font-size: 0.85rem;">{{ Str::limit($video->deskripsi, 80) }}</td>
                        <td class="font-monospace text-muted" style="font-size: 0.85rem;">
                            {{ $video->youtube_id }}
                        </td>
                        <td class="text-center fw-bold">{{ $video->urutan }}</td>
                        <td>
                            @if($video->status)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-danger">Tidak Aktif</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.video-youtube.edit', $video->id) }}" class="btn btn-sm btn-warning me-2" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('admin.video-youtube.destroy', $video->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus video ini?')" style="display: inline-block;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada video youtube.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $videos->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
