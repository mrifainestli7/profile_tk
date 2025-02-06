@extends('layouts.main')

@section('container')
    <main id="main">
        <section id="galeri" class="galeri">
            <div class="container py-5 mt-3" data-aos="fade-up">

                <div class="section-title my-3">
                    <h2>Galeri Foto</h2>
                    <p>Jelajahi momen-momen indah yang telah kami abadikan</p>
                </div>

                <!-- Masonry Grid -->
                <div class="row g-4">
                    @foreach ($galeri as $foto)
                        <div class="col-lg-4 col-md-6">
                            <div class="card shadow border-0" data-aos="zoom-in" data-aos-delay="200">
                                <a href="{{ asset($foto->foto_path) }}" target="_blank">
                                    <img src="{{ asset($foto->foto_path) }}" alt="Foto Galeri" class="card-img-top" style="height: 300px; object-fit: cover; cursor: pointer;">
                                </a>
                                <div class="card-body card-custom">
                                    <p class="card-text">{{ $foto->foto_desc }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
    </main>
@endsection
