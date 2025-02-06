@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
   <!-- Breadcrumb Navigation -->
   <div class="mt-3 mb-2">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('mapel.index') }}">Kurikulum</a></li>
        <li class="breadcrumb-item active" aria-current="page">Ubah</li>
      </ol>
    </nav>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Data Kurikulum</h1>
    </div>
  </div>
  
  <!-- Card to Wrap the Form -->
  <div class="card">
    <div class="card-body">
      <form action="{{ route('mapel.update', $mapel->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="mapel_name" class="form-label">Nama Kurikulum</label>
          <input type="text" class="form-control" id="mapel_name" name="mapel_name" value="{{ $mapel->mapel_name }}" required>
        </div>
        <div class="mb-3">
          <label for="mapel_desc" class="form-label">Deskripsi Kurikulum</label>
          <textarea class="form-control" id="mapel_desc" name="mapel_desc" rows="4" required>{{ $mapel->mapel_desc }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('mapel.index') }}" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
  </div>
</main>
@endsection
