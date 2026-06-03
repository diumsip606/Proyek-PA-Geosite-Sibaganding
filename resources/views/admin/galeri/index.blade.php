@extends('layouts.admin')

@section('title', 'Manajemen Galeri')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
    <h5 class="mb-0">
        <i class="fas fa-images me-2 text-primary"></i> Daftar Galeri
    </h5>

    <a href="{{ route('admin.galeri.create') }}" class="btn-primary-custom btn">
        <i class="fas fa-plus me-2"></i> Tambah Galeri
    </a>
</div>

<div class="card-premium">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-custom">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($galeris as $key => $item)
                    <tr>
                        <td>{{ $galeris->firstItem() + $key }}</td>

                        <td>
                            @php
                                $rawGambar = $item->gambar ? ltrim($item->gambar, '/') : null;

                                if ($rawGambar) {
                                    if (str_starts_with($rawGambar, 'http://') || str_starts_with($rawGambar, 'https://')) {
                                        $gambarGaleri = $rawGambar;
                                    } elseif (str_starts_with($rawGambar, 'storage/')) {
                                        $gambarGaleri = asset($rawGambar);
                                    } else {
                                        $gambarGaleri = asset('storage/' . $rawGambar);
                                    }
                                } else {
                                    $gambarGaleri = asset('images/sibaganding1.JPG');
                                }
                            @endphp

                            <img 
                                src="{{ $gambarGaleri }}" 
                                alt="Gambar Galeri" 
                                style="width:80px;height:55px;object-fit:cover;border-radius:6px;"
                                onerror="this.onerror=null; this.src='{{ asset('images/sibaganding1.JPG') }}';"
                            >
                        </td>

                        <td>
                            <strong>{{ \Illuminate\Support\Str::limit($item->judul, 30) }}</strong>

                            @if($item->is_hero)
                                <span class="badge bg-warning text-dark ms-1">
                                    <i class="fas fa-star"></i> Hero
                                </span>
                            @endif
                        </td>

                        <td>
                            <span class="badge bg-info text-white">
                                {{ $item->kategori->nama ?? 'Tanpa Kategori' }}
                            </span>
                        </td>

                        <td>{{ $item->lokasi ?: '-' }}</td>

                        <td>
                            @if($item->status)
                                <span class="badge-success badge">Aktif</span>
                            @else
                                <span class="badge-danger badge">Tidak</span>
                            @endif
                        </td>

                        <td>
                            <div class="d-flex gap-1 align-items-center">
                                <a href="{{ route('admin.galeri.edit', $item->id) }}" class="btn btn-outline-custom">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button 
                                        type="submit" 
                                        class="btn btn-outline-custom" 
                                        style="border-color:#ef4444;color:#ef4444;" 
                                        onclick="return confirm('Yakin hapus?')"
                                    >
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>

                                @if(!$item->is_hero)
                                    <form action="{{ route('admin.galeri.set_hero', $item->id) }}" method="POST" class="d-inline">
                                        @csrf

                                        <button 
                                            type="submit" 
                                            class="btn btn-outline-custom" 
                                            style="border-color:#3b82f6;color:#3b82f6;" 
                                            title="Jadikan Hero" 
                                            onclick="return confirm('Jadikan hero?')"
                                        >
                                            <i class="far fa-star"></i>
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.galeri.unset_hero', $item->id) }}" method="POST" class="d-inline">
                                        @csrf

                                        <button 
                                            type="submit" 
                                            class="btn btn-outline-custom text-warning" 
                                            style="border-color:#ffc107;color:#ffc107;" 
                                            title="Batalkan Hero" 
                                            onclick="return confirm('Batalkan hero?')"
                                        >
                                            <i class="fas fa-star"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">
                            Belum ada data galeri
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $galeris->links() }}
    </div>
</div>
@endsection