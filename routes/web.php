<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\FormPendaftaranController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrestasiController;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Rute utama untuk guest dan admin.
|
*/

Route::get('/', [GuestController::class, 'index']);
Route::get('/detail_TK', [GuestController::class, 'detail']);
Route::get('/prestasi', [GuestController::class, 'prestasi']);
Route::get('/fasilitas', [GuestController::class, 'fasilitas']);
Route::get('/mata_pelajaran', [GuestController::class, 'mapel']);
Route::get('/struktur_TK', [GuestController::class, 'struktur']);
Route::get('/visi_misi', [GuestController::class, 'visi_misi']);
Route::get('/sejarah', [GuestController::class, 'sejarah']);
Route::get('/galeri', [GuestController::class, 'galeri']);
Route::get('/daftar_guru', [GuestController::class, 'daftar_guru']);
Route::get('/daftar_kelas', [GuestController::class, 'daftar_kelas']);
Route::get('/alamat', [GuestController::class, 'alamat']);

/*
|--------------------------------------------------------------------------
| Route Berita untuk Pengunjung (Guest)
|--------------------------------------------------------------------------
| Berita dapat diakses oleh pengunjung umum
*/
Route::get('/berita', [NewsController::class, 'index'])->name('berita.index');
Route::get('/berita/cari', [NewsController::class, 'search'])->name('berita.cari');
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('berita.tampil'); // Pakai slug

/*
|--------------------------------------------------------------------------
| Route untuk Login & Logout
|--------------------------------------------------------------------------
*/
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [SesiController::class, 'index'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);
});

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/logout', [SesiController::class, 'logout']);

    Route::prefix('admin')->group(function () {
        Route::resource('prestasi', PrestasiController::class);
        Route::resource('mapel', MapelController::class);
        Route::resource('guru', GuruController::class);
        Route::resource('kelas', KelasController::class);
        Route::resource('link_form_pendaftaran', FormPendaftaranController::class);

        // Route Berita untuk Admin
        Route::resource('berita', BeritaController::class)->parameters([
            'berita' => 'slug' // Gunakan slug, bukan ID
        ]);

        Route::resource('galeri', GaleriController::class);
    });
});