<?php

namespace App\Http\Controllers;

use App\Models\form_pendaftaran;
use Illuminate\Http\Request;

class FormPendaftaranController extends Controller
{
    public function index()
    {
        $data = form_pendaftaran::all();
        return view('contents.admin.link_form_pendaftaran.index', compact('data'));
    }

    public function edit(form_pendaftaran $link_form_pendaftaran){
        return view('contents.admin.link_form_pendaftaran.edit', compact('link_form_pendaftaran'));
    }
    
    public function update(Request $request, form_pendaftaran $link_form_pendaftaran)
    {
        $request->validate([
            'link_form' => 'required|string|max:255'
        ]);

        $link_form_pendaftaran->update($request->all());

        return redirect()->route('link_form_pendaftaran.index')->with('success', 'link_form_pendaftaran berhasil diupdate.');
    }
}