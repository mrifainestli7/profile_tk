<?php

namespace App\Http\Controllers;

use App\Models\berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        $data = Berita::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('judul', 'like', "%{$query}%");
        })->latest()->paginate(10);

        return view('contents.admin.berita.index', compact('data'));
    }

    public function create()
    {
        return view('contents.admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cover' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'judul' => 'required|string|max:255|unique:beritas,judul',
            'tanggal' => 'required|date',
            'konten' => 'required|string',
        ]);

        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            // Simpan gambar ke folder "foto_berita" di dalam folder public
            $image->move(public_path('foto_berita'), $imageName);
            $imagePath = "foto_berita/" . $imageName;
        } else {
            $imagePath = 'img/default_cover_berita.jpg';
        }

        Berita::create([
            'cover' => $imagePath,
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'tanggal' => $request->tanggal,
            'konten' => $request->konten,
            'views' => 0,
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->increment('views');

        return view('contents.berita.detail_berita', compact('berita'));
    }

    public function edit($id)
    {
        $beritum = Berita::findOrFail($id);
        return view('contents.admin.berita.edit', compact('beritum'));
    }

    public function update(Request $request, $id)
    {
        $beritum = Berita::findOrFail($id);

        $request->validate([
            'cover' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'judul' => 'required|string|max:255|unique:beritas,judul,' . $beritum->id,
            'tanggal' => 'required|date',
            'konten' => 'required|string',
        ]);

        if ($request->hasFile('cover')) {
            // Hapus gambar lama jika ada dan bukan default
            if ($beritum->cover !== 'img/default_cover_berita.jpg' && File::exists(public_path($beritum->cover))) {
                File::delete(public_path($beritum->cover));
            }

            $image = $request->file('cover');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            // Simpan gambar ke folder "foto_berita"
            $image->move(public_path('foto_berita'), $imageName);
            $imagePath = "foto_berita/" . $imageName;
        } else {
            $imagePath = $beritum->cover;
        }

        $beritum->update([
            'cover' => $imagePath,
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'konten' => $request->konten,
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $beritum = Berita::findOrFail($id);

        if ($beritum->cover && $beritum->cover !== 'img/default_cover_berita.jpg' && File::exists(public_path($beritum->cover))) {
            File::delete(public_path($beritum->cover));
        }

        $beritum->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}