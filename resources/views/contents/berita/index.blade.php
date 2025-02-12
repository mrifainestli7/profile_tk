@extends('layouts.news')

@section('title', 'Berita Terbaru')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h2>Berita Terkini</h2>
            <div class="row">
                @foreach ($beritas as $berita)
                    <div class="col-md-6">
                        <div class="card mb-4 shadow-sm">
                            <img src="{{ asset($berita->cover ?? 'img/default.jpg') }}" class="card-img-top"
                                alt="{{ $berita->judul }}">
                            <div class="card-body">
                                <p class="text-muted">Tanggal:
                                    {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}</p>
                                <h5 class="card-title">{{ $berita->judul }}</h5>
                                <p class="card-text">{!! \Illuminate\Support\Str::limit($berita->konten, 150) !!}</p>
                                <a href="{{ route('berita.tampil', $berita->slug) }}" class="btn btn-success">Baca
                                    Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <nav aria-label="Page navigation">
                {{ $beritas->links('pagination::simple-bootstrap-4') }}
            </nav>
        </div>
        <div class="col-md-4">
            <h2>Berita Terpopuler</h2>
            <ul class="list-group">
                @foreach ($beritaTerpopuler as $populer)
                    <li class="list-group-item">
                        <h5><a href="{{ route('berita.tampil', $populer->slug) }}">{{ $populer->judul }}</a></h5>
                        <p>dibaca: {{ $populer->views }} kali | Tanggal:
                            {{ \Carbon\Carbon::parse($populer->tanggal)->format('d M Y') }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
