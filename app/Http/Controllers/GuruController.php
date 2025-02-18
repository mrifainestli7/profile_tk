<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        $data = Guru::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('nuptk', 'like', "%{$query}%")
                                ->orWhere('name', 'like', "%{$query}%")
                                ->orWhere('status', 'like', "%{$query}%");
        })->latest()->paginate(10);
        
        return view('contents.admin.guru.index', compact('data'));
    }

    public function create()
    {
        return view('contents.admin.guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pfp_path' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'name' => 'required|string|max:255',
            'nuptk' => 'required|integer|unique:guru,nuptk',
            'status' => 'required|in:GTT,GTY',
            'qualification' => 'required|string|max:255',
        ]);

        if ($request->hasFile('pfp_path')) {
            $image = $request->file('pfp_path');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('guru'), $imageName);
            $imagePath = "guru/" . $imageName;
        } else {
            $imagePath = 'img/avatar.jpg';
        }

        Guru::create([
            'pfp_path' => $imagePath,
            'name' => $request->name,
            'nuptk' => $request->nuptk,
            'status' => $request->status,
            'qualification' => $request->qualification,
        ]);

        return redirect()->route('guru.index')->with('success', 'Guru berhasil ditambahkan.');
    }

    public function edit(Guru $guru)
    {
        return view('contents.admin.guru.edit', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'pfp_path' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'name' => 'required|string|max:255',
            'nuptk' => 'required|integer|unique:guru,nuptk,' . $guru->id,
            'status' => 'required|in:GTT,GTY',
            'qualification' => 'required|string|max:255',
        ]);

        if ($request->hasFile('pfp_path')) {
            if ($guru->pfp_path != 'img/avatar.jpg' && File::exists(public_path($guru->pfp_path))) {
                File::delete(public_path($guru->pfp_path));
            }

            $image = $request->file('pfp_path');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('guru'), $imageName);
            $imagePath = "guru/" . $imageName;
        } else {
            $imagePath = $guru->pfp_path;
        }

        $guru->update([
            'pfp_path' => $imagePath,
            'name' => $request->name,
            'nuptk' => $request->nuptk,
            'status' => $request->status,
            'qualification' => $request->qualification,
        ]);

        return redirect()->route('guru.index')->with('success', 'Guru berhasil diperbarui.');
    }

    public function destroy(Guru $guru)
    {
        if ($guru->pfp_path != 'img/avatar.jpg' && File::exists(public_path($guru->pfp_path))) {
            File::delete(public_path($guru->pfp_path));
        }

        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Guru berhasil dihapus.');
    }
}