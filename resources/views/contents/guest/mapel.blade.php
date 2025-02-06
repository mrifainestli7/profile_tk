@extends('layouts.main')

@section('container')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
            <div class="row">
                <table class="table table-borderless table-striped">

                    <head>
                        <tr class="text-center">
                            <th colspan="3" class="text-center custom-header">Mata pelajaran</th>
                        </tr>
                    </head>

                    <body>
                        @forelse ($data as $mapel)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $mapel->mapel_name }}</td>
                          <td>{!! $mapel->mapel_desc !!}</td>
                        </tr>
                        @empty
                        <tr>
                          <td colspan="6" class="text-center">Belum ada data Mata Pelajaran.</td>
                        </tr>
                        @endforelse
                    </body>
                </table>
            </div>
        </div>
    </section><!-- End Hero -->
@endsection
