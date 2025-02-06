@extends('layouts.main')

@section('container')
    <section id="why-us" class="events">
        <div class="container pt-4" data-aos="fade-up">
            <div class="section-title">
                <br>
                <p></p>
            </div>

            <div class="events-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                    <!-- Facility 1: Alat Permainanan Edukatif Dalam -->
                    <div class="swiper-slide">
                        <div class="row event-item">
                            <div class="col-lg-6">
                                <img src="{{ asset('img/edukatifdalam1.jpg') }}" alt="Alat Permainanan Edukatif Dalam" class="img-fluid" width="1200" height="500">
                            </div>
                            <div class="col-lg-6 pt-4 pt-lg-0 content">
                                <h3>Alat Permainanan Edukatif Dalam</h3>
                                <p>Alat permainan edukatif dalam ruangan ini membantu anak-anak untuk mengembangkan keterampilan motorik halus dan kreativitas mereka melalui permainan yang menyenangkan dan mendidik.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Facility 2: Perpustakaan -->
                    <div class="swiper-slide">
                        <div class="row event-item">
                            <div class="col-lg-6">
                                <img src="{{ asset('img/perpus.jpg') }}" alt="Perpustakaan" class="img-fluid" width="1200" height="500">
                            </div>
                            <div class="col-lg-6 pt-4 pt-lg-0 content">
                                <h3>Perpustakaan</h3>
                                <p>Perpustakaan kami menyediakan berbagai koleksi buku cerita dan edukasi untuk anak-anak. Ruang yang tenang untuk membaca dan belajar.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Facility 3: Ruang Pertemuan -->
                    <div class="swiper-slide">
                        <div class="row event-item">
                            <div class="col-lg-6">
                                <img src="{{ asset('img/berita_1.jpg') }}" alt="Ruang Pertemuan" class="img-fluid" width="1200" height="500">
                            </div>
                            <div class="col-lg-6 pt-4 pt-lg-0 content">
                                <h3>Ruang Pertemuan</h3>
                                <p>Ruang pertemuan ini dilengkapi dengan fasilitas modern untuk mendukung berbagai kegiatan seperti rapat, seminar, dan acara lainnya. Ruangan ini dapat menampung banyak orang dan memberikan kenyamanan untuk diskusi yang produktif.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Facility 4: Ruang Tahfidz -->
                    <div class="swiper-slide">
                        <div class="row event-item">
                            <div class="col-lg-6">
                                <img src="{{ asset('img/ruangtahfidz.jpeg') }}" alt="Ruang Tahfidz" class="img-fluid" width="1200" height="500">
                            </div>
                            <div class="col-lg-6 pt-4 pt-lg-0 content">
                                <h3>Ruang Tahfidz</h3>
                                <p>Ruang Tahfidz menyediakan lingkungan yang tenang untuk anak-anak dalam belajar menghafal Al-Qur'an dengan nyaman dan fokus.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Facility 5: Ruang Kelas -->
                    <div class="swiper-slide">
                        <div class="row event-item">
                            <div class="col-lg-6">
                                <img src="{{ asset('img/ruangkelas.jpg') }}" alt="Ruang Kelas" class="img-fluid" width="1200" height="500">
                            </div>
                            <div class="col-lg-6 pt-4 pt-lg-0 content">
                                <h3>Ruang Kelas</h3>
                                <p>Ruang kelas kami dirancang untuk mendukung pembelajaran yang interaktif dan menyenangkan bagi anak-anak dengan berbagai fasilitas yang mendidik.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Facility 6: Ruang UKS -->
                    <div class="swiper-slide">
                        <div class="row event-item">
                            <div class="col-lg-6">
                                <img src="{{ asset('img/ruanguks.jpg') }}" alt="Ruang UKS" class="img-fluid" width="1200" height="500">
                            </div>
                            <div class="col-lg-6 pt-4 pt-lg-0 content">
                                <h3>Ruang UKS</h3>
                                <p>Ruang UKS kami dilengkapi dengan berbagai fasilitas kesehatan untuk memastikan anak-anak dalam kondisi yang sehat dan terjaga kesejahteraannya.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Facility 7: Drum Band -->
                    <div class="swiper-slide">
                        <div class="row event-item">
                            <div class="col-lg-6">
                                <img src="{{ asset('img/drumband.jpeg') }}" alt="Drum Band" class="img-fluid" width="1200" height="500">
                            </div>
                            <div class="col-lg-6 pt-4 pt-lg-0 content">
                                <h3>Drum Band</h3>
                                <p>Drum band kami menjadi sarana bagi anak-anak untuk mengembangkan keterampilan musik dan kerjasama tim dalam suasana yang menyenangkan.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section><!-- End Events Section -->
@endsection
