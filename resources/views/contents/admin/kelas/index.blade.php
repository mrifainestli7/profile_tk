@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Kelas</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('kelas.create') }}" class="btn btn-sm btn-outline-primary">
                Tambah Kelas
            </a>
        </div>
    </div>

    <div class="d-flex justify-content-between mb-2">
        <h2>Daftar Kelas</h2>
        <form action="{{ route('kelas.index') }}" method="GET" class="d-flex">
            <input type="text" name="q" class="form-control me-2" placeholder="Cari kelas..." value="{{ request('q') }}">
            <button type="submit" class="btn btn-outline-success">Cari</button>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-success">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Tahun Ajaran</th>
                    <th scope="col">Nama Kelas</th>
                    <th scope="col">Wali Kelas</th>
                    <th scope="col">Jumlah Pria</th>
                    <th scope="col">Jumlah Wanita</th>
                    <th scope="col">Total Siswa</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $kelas)
                    <tr>
                        <td>{{ $loop->iteration + ($data->currentPage() - 1) * $data->perPage() }}</td>
                        <td>{{ $kelas->tahun_ajar }}</td>
                        <td>{{ $kelas->class_name }}</td>
                        <td>{{ $kelas->homeroom_teacher }}</td>
                        <td>{{ $kelas->pria }}</td>
                        <td>{{ $kelas->wanita }}</td>
                        <td>{{ $kelas->total }}</td>
                        <td>
                            <a href="{{ route('kelas.edit', $kelas->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('kelas.destroy', $kelas->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Belum ada data kelas.</td>
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
