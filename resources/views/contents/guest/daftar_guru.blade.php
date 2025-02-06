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
                            <th scope="col">STATUS GURU</th>
                            <th scope="col">PENDIDIKAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $guru)
                            <tr>
                                <td>{{ $index + 1 }}.</td>
                                <td>
                                    <img src="{{ asset($guru->pfp_path) }}" alt="Foto {{ $guru->name }}" class="img-fluid"
                                        style="width: 50px; height: 50px; object-fit: cover;">
                                </td>
                                <td>{{ $guru->name }}</td>
                                @if ($guru->status == 'GTY')
                                    <td> Guru Tetap Yayasan (GTY)</td>
                                @elseif ($guru->status == 'GTT')
                                    <td> Guru Tetap Tenaga Honorer (GTT)</td>
                                @else
                                    {{ $guru->status }} <!-- Fallback in case status is neither GTY nor GTT -->
                                @endif
                                <td>{{ $guru->qualification }}</td>
                            </tr>
                        @endforeach

                        @if ($data->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data guru.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section><!-- End Hero -->
@endsection
