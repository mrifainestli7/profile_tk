@extends('layouts.news')

@section('title', $berita->judul)

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $berita->judul }}</h1>
            <p class="text-muted">Tanggal: {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}</p>
            <p><strong>Dibaca:</strong> {{ $berita->views }} kali</p>
            <img src="{{ asset($berita->cover ?? 'img/default.jpg') }}" class="fixed-img mb-4" alt="{{ $berita->judul }}">

            {{-- Tampilkan konten HTML dari WYSIWYG --}}
            <div>
                {!! $berita->konten !!}
            </div>

            {{-- Tombol Kembali --}}
            <div class="mt-4">
                <a href="{{ url('/berita') }}" class="btn btn-primary">
                    &laquo; Kembali ke Beranda Berita
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <h2>Berita Terpopuler</h2>
            <ul class="list-group">
                @foreach($beritaTerpopuler as $populer)
                    <li class="list-group-item">
                        <h5>
                            <a href="{{ route('berita.tampil', $populer->id) }}">{{ $populer->judul }}</a>
                        </h5>
                        <p>dibaca: {{ $populer->views }} kali | Tanggal: {{ \Carbon\Carbon::parse($populer->tanggal)->format('d M Y') }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
