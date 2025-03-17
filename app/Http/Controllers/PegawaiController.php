<?php

namespace App\Http\Controllers;

use App\Models\pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        $data = pegawai::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('name', 'like', "%{$query}%")
                                ->orWhere('task', 'like', "%{$query}%")
                                ->orWhere('status', 'like', "%{$query}%");
        })->latest()->paginate(10);
        
        return view('contents.admin.pegawai.index', compact('data'));
    }

    public function create()
    {
        return view('contents.admin.pegawai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pfp_path' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'name' => 'required|string|max:255',
            'task' => 'required|string|max:255',
            'status' => 'required|in:PTT,PTY',
            'qualification' => 'required|string|max:255',
        ]);

        if ($request->hasFile('pfp_path')) {
            $image = $request->file('pfp_path');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('pegawai'), $imageName);
            $imagePath = "pegawai/" . $imageName;
        } else {
            $imagePath = 'img/avatar.jpg';
        }

        pegawai::create([
            'pfp_path' => $imagePath,
            'name' => $request->name,
            'task' => $request->task,
            'status' => $request->status,
            'qualification' => $request->qualification,
        ]);

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan.');
    }

    public function edit(Pegawai $pegawai)
    {
        return view('contents.admin.pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'pfp_path' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'name' => 'required|string|max:255',
            'task' => 'required|string|max:255',
            'status' => 'required|in:PTT,PTY',
            'qualification' => 'required|string|max:255',
        ]);

        if ($request->hasFile('pfp_path')) {
            if ($pegawai->pfp_path != 'img/avatar.jpg' && File::exists(public_path($pegawai->pfp_path))) {
                File::delete(public_path($pegawai->pfp_path));
            }

            $image = $request->file('pfp_path');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('pegawai'), $imageName);
            $imagePath = "pegawai/" . $imageName;
        } else {
            $imagePath = $pegawai->pfp_path;
        }

        $pegawai->update([
            'pfp_path' => $imagePath,
            'name' => $request->name,
            'task' => $request->task,
            'status' => $request->status,
            'qualification' => $request->qualification,
        ]);

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil diperbarui.');
    }

    public function destroy(Pegawai $pegawai)
    {
        if ($pegawai->pfp_path != 'img/avatar.jpg' && File::exists(public_path($pegawai->pfp_path))) {
            File::delete(public_path($pegawai->pfp_path));
        }

        $pegawai->delete();

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus.');
    }
}