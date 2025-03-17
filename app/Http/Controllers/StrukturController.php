<?php

namespace App\Http\Controllers;

use App\Models\struktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StrukturController extends Controller
{
    public function index()
    {
        $data = struktur::all()->first();;
        return view('contents.admin.struktur.index', compact('data'));
    }

    public function update(Request $request, struktur $struktur)
    {
        $request->validate([
            'image_path' => 'nullable|image|mimes:jpeg,jpg,png|max:5120'
        ]);

        if ($request->hasFile('image_path')) {
            File::delete(public_path($struktur->image_path));

            $image = $request->file('image_path');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('struktur'), $imageName);
            $imagePath = "struktur/" . $imageName;
        } else {
            $imagePath = $struktur->image_path;
        }

        $struktur->update([
            'image_path' => $imagePath,
        ]);

        return redirect()->route('struktur.index')->with('success', 'link_form_pendaftaran berhasil diupdate.');
    }
}