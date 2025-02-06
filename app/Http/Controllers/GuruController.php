<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    /**
     * Menampilkan daftar guru.
     */
    public function index()
    {
        // Mengambil semua data guru dari database
        $data = Guru::all();

        // Mengirimkan data guru ke view
        return view('contents.admin.guru.index', compact('data'));
    }

    /**
     * Menampilkan form untuk membuat data guru baru.
     */
    public function create()
    {
        // Menampilkan form untuk input data guru
        return view('contents.admin.guru.create');
    }

    /**
     * Menyimpan data guru baru.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'pfp_path' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',  // Path foto profil
            'name' => 'required|string|max:255',      // Nama guru
            'nuptk' => 'required|integer|unique:guru,nuptk',  // NUPTK harus unik
            'status' => 'required|in:GTT,GTY',       // Status GTT atau GTY
            'qualification' => 'required|string|max:255',  // Kualifikasi pendidikan
        ]);

        // Proses upload gambar
        if ($request->hasFile('pfp_path')) {
            // Ambil file gambar
            $image = $request->file('pfp_path');

            // Generate nama file baru dengan ekstensi
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Simpan gambar ke folder 'uploads/guru'
            $image->storeAs('public/guru', $imageName);
            $imagePath = "storage/guru/" . $imageName;
        } else {
            $imagePath = 'img/avatar.jpg';
        }

        // Menyimpan data guru ke dalam tabel guru
        Guru::create([
            'pfp_path' => $imagePath,  // Menyimpan path gambar
            'name' => $request->name,
            'nuptk' => $request->nuptk,
            'status' => $request->status,
            'qualification' => $request->qualification,
        ]);

        return redirect()->route('guru.index')->with('success', 'Guru berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit data guru.
     */
    public function edit(Guru $guru)
    {
        // Menampilkan form untuk mengedit data guru
        return view('contents.admin.guru.edit', compact('guru'));
    }

    /**
     * Mengupdate data guru.
     */
    public function update(Request $request, Guru $guru)
    {
        // Validasi input dari form
        $request->validate([
            'pfp_path' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',  // Path foto profil
            'name' => 'required|string|max:255',      // Nama guru
            'nuptk' => 'required|integer|unique:guru,nuptk,' . $guru->id,  // Validasi unik pada NUPTK
            'status' => 'required|in:GTT,GTY',       // Status GTT atau GTY
            'qualification' => 'required|string|max:255',  // Kualifikasi pendidikan
        ]);

        // Proses upload gambar jika ada gambar baru
        if ($request->hasFile('pfp_path')) {
            // Hapus gambar lama jika ada
            if ($guru->pfp_path != 'img/avatar.jpg' && file_exists(public_path($guru->pfp_path))) {
                unlink(public_path( $guru->pfp_path));
            }

            // Ambil file gambar
            $image = $request->file('pfp_path');

            // Generate nama file baru dengan ekstensi
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Simpan gambar ke folder 'uploads/guru'
            $image->storeAs('public/guru', $imageName);
            $imagePath = "storage/guru/" . $imageName;
        } else {
            // Jika tidak ada gambar baru, gunakan gambar lama
            $imagePath = $guru->pfp_path;
        }

        // Mengupdate data guru
        $guru->update([
            'pfp_path' => $imagePath,  // Menyimpan path gambar baru atau lama
            'name' => $request->name,
            'nuptk' => $request->nuptk,
            'status' => $request->status,
            'qualification' => $request->qualification,
        ]);

        // Redirect ke halaman daftar guru dengan pesan sukses
        return redirect()->route('guru.index')->with('success', 'Guru berhasil diupdate.');
    }


    /**
     * Menghapus data guru.
     */
    public function destroy(Guru $guru)
    {
        // Hapus foto profil jika ada dan bukan gambar default
        if ($guru->pfp_path != 'img/avatar.jpg' && file_exists(public_path($guru->pfp_path))) {
            unlink(public_path($guru->pfp_path));
        }

        // Menghapus data guru
        $guru->delete();

        // Redirect ke halaman daftar guru dengan pesan sukses
        return redirect()->route('guru.index')->with('success', 'Guru berhasil dihapus.');
    }
}