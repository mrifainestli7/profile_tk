@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
   <!-- Breadcrumb Navigation -->
   <div class="mt-3 mb-2">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('pegawai.index') }}">Pegawai</a></li>
        <li class="breadcrumb-item active" aria-current="page">Ubah</li>
      </ol>
    </nav>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Data Pegawai</h1>
    </div>
  </div>

  <!-- Menampilkan Foto Profil Pegawai dan Form Edit Secara Horizontal -->
  <div class="row justify-content-center">
    <div class="col-md-3">
      <h5>Foto Profil Pegawai</h5>
      <!-- Menampilkan gambar profil atau default avatar jika tidak ada gambar -->
      <img src="{{ asset($pegawai->pfp_path) }}" alt="Foto Profil" class="img-fluid" style="max-width: 200px;">
    </div>

    <div class="col-md-8">
      <!-- Card untuk Form Edit Data Pegawai -->
      <div class="card">
        <div class="card-body">
          <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Foto Profil -->
            <div class="mb-3">
              <label for="pfp_path" class="form-label">Foto Profil</label>
              <input type="file" class="form-control" id="pfp_path" name="pfp_path">
              <small class="text-muted">Kosongkan jika tidak ingin mengubah foto profil</small>
            </div>

            <!-- Nama Pegawai -->
            <div class="mb-3">
              <label for="name" class="form-label">Nama Pegawai</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ $pegawai->name }}" required>
            </div>

            <!-- Tugas -->
            <div class="mb-3">
              <label for="task" class="form-label">Tugas</label>
              <input type="text" class="form-control" id="task" name="task" value="{{ $pegawai->task }}" required>
            </div>

            <!-- Status Pegawai -->
            <div class="mb-3">
              <label for="status" class="form-label">Status Pegawai</label>
              <select class="form-control" id="status" name="status" required>
                <option value="PTY" {{ $pegawai->status == 'PTY' ? 'selected' : '' }}>Pegawai Tetap Yayasan (PTY)</option>
                <option value="PTT" {{ $pegawai->status == 'PTT' ? 'selected' : '' }}>Pegawai Tetap Tenaga Honorer (PTT)</option>
              </select>
            </div>

            <!-- Kualifikasi Pendidikan -->
            <div class="mb-3">
              <label for="qualification" class="form-label">Kualifikasi Pendidikan</label>
              <input type="text" class="form-control" id="qualification" name="qualification" value="{{ $pegawai->qualification }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection