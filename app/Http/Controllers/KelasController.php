<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        // Mengambil semua data kelas
        $data = Kelas::all();
        return view('contents.admin.kelas.index', compact('data'));
    }

    public function create()
    {
        return view('contents.admin.kelas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun_ajar' => 'required|string|max:255',
            'class_name' => 'required|string|max:255',
            'pria' => 'required|integer',
            'wanita' => 'required|integer',
            'homeroom_teacher' => 'required|string|max:255',
        ]);

        // Menghitung total berdasarkan jumlah pria dan wanita
        $total = $request->pria + $request->wanita;

        // Menambahkan data kelas baru
        Kelas::create([
            'tahun_ajar' => $request->tahun_ajar,
            'class_name' => $request->class_name,
            'pria' => $request->pria,
            'wanita' => $request->wanita,
            'total' => $total,  // Total dihitung di sini
            'homeroom_teacher' => $request->homeroom_teacher,
        ]);

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan.');
    }


    public function edit(Kelas $kela)
    {
        return view('contents.admin.kelas.edit', compact('kela'));
    }

    public function update(Request $request, Kelas $kela)
    {
        $request->validate([
            'tahun_ajar' => 'required|string|max:255',
            'class_name' => 'required|string|max:255',
            'pria' => 'required|integer',
            'wanita' => 'required|integer',
            'homeroom_teacher' => 'required|string|max:255',
        ]);

        // Menghitung total berdasarkan jumlah pria dan wanita
        $total = $request->pria + $request->wanita;

        // Melakukan update data kelas
        $kela->update([
            'tahun_ajar' => $request->tahun_ajar,
            'class_name' => $request->class_name,
            'pria' => $request->pria,
            'wanita' => $request->wanita,
            'total' => $total,  // Total dihitung di sini
            'homeroom_teacher' => $request->homeroom_teacher,
        ]);

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil diupdate.');
    }


    public function destroy(Kelas $kela)
    {
        // Menghapus data kelas
        $kela->delete();

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil dihapus.');
    }
}
