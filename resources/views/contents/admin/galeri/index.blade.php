@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Galeri</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('galeri.create') }}" class="btn btn-sm btn-outline-primary">
                Tambah Galeri
            </a>
        </div>
    </div>

    <div class="d-flex justify-content-between mb-2">
        <h2>Daftar Galeri</h2>
        <form action="{{ route('galeri.index') }}" method="GET" class="d-flex">
            <input type="text" name="q" class="form-control me-2" placeholder="Cari deskripsi foto..." value="{{ request('q') }}">
            <button type="submit" class="btn btn-outline-success">Cari</button>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-success">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Tanggal Dibuat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $galeri)
                    <tr>
                        <td>{{ $loop->iteration + ($data->currentPage() - 1) * $data->perPage() }}</td>
                        <td>
                            <img src="{{ asset($galeri->foto_path) }}" alt="Galeri Foto" class="img-fluid"
                                style="width: 100px; height: 100px; object-fit: cover;">
                        </td>
                        <td>{{ $galeri->foto_desc }}</td>
                        <td>{{ $galeri->created_at->format('d M Y H:i') }}</td>
                        <td>
                            <a href="{{ route('galeri.edit', $galeri->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('galeri.destroy', $galeri->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data galeri.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-3">
            {{ $data->links('pagination::bootstrap-4') }}
        </div>
    </div>
</main>
@endsection
