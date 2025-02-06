@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
   <!-- Breadcrumb Navigation -->
   <div class="mt-3 mb-2">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('kelas.index') }}">Kelas</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
      </ol>
    </nav>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Kelas</h1>
      </div>
  </div>

  <!-- Card to Wrap the Form -->
  <div class="card">
    <div class="card-body">
      <form action="{{ route('kelas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="tahun_ajar" class="form-label">Tahun Ajaran</label>
          <input type="text" class="form-control" id="tahun_ajar" name="tahun_ajar" required>
        </div>
        <div class="mb-3">
          <label for="class_name" class="form-label">Nama Kelas</label>
          <input type="text" class="form-control" id="class_name" name="class_name" required>
        </div>
        <div class="mb-3">
          <label for="homeroom_teacher" class="form-label">Wali Kelas</label>
          <input type="text" class="form-control" id="homeroom_teacher" name="homeroom_teacher" required>
        </div>
        <div class="mb-3">
          <label for="pria" class="form-label">Jumlah Siswa Pria</label>
          <input type="number" class="form-control" id="pria" name="pria" required>
        </div>
        <div class="mb-3">
          <label for="wanita" class="form-label">Jumlah Siswa Wanita</label>
          <input type="number" class="form-control" id="wanita" name="wanita" required>
        </div>
        <!-- Tidak ada input untuk total, karena akan dihitung di controller -->
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
  </div>
</main>
@endsection
