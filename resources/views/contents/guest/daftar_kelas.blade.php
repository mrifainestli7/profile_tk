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
                            <th scope="col">Tahun Ajaran</th>
                            <th scope="col">Nama Kelas</th>
                            <th scope="col">Wali Kelas</th>
                            <th scope="col">Jumlah Siswa Laki-laki</th>
                            <th scope="col">Jumlah Siswa Perempuan</th>
                            <th scope="col">Total Siswa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $kelas)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $kelas->tahun_ajar }}</td>
                            <td>{{ $kelas->class_name }}</td>
                            <td>{{ $kelas->homeroom_teacher }}</td>
                            <td>{{ $kelas->pria }}</td>
                            <td>{{ $kelas->wanita }}</td>
                            <td>{{ $kelas->total }}</td>
                        </tr>
                        @endforeach
                    </tbody>                    
                </table>
            </div>
        </div>
    </section><!-- End Hero -->
@endsection
