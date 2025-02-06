@extends('layouts.admin')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="mt-3 mb-2">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('berita.index') }}">Berita</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-3 border-bottom">
                <h1 class="h2">Edit Berita</h1>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('berita.update', $beritum->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="cover" class="form-label">Gambar Sampul</label>
                        <input type="file" class="form-control" id="cover" name="cover"
                            accept=".jpg, .jpeg, .png, .webp">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                        @if ($beritum->cover)
                            <div class="mt-2">
                                <img src="{{ asset($beritum->cover) }}" alt="Gambar Sampul" class="img-thumbnail"
                                    style="width: 150px; height: 150px; object-fit: cover;">
                            </div>
                        @endif
                        @error('cover')
                            <div class="error">* {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul"
                            value="{{ old('judul', $beritum->judul) }}" required>
                        @error('judul')
                            <div class="error">* {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal"
                            value="{{ old('tanggal', $beritum->tanggal) }}" required>
                        @error('tanggal')
                            <div class="error">* {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="konten" class="form-label">Konten</label>
                        <textarea name="konten" id="konten" class="form-control">{{ old('konten', $beritum->konten) }}</textarea>
                        @error('konten')
                            <div class="error">* {{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </main>
@endsection
