<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $beritas = Berita::orderBy('created_at', 'desc')->paginate(4);
        $beritaTerpopuler = Berita::orderBy('views', 'desc')->take(5)->get();

        $beritas->each(function ($berita) {
            $berita->konten = $this->extractParagraphs($berita->konten);
        });

        return view('contents.berita.index', compact('beritas', 'beritaTerpopuler'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('q');
        $beritas = Berita::where('judul', 'like', '%' . $keyword . '%')
            ->orWhereRaw("LOWER(REPLACE(konten, '<p>', '')) LIKE ?", ['%' . strtolower($keyword) . '%'])
            ->orderBy('created_at', 'desc')
        ->paginate(4);

        $beritaTerpopuler = Berita::orderBy('views', 'desc')->take(5)->get();

        return view('contents.berita.index', compact('beritas', 'beritaTerpopuler'))->with('keyword', $keyword);
    }


    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->increment('views');
        $beritaTerpopuler = Berita::orderBy('views', 'desc')->limit(5)->get();

        return view('contents.berita.detail_berita', compact('berita', 'beritaTerpopuler'));
    }

    private function extractParagraphs($htmlContent)
    {
        $dom = new \DOMDocument();
        @$dom->loadHTML($htmlContent, LIBXML_NOERROR | LIBXML_NOWARNING); // Load HTML tanpa error
        $paragraphs = $dom->getElementsByTagName('p'); // Ambil semua tag <p>

        $result = '';
        foreach ($paragraphs as $p) {
            $result .= $dom->saveHTML($p); // Simpan isi tag <p> beserta struktur HTML-nya
        }

        return $result;
    }
}