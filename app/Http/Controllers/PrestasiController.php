<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PrestasiController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        $data = Prestasi::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('kategori_lomba', 'like', "%{$query}%");
        })->latest()->paginate(10);

        return view('contents.admin.prestasi.index', compact('data'));
    }

    public function create()
    {
        return view('contents.admin.prestasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'prestasi' => 'required|string|max:255',
            'kategori_lomba' => 'required|string|max:255',
            'tingkat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'foto_prestasi' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
        ]);

        if ($request->hasFile('foto_prestasi')) {
            $image = $request->file('foto_prestasi');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('foto_prestasi'), $imageName);
            $imagePath = "foto_prestasi/" . $imageName;
        } else {
            $imagePath = 'img/default_prestasi.jpg';
        }

        Prestasi::create([
            'prestasi' => $request->prestasi,
            'kategori_lomba' => $request->kategori_lomba,
            'tingkat' => $request->tingkat,
            'tanggal' => $request->tanggal,
            'foto_prestasi' => $imagePath,
        ]);

        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil ditambahkan.');
    }

    public function edit(Prestasi $prestasi)
    {
        return view('contents.admin.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, Prestasi $prestasi)
    {
        $request->validate([
            'prestasi' => 'required|string|max:255',
            'kategori_lomba' => 'required|string|max:255',
            'tingkat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'foto_prestasi' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
        ]);

        if ($request->hasFile('foto_prestasi')) {
            if ($prestasi->foto_prestasi != 'img/default_prestasi.jpg' && File::exists(public_path($prestasi->foto_prestasi))) {
                File::delete(public_path($prestasi->foto_prestasi));
            }

            $image = $request->file('foto_prestasi');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('foto_prestasi'), $imageName);
            $imagePath = "foto_prestasi/" . $imageName;
        } else {
            $imagePath = $prestasi->foto_prestasi;
        }

        $prestasi->update([
            'prestasi' => $request->prestasi,
            'kategori_lomba' => $request->kategori_lomba,
            'tingkat' => $request->tingkat,
            'tanggal' => $request->tanggal,
            'foto_prestasi' => $imagePath,
        ]);

        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil diperbarui.');
    }

    public function destroy(Prestasi $prestasi)
    {
        if ($prestasi->foto_prestasi != 'img/default_prestasi.jpg' && File::exists(public_path($prestasi->foto_prestasi))) {
            File::delete(public_path($prestasi->foto_prestasi));
        }

        $prestasi->delete();

        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil dihapus.');
    }
}