@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
   <!-- Breadcrumb Navigation -->
   <div class="mt-3 mb-2">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('guru.index') }}">Guru</a></li>
        <li class="breadcrumb-item active" aria-current="page">Ubah</li>
      </ol>
    </nav>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Data Guru</h1>
    </div>
  </div>

  <!-- Menampilkan Foto Profil Guru dan Form Edit Secara Horizontal -->
  <div class="row justify-content-center">
    <div class="col-md-3">
      <h5>Foto Profil Guru</h5>
      <!-- Menampilkan gambar profil atau default avatar jika tidak ada gambar -->
      <img src="{{ asset($guru->pfp_path) }}" alt="Foto Profil" class="img-fluid" style="max-width: 200px;">
    </div>

    <div class="col-md-8">
      <!-- Card untuk Form Edit Data Guru -->
      <div class="card">
        <div class="card-body">
          <form action="{{ route('guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Foto Profil -->
            <div class="mb-3">
              <label for="pfp_path" class="form-label">Foto Profil</label>
              <input type="file" class="form-control" id="pfp_path" name="pfp_path">
              <small class="text-muted">Kosongkan jika tidak ingin mengubah foto profil</small>
            </div>

            <!-- Nama Guru -->
            <div class="mb-3">
              <label for="name" class="form-label">Nama Guru</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ $guru->name }}" required>
            </div>

            <!-- NUPTK -->
            <div class="mb-3">
              <label for="nuptk" class="form-label">NUPTK</label>
              <input type="number" class="form-control" id="nuptk" name="nuptk" value="{{ $guru->nuptk }}" required>
            </div>

            <!-- Status Guru -->
            <div class="mb-3">
              <label for="status" class="form-label">Status Guru</label>
              <select class="form-control" id="status" name="status" required>
                <option value="GTY" {{ $guru->status == 'GTY' ? 'selected' : '' }}>Guru Tetap Yayasan (GTY) </option>
                <option value="GTT" {{ $guru->status == 'GTT' ? 'selected' : '' }}>Guru Tetap Tenaga Honorer (GTT)</option>
              </select>
            </div>

            <!-- Kualifikasi Pendidikan -->
            <div class="mb-3">
              <label for="qualification" class="form-label">Kualifikasi Pendidikan</label>
              <input type="text" class="form-control" id="qualification" name="qualification" value="{{ $guru->qualification }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('guru.index') }}" class="btn btn-secondary">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
