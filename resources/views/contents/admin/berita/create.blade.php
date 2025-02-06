@extends('layouts.admin')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="mt-3 mb-2">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('berita.index') }}">Berita</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                </ol>
            </nav>
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-3 border-bottom">
                <h1 class="h2">Tambah Berita</h1>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('berita.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="cover" class="form-label">Gambar Sampul</label>
                        <input type="file" class="form-control" id="cover" name="cover"
                            accept=".jpg, .jpeg, .png, .webp">
                        @error('cover')
                            <div class="error">* {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}" required>
                        @error('judul')
                            <div class="error">* {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
                        @error('tanggal')
                            <div class="error">* {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="konten" class="form-label">Konten</label>
                        <textarea name="konten" id="konten" class="form-control">{{ old('konten') }}</textarea>
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
