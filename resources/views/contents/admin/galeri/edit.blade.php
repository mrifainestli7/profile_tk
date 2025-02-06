@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
   <!-- Breadcrumb Navigation -->
   <div class="mt-3 mb-2">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('galeri.index') }}">Galeri</a></li>
        <li class="breadcrumb-item active" aria-current="page">Ubah</li>
      </ol>
    </nav>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Data Galeri</h1>
    </div>
  </div>

  <!-- Menampilkan Foto dan Form Edit -->
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h5 class="text-center">Foto Galeri</h5>
      <!-- Menampilkan gambar dengan ukuran lebih besar -->
      <div class="text-center mb-4">
        <img src="{{ asset($galeri->foto_path) }}" alt="Foto Galeri" class="img-fluid rounded shadow" style="max-width: 100%; height: auto;">
      </div>
      
      <!-- Card untuk Form Edit Data Galeri -->
      <div class="card">
        <div class="card-body">
          <form action="{{ route('galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Foto -->
            <div class="mb-3">
              <label for="foto_path" class="form-label">Ganti Foto</label>
              <input type="file" class="form-control" id="foto_path" name="foto_path">
              <small class="text-muted">Kosongkan jika tidak ingin mengubah foto</small>
            </div>

            <!-- Deskripsi -->
            <div class="mb-3">
              <label for="foto_desc" class="form-label">Deskripsi</label>
              <input type="text" class="form-control" id="foto_desc" name="foto_desc" value="{{ $galeri->foto_desc }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
