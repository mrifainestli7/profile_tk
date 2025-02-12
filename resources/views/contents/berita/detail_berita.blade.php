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

            <div class="d-flex align-items-center">
                <span class="mr-2">Bagikan:</span>

                <!-- WhatsApp -->
                <a href="https://api.whatsapp.com/send?text={{ urlencode(request()->fullUrl()) }}" target="_blank"
                    class="btn btn-light rounded-circle mx-1">
                    <i class="fab fa-whatsapp text-success"></i>
                </a>

                <!-- Facebook -->
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank"
                    class="btn btn-light rounded-circle mx-1">
                    <i class="fab fa-facebook text-primary"></i>
                </a>

                <!-- Twitter (X) -->
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}" target="_blank"
                    class="btn btn-light rounded-circle mx-1">
                    <i class="fab fa-x-twitter text-dark"></i>
                </a>

                <!-- Tombol Copy Link -->
                <button id="copyBtn" class="btn btn-light rounded-circle mx-1" onclick="copyToClipboard()">
                    <i class="fas fa-link text-secondary"></i>
                </button>

                <!-- Notifikasi Copy -->
                <span id="copyMessage" class="ml-2 p-2 text-white rounded d-none" style="background-color: rgb(42, 90, 0);">
                    URL telah tercopy
                </span>
            </div>

            {{-- Tombol Kembali --}}
            <div class="my-4">
                <a href="{{ url('/berita') }}" class="btn btn-primary">
                    &laquo; Kembali ke Beranda Berita
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <h2>Berita Terpopuler</h2>
            <ul class="list-group">
                @foreach ($beritaTerpopuler as $populer)
                    <li class="list-group-item">
                        <h5>
                            <a href="{{ route('berita.tampil', $populer->slug) }}">{{ $populer->judul }}</a>
                        </h5>
                        <p>dibaca: {{ $populer->views }} kali | Tanggal:
                            {{ \Carbon\Carbon::parse($populer->tanggal)->format('d M Y') }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
