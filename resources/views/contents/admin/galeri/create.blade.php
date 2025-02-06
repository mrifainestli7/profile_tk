@extends('layouts.admin')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <!-- Breadcrumb Navigation -->
        <div class="mt-3 mb-2">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('galeri.index') }}">Galeri</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                </ol>
            </nav>
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-3 border-bottom">
                <h1 class="h2">Tambah Galeri</h1>
            </div>
        </div>

        <!-- Card to Wrap the Form -->
        <div class="card">
            <div class="card-body">
                <!-- Form with multipart enctype for file uploads -->
                <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="foto_path" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto_path" name="foto_path" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label for="foto_desc" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="foto_desc" name="foto_desc" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </main>
@endsection
