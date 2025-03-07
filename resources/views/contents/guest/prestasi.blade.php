@extends('layouts.main')

@section('container')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
            <div class="row">
                <table class="table table-borderless table-striped">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">PRESTASI</th>
                            <th scope="col">KATEGORI LOMBA</th>
                            <th scope="col">TINGKAT</th>
                            <th scope="col">DIRAIH</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $prestasi)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $prestasi->prestasi }}</td>
                          <td>{{ $prestasi->kategori_lomba }}</td>
                          <td>{{ $prestasi->tingkat }}</td>
                          <td>{{ \Carbon\Carbon::parse($prestasi->tanggal)->format('d M Y') }}</td>
                        </tr>
                        @empty
                        <tr>
                          <td colspan="6" class="text-center">Belum ada data prestasi.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section><!-- End Hero -->
@endsection
