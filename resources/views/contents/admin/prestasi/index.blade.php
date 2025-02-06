@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Prestasi</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <a href="{{ route('prestasi.create') }}" class="btn btn-sm btn-outline-primary">
        Tambah Prestasi
      </a>
    </div>
  </div>

  <h2>Daftar Prestasi</h2>
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
      <thead class="table-success">
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Prestasi</th>
          <th scope="col">Kategori Lomba</th>
          <th scope="col">Tingkat</th>
          <th scope="col">Diraih</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($data as $prestasi)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $prestasi->prestasi }}</td>
          <td>{{ $prestasi->kategori_lomba }}</td>
          <td>{{ $prestasi->tingkat }}</td>
          <td>{{ \Carbon\Carbon::parse($prestasi->diraih)->format('d M Y') }}</td>
          <td>
            <a href="{{ route('prestasi.edit', $prestasi->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('prestasi.destroy', $prestasi->id) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="6" class="text-center">Belum ada data prestasi.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</main>
@endsection
