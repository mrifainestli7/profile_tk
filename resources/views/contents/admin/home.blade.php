@extends('layouts.admin')

@section('content')
{{-- content --}}
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard Admin</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar" class="align-text-bottom"></span>
                This week
            </button>
        </div>
    </div>

    {{-- Sambutan Section --}}
    <section id="sambutan" class="mb-4">
        <h3>Selamat Datang di Halaman Admin</h3>
        <p>Halo Admin, selamat datang di halaman dashboard! Di sini Anda dapat mengelola data dan informasi yang ada di website. Gunakan navigasi di sisi kiri untuk menjelajahi fitur yang tersedia. Pastikan untuk memantau dan memperbarui informasi yang ada agar tetap relevan.</p>
    </section>

    
</main>
@endsection
