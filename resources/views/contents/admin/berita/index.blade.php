@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Berita</h1>    
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('berita.create') }}" class="btn btn-sm btn-outline-primary">Tambah Berita</a>
        </div>
    </div>
    <div class="d-flex justify-content-between mb-2">
        <h2>Daftar Berita</h2>
        <form action="{{ route('berita.index') }}" method="GET" class="d-flex">
            <input type="text" name="q" class="form-control me-2" placeholder="Cari berdasarkan judul..." value="{{ request('q') }}">
            <button type="submit" class="btn btn-outline-success">Cari</button>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-success">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Views</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $berita)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ asset($berita->cover) }}" alt="Gambar Berita" class="img-fluid"
                                style="width: 50px; height: 50px; object-fit: cover;">
                        </td>
                        <td>{{ $berita->judul }}</td>
                        <td>{{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}</td>
                        <td>{{ $berita->views }}</td>
                        <td>
                            <a href="{{ route('berita.edit', $berita->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('berita.destroy', $berita->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus berita ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada berita yang tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-3">
            {{ $data->links('pagination::simple-bootstrap-4') }}
        </div>
    </div>
</main>
@endsection
