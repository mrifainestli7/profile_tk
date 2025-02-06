<?php

namespace App\Http\Controllers;

use App\Models\berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        // Mengambil semua data berita dari database
        $data = Berita::all();
        return view('contents.admin.berita.index', compact('data'));
    }

    public function create()
    {
        return view('contents.admin.berita.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'cover' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'konten' => 'required|string',
        ]);

        // Upload gambar jika ada
        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/berita', $imageName);
            $imagePath = "storage/berita/" . $imageName;
        } else {
            $imagePath = 'img/default_cover_berita.jpg';
        }

        // Simpan berita ke database
        Berita::create([
            'cover' => $imagePath,
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'konten' => $request->konten,
            'views' => 0, // Default views adalah 0
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(Berita $beritum)
    {
        return view('contents.admin.berita.edit', compact('beritum'));
    }

    public function update(Request $request, Berita $beritum)
    {
        // Validasi input
        $request->validate([
            'cover' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'konten' => 'required|string',
        ]);

        // Proses upload gambar jika ada
        if ($request->hasFile('cover')) {
            // Hapus gambar lama jika ada dan bukan gambar default
            if ($beritum->cover != 'img/default_cover_berita.jpg' && file_exists(public_path($beritum->cover))) {
                unlink(public_path($beritum->cover));
            }

            // Upload gambar baru
            $image = $request->file('cover');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/berita', $imageName);
            $imagePath = "storage/berita/" . $imageName;
        } else {
            $imagePath = $beritum->cover;
        }

        // Update data berita
        $beritum->update([
            'cover' => $imagePath,
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'konten' => $request->konten,
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $beritum)
    {
        // Hapus gambar jika bukan default
        if ($beritum->cover && $beritum->cover !== 'img/default_cover_berita.jpg' && file_exists(public_path($beritum->cover))) {
            unlink(public_path($beritum->cover));
        }

        // Hapus berita dari database
        $beritum->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}