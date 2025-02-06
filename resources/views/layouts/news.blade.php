<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Berita Terbaru')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        h3 {
            color: #f8f9fa;
        }

        .navbar {
            background-color: rgba(42, 127, 0);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 10;
        }

        .navbar-brand,
        .nav-link {
            color: white !important;
        }

        .card {
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .search-form {
            margin-bottom: 20px;
        }

        .search-input {
            width: 100%;
            max-width: 400px;
        }

        .pagination {
            justify-content: center;
        }

        .content {
            padding-top: 70px;
            /* Tinggi navbar */
        }

        .fixed-img {
            width: 100%;
            max-width: 750px;
            height: auto;
            object-fit: cover;
            display: block;
            margin: 0 auto;
        }
    </style>
    @stack('styles')
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
            <form class="form-inline mr-auto ml-2 my-1 search-form align-items-center" method="GET" action="{{ route('berita.cari') }}">
                <input 
                    class="form-control search-input mr-2" 
                    type="search" 
                    name="q" 
                    placeholder="Cari berita..." 
                    aria-label="Search" 
                    value="{{ request('q') ?? '' }}">
                <button class="btn btn-warning" type="submit">Cari</button>
            </form>
        </div>
    </nav>
    

    <div class="container content mt-4">
        @yield('content')
    </div>

    <footer class="bg-light text-center py-4">
        <p>&copy; 2023 Berita Terbaru. Semua hak dilindungi.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @stack('scripts')
</body>

</html>
