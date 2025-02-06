@extends('layouts.admin')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <!-- Breadcrumb Navigation -->
        <div class="mt-3 mb-2">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('guru.index') }}">Guru</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                </ol>
            </nav>
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-3 border-bottom">
                <h1 class="h2">Tambah Guru</h1>
            </div>
        </div>

        <!-- Card to Wrap the Form -->
        <div class="card">
            <div class="card-body">
                <!-- Form with multipart enctype for file uploads -->
                <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="pfp" class="form-label">Foto Profil</label>
                        <input type="file" class="form-control" id="pfp_path" name="pfp_path" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="nuptk" class="form-label">NUPTK</label>
                        <input type="number" class="form-control" id="nuptk" name="nuptk" required>
                    </div>
                    <div class="mb-3">
                        <label for="Status" class="form-label">Status Guru</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="GTT">Guru Tetap Tenaga Honorer (GTT) </option>
                            <option value="GTY">Guru Tetap Tenaga Yayasan (GTY) </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="qualification" class="form-label">Kualifikasi Pendidikan</label>
                        <input type="text" class="form-control" id="qualification" name="qualification" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('guru.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </main>
@endsection
