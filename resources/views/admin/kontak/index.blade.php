@extends('layouts.admin')

@section('title', 'Manajemen Info Kontak')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
    <h5 class="mb-0"><i class="fas fa-address-book me-2 text-primary"></i> Daftar Info Kontak</h5>
    <a href="{{ route('admin.kontak-info.create') }}" class="btn-primary-custom btn">
        <i class="fas fa-plus me-2"></i> Tambah Info Kontak
    </a>
</div>

<div class="card-premium">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 8px;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-custom">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tipe</th>
                    <th>Label</th>
                    <th>Nilai</th>
                    <th>Icon</th>
                    <th>Urutan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kontakInfos as $item)
                <tr>
                    <td>{{ ($kontakInfos->currentPage() - 1) * $kontakInfos->perPage() + $loop->iteration }}</td>
                    <td>
                        @switch($item->tipe)
                            @case('alamat')
                                <span class="badge bg-primary" style="font-size: 0.75rem; padding: 5px 10px; border-radius: 6px;">Alamat</span>
                                @break
                            @case('telepon')
                                <span class="badge bg-success" style="font-size: 0.75rem; padding: 5px 10px; border-radius: 6px;">Telepon</span>
                                @break
                            @case('email')
                                <span class="badge bg-info" style="font-size: 0.75rem; padding: 5px 10px; border-radius: 6px;">Email</span>
                                @break
                            @case('sosial_media')
                                <span class="badge bg-warning text-dark" style="font-size: 0.75rem; padding: 5px 10px; border-radius: 6px;">Sosial Media</span>
                                @break
                            @case('jam_operasional')
                                <span class="badge bg-secondary" style="font-size: 0.75rem; padding: 5px 10px; border-radius: 6px;">Jam Operasional</span>
                                @break
                        @endswitch
                    </td>
                    <td>{{ $item->label ?? '-' }}</td>
                    <td style="max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $item->nilai }}</td>
                    <td>
                        @if($item->icon)
                            <i class="{{ $item->icon }}" style="font-size: 1.1rem;" title="{{ $item->icon }}"></i>
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $item->urutan }}</td>
                    <td>
                        @if($item->is_active)
                            <span class="badge-success badge">Aktif</span>
                        @else
                            <span class="badge-danger badge">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.kontak-info.edit', $item->id) }}" class="btn btn-outline-custom" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.kontak-info.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-outline-custom" style="border-color: #ef4444; color: #ef4444;" onclick="return confirm('Yakin menghapus info kontak ini?')" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" class="text-center py-4 text-muted">Belum ada data info kontak</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $kontakInfos->links('vendor.pagination.bootstrap-5') }}
    </div>
</div>
@endsection
