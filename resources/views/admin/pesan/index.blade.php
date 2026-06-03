@extends('layouts.admin')
 
@section('title', 'Pesan Masuk')
 
@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
    <h5 class="mb-0"><i class="fas fa-envelope me-2 text-primary"></i> Daftar Pesan Masuk</h5>
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
                    <th>Nama Pengirim</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Subjek</th>
                    <th>Tanggal Masuk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pesans as $item)
                <tr>
                    <td>{{ ($pesans->currentPage() - 1) * $pesans->perPage() + $loop->iteration }}</td>
                    <td><strong>{{ $item->nama }}</strong></td>
                    <td><a href="mailto:{{ $item->email }}">{{ $item->email }}</a></td>
                    <td>{{ $item->telepon ?? '-' }}</td>
                    <td><span class="badge bg-secondary" style="font-size: 0.75rem; padding: 5px 10px; border-radius: 6px;">{{ $item->subjek }}</span></td>
                    <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.pesan.show', $item->id) }}" class="btn btn-outline-custom" title="Detail Pesan">
                                <i class="fas fa-eye text-primary"></i>
                            </a>
                            <form action="{{ route('admin.pesan.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-outline-custom" style="border-color: #ef4444; color: #ef4444;" onclick="return confirm('Yakin menghapus pesan ini?')" title="Hapus Pesan">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center py-4 text-muted">Belum ada pesan masuk</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="d-flex justify-content-center mt-3">
        {{ $pesans->links() }}
    </div>
</div>
@endsection
