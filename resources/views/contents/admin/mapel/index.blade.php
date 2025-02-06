@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Kurikulum</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="{{ route('mapel.create') }}" class="btn btn-sm btn-outline-primary">
        Tambah Kurikulum
      </a>
    </div>
  </div>

  <h2>Daftar Kurikulum</h2>
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
      <thead class="table-success">
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Nama Kurikulum</th>
          <th scope="col">Deskripsi Kurikulum</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($data as $mapel)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $mapel->mapel_name }}</td>
          <td>{!! $mapel->mapel_desc !!}</td>
          <td>
            <a href="{{ route('mapel.edit', $mapel->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('mapel.destroy', $mapel->id) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="6" class="text-center">Belum ada data Kurikulum.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</main>
@endsection
