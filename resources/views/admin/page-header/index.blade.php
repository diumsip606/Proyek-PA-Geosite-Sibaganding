@extends('layouts.admin')

@section('title', 'Header Halaman')

@section('content')

<style>
.ph-table { border-collapse: collapse; width: 100%; }
.ph-table th, .ph-table td { padding: 12px 10px; border-bottom: 1px solid #e2e8f0; font-size: 0.82rem; }
.ph-table th { color: #64748b; font-weight: 600; }
.ph-table tr:hover td { background: #f8fafc; }
.ph-preview { width: 80px; height: 50px; object-fit: cover; border-radius: 8px; border: 2px solid #e2e8f0; }
.ph-preview-empty { width: 80px; height: 50px; background: #f1f5f9; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #94a3b8; font-size: 0.7rem; border: 2px dashed #e2e8f0; text-align: center; }
.btn-edit { background: #3b82f6; color: white; border: none; padding: 6px 14px; border-radius: 6px; font-size: 0.75rem; cursor: pointer; text-decoration: none; display: inline-flex; align-items: center; gap: 5px; transition: 0.2s; }
.btn-edit:hover { background: #2563eb; transform: translateY(-1px); }
.alert-success { background: #dcfce7; color: #166534; border: 1px solid #bbf7d0; border-radius: 8px; padding: 12px 16px; margin-bottom: 15px; font-size: 0.85rem; }
</style>

<div class="card-table">
    <h5><i class="fas fa-image me-2" style="color:#3b82f6;"></i>Header Halaman</h5>
    <p style="font-size:0.8rem; color:#64748b; margin-bottom:15px;">Kelola gambar latar belakang, judul, dan subjudul untuk setiap halaman website.</p>

    @if(session('success'))
        <div class="alert-success">✅ {{ session('success') }}</div>
    @endif

    <div style="overflow-x:auto;">
        <table class="ph-table">
            <thead>
                <tr>
                    <th>Halaman</th>
                    <th>Gambar Preview</th>
                    <th>Judul (Title)</th>
                    <th>Subjudul (Subtitle)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pageHeaders as $header)
                <tr>
                    <td>
                        <strong style="color:#1e293b;">{{ $header->label }}</strong>
                        <br>
                        <span style="color:#94a3b8; font-size:0.72rem;">{{ $header->page_name }}</span>
                    </td>
                    <td>
                        @if($header->gambar)
                            <img class="ph-preview" src="{{ asset($header->gambar) }}" alt="{{ $header->label }}" onerror="this.parentElement.innerHTML='<div class=\'ph-preview-empty\'>No Image</div>'">
                        @else
                            <div class="ph-preview-empty"><i class="fas fa-image"></i><br>Belum ada</div>
                        @endif
                    </td>
                    <td style="max-width:200px;">
                        <span style="color:#334155;">{{ $header->title ?? '-' }}</span>
                    </td>
                    <td style="max-width:250px;">
                        <span style="color:#64748b; font-size:0.78rem;">{{ Str::limit($header->subtitle, 60) ?? '-' }}</span>
                    </td>
                    <td>
                        <a href="{{ route('admin.page-header.edit', $header->id) }}" class="btn-edit">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
