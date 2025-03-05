<?php

namespace App\Http\Controllers;

use App\Models\mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Menampilkan daftar prestasi.
     */
    public function index()
    {
        $data = Mapel::all();
        return view('contents.admin.mapel.index', compact('data'));
    }

    /**
     * Menampilkan form untuk membuat data prestasi baru.
     */
    public function create()
    {
        return view('contents.admin.mapel.create');
    }

    /**
     * Menyimpan data prestasi baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mapel_name' => 'required|string|max:255',
            'mapel_desc' => 'required|string'
        ]);

        Mapel::create($request->all());

        return redirect()->route('mapel.index')->with('success', 'mapel berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit data prestasi.
     */
    public function edit(Mapel $mapel)
    {
        return view('contents.admin.mapel.edit', compact('mapel'));
    }

    /**
     * Mengupdate data prestasi.
     */
    public function update(Request $request, Mapel $mapel)
    {
        $request->validate([
            'mapel_name' => 'required|string|max:255',
            'mapel_desc' => 'required|string',
        ]);

        $mapel->update($request->all());

        return redirect()->route('mapel.index')->with('success', 'mapel berhasil diupdate.');
    }

    /**
     * Menghapus data prestasi.
     */
    public function destroy(Mapel $mapel)
    {
        $mapel->delete();

        return redirect()->route('mapel.index')->with('success', 'mapel berhasil dihapus.');
    }
}