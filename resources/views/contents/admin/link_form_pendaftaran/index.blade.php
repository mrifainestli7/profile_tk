@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Link Form Pendaftaran</h1>
  </div>

  <h2>Google Formulir Pendaftaran</h2>
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
      <thead class="table-success">
        <tr>
          <th scope="col">Link</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($data as $form)
        <tr>
          <td>{{ $form->link_form }}</td>
          <td>
            <a href="{{ route('link_form_pendaftaran.edit', $form->id) }}" class="btn btn-sm btn-warning">Edit</a>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="6" class="text-center">Belum ada data form.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</main>
@endsection
