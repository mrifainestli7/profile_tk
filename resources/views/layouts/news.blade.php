<!DOCTYPE html>
<html lang="id">

<>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Berita Terbaru')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/news.css') }}" rel="stylesheet">
    @stack('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light">
            <h3>Berita Seputar TK ABA Ngabean</h3>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto mr-2">
                    <!-- Tautan ke Beranda Berita -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/berita') }}">Beranda Berita</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"> | </a>
                    </li>
                    <!-- Tautan ke Halaman Profil -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Kembali ke profile Web</a>
                    </li>
                </ul>
                <form class="form-inline mr-auto ml-2 my-1 search-form align-items-center" method="GET"
                    action="{{ route('berita.cari') }}">
                    <input class="form-control search-input mr-2" type="search" name="q"
                        placeholder="Cari berita..." aria-label="Search" value="{{ request('q') ?? '' }}">
                    <button class="btn btn-warning" type="submit">Cari</button>
                </form>
            </div>
        </nav>


        <div class="container content mt-4">
            @yield('content')
        </div>

        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-info">
                                <h2>TK ABA Ngabean</h2>
                                <p>
                                    Desa Ngabean, Triharjo, Pandak, Bantul, D.I.Y<br>
                                    <strong>Phone:</strong>11111-1111<br>
                                    <strong>Whatsapp:</strong>11111111<br>
                                    <strong>Email:</strong>tkabangaben@gmail.com<br>
                                </p>
                                <div class="social-links mt-3">
                                    
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
                                <li><i class="bx bx-chevron-right"></i> <a href="/ekstrakulikuler">Ekstrakulikuler</a>
                                </li>
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

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            function copyToClipboard() {
                navigator.clipboard.writeText("{{ request()->fullUrl() }}")
                    .then(() => {
                        let copyMessage = document.getElementById("copyMessage");
                        copyMessage.classList.remove("d-none"); // Tampilkan pesan

                        // Sembunyikan kembali setelah 2 detik
                        setTimeout(() => {
                            copyMessage.classList.add("d-none");
                        }, 2000);
                    })
                    .catch(err => console.error("Gagal menyalin link", err));
            }
        </script>

        @stack('scripts')
    </body>

</html>
