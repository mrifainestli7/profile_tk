<!DOCTYPE html>
<html lang="en">

<head>

    <title>TK ABA NGABEAN</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name:  - v4.0.
  * Template URL: https://bootstrapmade.com/-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-cente">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

            <h1 class="logo me-auto me-lg-0" style="font-family:Arial, Helvetica, sans-serif;"><a href="index.html">

                    TK ABA Ngabean</a></h1>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="/">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="/berita">Berita</a></li>
                    <li class="dropdown"><a href="#"><span>Profil Sekolah</span> <i
                                class="bi bi-chevron-"></i></a>
                        <ul>
                            <li><a href="/sejarah">Sejarah</a></li>
                            <li><a href="/visi_misi">Visi & misi kami</a></li>
                            <li><a href="/detail_TK">Identitas Sekolah</a></li>
                            <li><a href="/daftar_guru">Daftar Guru</a></li>
                            <li><a href="/struktur_TK">Struktur Sekolah</a></li>
                        </ul>
                    </li>
                    <li><a href="/fasilitas">Fasilitas Sekolah</a></li>
                    <li class="dropdown"><a href="#"><span>Akademik</span> <i class="bi bi-chevron-"></i></a>
                        <ul>
                            <li><a href="/mata_pelajaran">Kurikulum</a></li>
                            <li><a href="/#ekstrakulikuler">Ekstrakurikuler</a></li>
                            <li><a href="/prestasi">Prestasi Sekolah</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>Data TK</span> <i class="bi bi-chevron-"></i></a>
                        <ul>
                            <li><a href="/daftar_kelas">Daftar Kelas</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="/alamat"><span>Alamat Kami</span> <iclass="bi bi-chevron-"></iclass=></a>
                    </li>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    @yield('container')

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-info">
                            <h2>TK ABA Ngabean</h2>
                            <p>
                                Desa Ngabean, Triharjo, Pandak, Bantul, D.I.Y
                                <strong>Phone:</strong>11111-1111<br>
                                <strong>Whatsapp:</strong>11111111<br>
                                <strong>Email:</strong>tkabangaben@gmail.com<br>
                            </p>
                            <div class="social-links mt-3">
                                <a href="#" class="Whatsapp"><i class="bx bxl-whatsapp"></i></a>
                                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4></h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="/">Beranda</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/detail_TK">Detail Sekolah</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/prestasi">Prestasi Sekolah</a>
                            </li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/fasilitas">Fasilitas Sekolah</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4></h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="/mata_pelajaran">Kurikulum</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/daftar_guru">Daftar Guru</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/daftar_kelas">Daftar Kelas</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/ekstrakulikuler">Ekstrakulikuler</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4></h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="/galeri">Galery Foto</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/alamat">Alamat Kami</a></li>
                            <img src="{{ asset('img/logo_aba.png') }}" width="130">
                        </ul>
                    </div>

                </div>

            </div>
        </div>
        </div>


    </footer><!-- End Footer -->


    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
