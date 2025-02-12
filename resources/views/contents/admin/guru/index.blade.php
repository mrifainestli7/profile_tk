@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Guru</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="{{ route('guru.create') }}" class="btn btn-sm btn-outline-primary">
        Tambah Guru
      </a>
    </div>
  </div>

  <!-- Form Pencarian -->
  <div class="d-flex justify-content-between mb-2">
    <h2>Daftar Guru</h2>
    <form action="{{ route('guru.index') }}" method="GET" class="d-flex">
      <input type="text" name="q" class="form-control me-2" placeholder="Cari guru ..." value="{{ request('q') }}">
      <button type="submit" class="btn btn-outline-success">Cari</button>
    </form>
  </div>

  <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
      <thead class="table-success">
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Foto</th>
          <th scope="col">NUPTK</th>
          <th scope="col">Nama</th>
          <th scope="col">Status Guru</th>
          <th scope="col">Kualifikasi Pendidikan</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($data as $guru)
        <tr>
          <td>{{ $loop->iteration + ($data->currentPage() - 1) * $data->perPage() }}</td>
          <td>
            <img src="{{ asset($guru->pfp_path) }}" alt="Foto Profil" class="img-fluid"
            style="width: 50px; height: 50px; object-fit: cover;">
          </td>
          <td>{{ $guru->nuptk }}</td>
          <td>{{ $guru->name }}</td>
          <td>{{ $guru->status }}</td>
          <td>{{ $guru->qualification }}</td>
          <td>
            <a href="{{ route('guru.edit', $guru->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('guru.destroy', $guru->id) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="7" class="text-center">Belum ada data guru.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="d-flex justify-content-center mt-3">
    {{ $data->links('pagination::simple-bootstrap-4') }}
  </div>
</main>
@endsection
