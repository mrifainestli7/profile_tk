<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    /**
     * Menampilkan daftar prestasi.
     */
    public function index()
    {
        $data = Prestasi::all();
        return view('contents.admin.prestasi.index', compact('data'));
    }

    /**
     * Menampilkan form untuk membuat data prestasi baru.
     */
    public function create()
    {
        return view('contents.admin.prestasi.create');
    }

    /**
     * Menyimpan data prestasi baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'prestasi' => 'required|string|max:255',
            'kategori_lomba' => 'required|string|max:255',
            'tingkat' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        Prestasi::create($request->all());

        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit data prestasi.
     */
    public function edit(Prestasi $prestasi)
    {
        return view('contents.admin.prestasi.edit', compact('prestasi'));
    }

    /**
     * Mengupdate data prestasi.
     */
    public function update(Request $request, Prestasi $prestasi)
    {
        $request->validate([
            'prestasi' => 'required|string|max:255',
            'kategori_lomba' => 'required|string|max:255',
            'tingkat' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        $prestasi->update($request->all());

        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil diupdate.');
    }

    /**
     * Menghapus data prestasi.
     */
    public function destroy(Prestasi $prestasi)
    {
        $prestasi->delete();

        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil dihapus.');
    }
}