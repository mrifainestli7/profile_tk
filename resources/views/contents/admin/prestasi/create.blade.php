@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
   <!-- Breadcrumb Navigation -->
   <div class="mt-3 mb-2">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('prestasi.index') }}">Prestasi</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
      </ol>
    </nav>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Prestasi</h1>
      </div>
  </div>

  <!-- Card to Wrap the Form -->
  <div class="card">
    <div class="card-body">
      <!-- Display Validation Errors -->
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      
      <!-- Form with multipart enctype for file uploads -->
      <form action="{{ route('prestasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="foto_prestasi" class="form-label">Foto Prestasi</label>
          <input type="file" class="form-control" id="foto_prestasi" name="foto_prestasi" accept="image/*">
        </div>
        <div class="mb-3">
          <label for="prestasi" class="form-label">Nama Prestasi</label>
          <input type="text" class="form-control" id="prestasi" name="prestasi" required>
        </div>
        <div class="mb-3">
          <label for="kategori_lomba" class="form-label">Kategori Lomba</label>
          <input type="text" class="form-control" id="kategori_lomba" name="kategori_lomba" required>
        </div>
        <div class="mb-3">
          <label for="tingkat" class="form-label">Tingkat</label>
          <input type="text" class="form-control" id="tingkat" name="tingkat" required>
        </div>
        <div class="mb-3">
          <label for="tanggal" class="form-label">Tanggal Diraih</label>
          <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('prestasi.index') }}" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
  </div>
</main>
@endsection
