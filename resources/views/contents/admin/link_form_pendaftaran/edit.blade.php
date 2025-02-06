@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
   <!-- Breadcrumb Navigation -->
   <div class="mt-3 mb-2">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('link_form_pendaftaran.index') }}">Link Form Pendaftaran</a></li>
        <li class="breadcrumb-item active" aria-current="page">Ubah</li>
      </ol>
    </nav>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah DLink Form Pendaftaran</h1>
    </div>
  </div>

  <!-- Card to Wrap the Form -->
  <div class="card">
    <div class="card-body">
      <form action="{{ route('link_form_pendaftaran.update', $link_form_pendaftaran->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="class_name" class="form-label">Link Pendaftaran</label>
          <input type="text" class="form-control" id="link_form" name="link_form" value="{{ $link_form_pendaftaran->link_form }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('link_form_pendaftaran.index') }}" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
  </div>
</main>
@endsection
