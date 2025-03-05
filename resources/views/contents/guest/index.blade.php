@extends('layouts.main')

@section('container')
    {{-- <link href="{{ asset('css/index.css') }}" rel="stylesheet"> --}}
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
            <div class="row">
                <div class="col-lg-8">
                    <h1>Welcome to <span>TK ABA Ngabean</span></h1>
                    <h2>Generasi ceria, cermat, dan sehat</h2>
                    @forelse ($data as $link)
                        <div class="btns">
                            <a href="{{ $link->link_form }}" class="btn-menu animated fadeInUp scrollto">Pendaftaran Murid
                                Baru</a>
                        </div>
                    @empty
                        <div class="btns">
                            <a href="# " class="btn-menu animated fadeInUp scrollto">Pendaftaran Murid
                                Baru</a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= Events Section ======= -->
        <section id="events" class="events">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <p>Kata Sambutan Kepala Sekolah TK ABA Ngabean</p>
                </div>

                <div data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="row event-item">
                                <div class="col-lg-6">
                                    <img src="{{ asset('img/kepsek.jpg') }}" class="img-fluid" alt="">
                                </div>
                                <div class="col-lg-6 pt-4 pt-lg-0 content">
                                    <h3>Kepala Sekolah</h3>
                                    <div class="price">
                                        <p><span>TK ABA Ngabean</span></p>
                                    </div>
                                    <h3>Jumi S.Pd</h3>
                                    <p align="justify" class="font-italic">
                                        Selamat datang di TK ABA Ngabean, semoga Allah senantiasa melimpahkan rahmat, kasih
                                        sayang dan karunia kepada kita, Aamiin. Kami sangat menghargai pilihan Bapak-Ibu
                                        atas kepercayaan yang diberikan kepada kami untuk mendidik putra & putrinya di TK
                                        ABA Ngabean. Seluruh guru dan staff berusaha memberikan pendidikan yang terbaik
                                        untuk
                                        putra-putri Bapak-Ibu sekalian. Kami menciptakan suasana bermain seperti rumah dan
                                        keluarga bagi anak-anak, sehingga anak merasa aman dan senang berada di sekolah.
                                        Pembelajaran yang kami berikan adalah pembelajaran yang berpusat kepada kebutuhan
                                        dan perkembangan anak. Setiap potensi yang mereka miliki akan kami optimalkan
                                        perkembangannya. Website ini memberikan gambaran tentang TK ABA Ngabean, baik dari
                                        sisi
                                        pembelajaran, program sekolah. , semoga menjadi amal ibadah di sisi Allah.
                                    </p>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->


                    </div>

                </div>

            </div>
        </section><!-- End Events Section -->

        <section id="berita" class="berita py-5">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Berita Terbaru</h2>
                    <p>Berita dan Informasi Seputar TK ABA Ngabean</p>
                </div>

                <div class="row">
                    @foreach ($beritas as $berita)
                        <div class="col-md-4 mb-4">
                            <div class="card card-custom">
                                <img src="{{ asset($berita->cover ?? 'img/default.jpg') }}" class="card-img-top"
                                    alt="Post Title">
                                <div class="card-body">
                                    <p class="text-muted mb-2">
                                        {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}</p>
                                    <h4 class="card-title">{{ $berita->judul }}</h4>
                                    <p class="card-text">{!! \Illuminate\Support\Str::limit($berita->konten, 150) !!}</p>
                                    <a href="{{ route('berita.tampil', $berita->slug) }}" class="btn btn-primary btn-sm">Baca
                                        selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Button to News Homepage -->
                <div class="text-center mt-3">
                    <a href="\berita" class="btn btn-custom">Kunjungi Beranda Berita</a>
                </div>
            </div>
        </section>

        <section id="ekstrakulikuler" class="events">
            <div class="container" data-aos="fade-up">
                <h1>Ekstrakurikuler</h1>
                <div class="section-title">
                    <br>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-3">
                        <ul class="nav nav-tabs flex-column">
                            <li class="nav-item">
                                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Tahfidz Al Qur'an</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Menari</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Menggambar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Menyanyi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Drumband</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-6">Senam</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-7">Anjangsana</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9 mt-4 mt-lg-0">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tab-1">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Tahfidz Al-Qur'an dan Shalat Dhuha</h3>
                                        <p class="font-italic" style="text-align: justify;">Menghafal Al Quran juga
                                            memberi manfaat-manfaat sebagai berikut : Mempunyai pikiran yang jernih.
                                            Terhindari dari rasa takut, sedih dan kecemasan. Kemampuan untuk membangun
                                            hubungan sosial yang lebih baik dan memperoleh kepercayaan dari orang lain.</p>
                                        <p></p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="{{ asset('img/foto_tk/anaksolat.PNG') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-2">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Menari</h3>
                                        <p class="font-italic" style="text-align: justify;">Seni tari merupakan aktivitas
                                            yang cocok untuk melatih kecerdasan kinestetik serta mengembangkan nilai-nilai
                                            estetika dan melatih koordinasi antara bakat musikal dengan olah tubuh Siswa
                                            atau siswi.Menari merupakan salah satu bagian dari menjaga Cagar Budaya warisan
                                            Nusantara.</p>
                                        <p></p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="{{ asset('img/ekstrakurikulermenari.jpg') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-3">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Menggambar</h3>
                                        <p class="font-italic" style="text-align: justify;">Suatu bentuk upaya melatih dan
                                            mengembangkan kemampuan anak untuk berekspresi dengan media gambar secara baik
                                            dan benar.Dan untuk kedepannya anak mampu melahirkan karya karya yang
                                            membanggakan dan bermanfaat untuk masyarakat luas.</p>
                                        <p></p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="{{ asset('img/ekstrakurikulermenggambar.jpeg') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-4">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Menyayi</h3>
                                        <p class="font-italic" style="text-align: justify;">Dengan menyanyi diharapkan
                                            dapat membina dan mengembangkan mental dan keyakinan diri anak dalam bidang olah
                                            vokal dan kepercayaan diri tampil dimuka umum dan meningkatkan sosio emosional
                                            anak dan adaptasi dan kerjasama 1 group olah vokal ketika harus tampil
                                            bersama-sama.</p>
                                        <p></p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="{{ asset('img/ekstrakurikulermenyanyi.jpg') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-5">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Drumband</h3>
                                        <p class="font-italic"></p>
                                        <p style="text-align: justify;"> melatih kemampuan memainkan alat musik juga
                                            belajar konsep kerja sama dan sosialisasi dalam kelompok. Anak juga dilatih
                                            untuk memahami instruksi yang diberikan. Dalam ekskul ini juga anak diajari
                                            bagaimana berkomitmen dengan tanggung jawab yang diberikan terhadap alat musik
                                            yang dipilihnya, guna memberikan penampilan terbaik untuk kelompok karena mereka
                                            pastinya akan membutuhkan satu sama lain. </p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="{{ asset('img/ekstrakurikulerdrumband.PNG') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-6">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Senam</h3>
                                        <p class="font-italic" style="text-align: justify;">Gerakan senam khusus bisa
                                            memperkuat otot punggung dan perut. Dengan demikian, anak akan lebih aktif dalam
                                            bergerak dan melompat. Namun, gerakan senam harus disesuaikan dengan usia dan
                                            tingkat kemampuan si kecil.</p>
                                        <p></p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="{{ asset('img/ekstrakurikulersenam.jpg') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-7">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Anjangsana</h3>
                                        <p class="font-italic" style="text-align: justify;">Kunjungan ke suatu tempat
                                            untuk menjalin siltaurrahmi sekaligus umtuk menambah wawasan dan pengetahuan
                                            anak terhadap lingkungan, dan biasanya kegiatan ini tergantung event atau
                                            momen-momen tertentu saja.</p>
                                        <p></p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="{{ asset('img/ekstrakurikuleranjangsana.jpg') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane" id="tab-8">
                <div class="row">
                    <div class="col-lg-8 details order-2 order-lg-1">
                        <br><br><br><br><br><br><br>

                    </div>
                    <div class="col-lg-4 text-center order-1 order-lg-2">

                    </div>
                </div>
            </div>
        </section>
    @endsection
