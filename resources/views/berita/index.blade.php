@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4">Berita & Event</h2>

    @if($berita->count() > 0)
        <div class="row">
            @foreach($berita as $item)
                <div class="col-md-4 mb-4">
                    <div class="card">

                        <img src="{{ asset($item->gambar) }}" class="card-img-top" style="height:200px; object-fit:cover;">

                        <div class="card-body">
                            <h5>{{ $item->judul }}</h5>
                            <p>{{ Str::limit($item->konten, 100) }}</p>

                            <small>{{ $item->tanggal_terbit }}</small>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center">
            <p>Belum Ada Berita</p>
        </div>
    @endif

</div>
@endsection