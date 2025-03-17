@extends('layouts.main')

@section('container')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">

            <div class="row">
                <table class="table table-borderless table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tugas</th>
                            <th scope="col">Status Pegawai</th>
                            <th scope="col">Pendidikan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $pegawai)
                            <tr>
                                <td>{{ $index + 1 }}.</td>
                                <td>
                                    <img src="{{ asset($pegawai->pfp_path) }}" alt="Foto {{ $pegawai->name }}" class="img-fluid"
                                        style="width: 50px; height: 50px; object-fit: cover;">
                                </td>
                                <td>{{ $pegawai->name }}</td>
                                <td>{{ $pegawai->task }}</td>
                                @if ($pegawai->status == 'PTY')
                                    <td>Pegawai Tetap Yayasan (PTY)</td>
                                @elseif ($pegawai->status == 'PTT')
                                    <td>Pegawai Tetap Tenaga Honorer (PTT)</td>
                                @else
                                    <td>{{ $pegawai->status }}</td> <!-- Fallback jika status tidak sesuai -->
                                @endif
                                <td>{{ $pegawai->qualification }}</td>
                            </tr>
                        @endforeach

                        @if ($data->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data pegawai.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section><!-- End Hero -->
@endsection
