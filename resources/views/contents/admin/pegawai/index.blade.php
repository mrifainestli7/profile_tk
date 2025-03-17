@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Pegawai</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="{{ route('pegawai.create') }}" class="btn btn-sm btn-outline-primary">
        Tambah Pegawai
      </a>
    </div>
  </div>

  <!-- Form Pencarian -->
  <div class="d-flex justify-content-between mb-2">
    <h2>Daftar Pegawai</h2>
    <form action="{{ route('pegawai.index') }}" method="GET" class="d-flex">
      <input type="text" name="q" class="form-control me-2" placeholder="Cari pegawai ..." value="{{ request('q') }}">
      <button type="submit" class="btn btn-outline-success">Cari</button>
    </form>
  </div>

  <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
      <thead class="table-success">
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Foto</th>
          <th scope="col">Nama</th>
          <th scope="col">Tugas</th>
          <th scope="col">Status Pegawai</th>
          <th scope="col">Kualifikasi Pendidikan</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($data as $pegawai)
        <tr>
          <td>{{ $loop->iteration + ($data->currentPage() - 1) * $data->perPage() }}</td>
          <td>
            <img src="{{ asset($pegawai->pfp_path) }}" alt="Foto Profil" class="img-fluid"
            style="width: 50px; height: 50px; object-fit: cover;">
          </td>
          <td>{{ $pegawai->name }}</td>
          <td>{{ $pegawai->task }}</td>
          <td>{{ $pegawai->status }}</td>
          <td>{{ $pegawai->qualification }}</td>
          <td>
            <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="7" class="text-center">Belum ada data pegawai.</td>
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
