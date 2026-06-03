@extends('layouts.admin')

@section('title', 'Manajemen Slider Beranda')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">
            <i class="fas fa-images me-2" style="color: #c6a43b;"></i>
            Daftar Slide Beranda
        </h5>
        <a href="{{ route('admin.hero-slider.create') }}" class="btn btn-sm" style="background: #c6a43b; color: white;">
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
                        <th width="60">No</th>
                        <th width="150">Gambar</th>
                        <th>Path File</th>
                        <th width="100">Urutan</th>
                        <th width="100">Status</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sliders as $key => $slider)
                    <tr>
                        <td>{{ $sliders->firstItem() + $key }}</td>
                        <td>
                            @if($slider->gambar)
                            <img src="{{ asset($slider->gambar) }}"
                                 style="width: 120px; height: 70px; object-fit: cover; border-radius: 8px; border: 2px solid #ddd;"
                                 alt="Gambar Slide">
                            @else
                                <div class="bg-secondary text-white text-center"
                                     style="width: 120px; height: 70px; line-height: 70px; border-radius: 8px;">
                                    <i class="fas fa-image"></i>
                                </div>
                            @endif
                        </td>
                        <td class="font-monospace text-muted" style="font-size: 0.8rem;">
                            {{ $slider->gambar }}
                        </td>
                        <td class="fw-bold">{{ $slider->urutan }}</td>
                        <td>
                            @if($slider->status)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-danger">Tidak Aktif</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.hero-slider.edit', $slider->id) }}" class="btn btn-sm btn-warning me-2" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('admin.hero-slider.destroy', $slider->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus slide ini?')" style="display: inline-block;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada slide beranda. Silakan tambah slide baru.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $sliders->links() }}
        </div>
    </div>
</div>
@endsection
