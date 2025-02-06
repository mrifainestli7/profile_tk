<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Dashboard Template · Bootstrap v5.2</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/admin/custom.css') }}">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">



    <!-- Custom styles for this template -->
    <link href="{{ asset('css/admin/dashboard.css') }}" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="/admin/home">TK ABA NGABEAN</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="/logout">Log-out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            @include('layouts/admin_sidebar')

            {{-- content --}}
            @yield('content')

            {{-- footer --}}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/admin/dashboard.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.6.0/tinymce.min.js"
        integrity="sha512-/4EpSbZW47rO/cUIb0AMRs/xWwE8pyOLf8eiDWQ6sQash5RP1Cl8Zi2aqa4QEufjeqnzTK8CLZWX7J5ZjLcc1Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.6.0/plugins/link/plugin.min.js"
        integrity="sha512-sMFDNYCMpqGBUWCt0SOovesJ7xTAqkyAgg9KnWAuGngIFAyXokQbwAwkMs3QW7hsdfwwL6UTjIXOvK0bs7EnEA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.6.0/plugins/lists/plugin.min.js"
        integrity="sha512-qV/NTx0sdX2s8kcKZaPJNtHH+RsDCcLNGkrOEZiLJE/f8gOMTjGhh9tlsqA1bA3aCQInhh3oIeTOlYHYHJDXQw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.6.0/plugins/advlist/plugin.min.js"
        integrity="sha512-4jcq+QDTbClCnEcG9Tf9/aUOjse9o5DLyWRzNmKjFsmqlcf9AGITvWfS43M2IPF0e9Ni2LbfJmyKQJilOsWwIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.6.0/plugins/table/plugin.min.js"
        integrity="sha512-0m5fpLMylVt70kllkOBx2cYgQfdNxjGMEmJX9DUMsSkmoFJabSFOnYwHMuCImB1zDjVgGHdgmZHxlm15EciCmA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            tinymce.init({
                selector: 'textarea#konten, textarea#mapel_desc', 
                promotion: false,
                plugins: ['link', 'lists', 'advlist', 'table'],
                toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | numlist bullist | outdent indent | link table',
                setup: function (editor) {
                    // Mencegah drag & drop file ke dalam editor
                    editor.on('dragover drop', function (e) {
                        e.preventDefault(); // Mencegah default action drag & drop
                        e.stopPropagation(); // Mencegah propagasi event
                    });
                }
            });
        </script>        
</body>

</html>
