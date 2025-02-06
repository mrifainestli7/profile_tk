<?php

namespace App\Http\Controllers;

use App\Models\galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $data = Galeri::all();
        return view('contents.admin.galeri.index', compact('data'));
    }
    
    public function create()
    {
        return view('contents.admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto_path' => 'required|image|mimes:jpeg,jpg,png,webp|max:5120',  
            'foto_desc' => 'required|string|max:255',     
        ]);

        if ($request->hasFile('foto_path')) {
            $image = $request->file('foto_path');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->storeAs('public/galeri_foto', $imageName);
            $imagePath = "storage/galeri_foto/" . $imageName;
        } else {
            $imagePath = 'img/default_cover_berita.jpg';
        }

        Galeri::create([
            'foto_path' => $imagePath, 
            'foto_desc' => $request->foto_desc,
        ]);

        return redirect()->route('galeri.index')->with('success', 'galeri berhasil ditambahkan.');
    }

    public function edit(Galeri $galeri)
    {
        return view('contents.admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'foto_path' => 'image|mimes:jpeg,jpg,png,webp|max:5120',  
            'foto_desc' => 'required|string|max:255',     
        ]);

        if ($request->hasFile('foto_path')) {
            if ($galeri->foto_path != 'img/default_cover_berita.jpg' && file_exists(public_path($galeri->foto_path))) {
                unlink(public_path( $galeri->foto_path));
            }

            $image = $request->file('foto_path');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->storeAs('public/galeri_foto', $imageName);
            $imagePath = "storage/galeri_foto/" . $imageName;
        } else {
            $imagePath = $galeri->foto_path;
        }

        $galeri->update([
            'foto_path' => $imagePath, 
            'foto_desc' => $request->foto_desc,
        ]);

        // Redirect ke halaman daftar galeri dengan pesan sukses
        return redirect()->route('galeri.index')->with('success', 'galeri berhasil diupdate.');
    }
    
    public function destroy(Galeri $galeri)
    {
        // Hapus gambar jika bukan default
        if ($galeri->foto_path && $galeri->foto_path !== 'img/default_cover_berita.jpg' && file_exists(public_path($galeri->foto_path))) {
            unlink(public_path($galeri->foto_path));
        }

        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'galeri berhasil dihapus.');
    }
}