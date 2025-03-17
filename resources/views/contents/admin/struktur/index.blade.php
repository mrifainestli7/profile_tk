@extends('layouts.admin')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="mt-3 mb-2">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('struktur.index') }}">Struktur</a></li>
                </ol>
            </nav>
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-3 border-bottom">
                <h1 class="h2">Kelola gambar struktur</h1>
            </div>
        </div>


        <div class="card">
            <div class="card-body">
                <form action="{{ route('struktur.update', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">

                        <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                        @if ($data->image_path)
                            <div class="mt-2">
                                <img src="{{ asset($data->image_path) }}" alt="Gambar Sampul" class="img-thumbnail"
                                    style="max-width: 100%; height: auto;">

                            </div>
                        @endif
                        <label for="image_path" class="form-label">Gambar Struktur</label>
                        <input type="file" class="form-control" id="image_path" name="image_path"
                            accept=".jpg, .jpeg, .png, .webp">
                        @error('image_path')
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
