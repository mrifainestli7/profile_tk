<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\form_pendaftaran;
use App\Models\galeri;
use App\Models\guru;
use App\Models\kelas;
use App\Models\mapel;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Prestasi;

class GuestController extends Controller
{
    function index() : View {
        $data = form_pendaftaran::all();

        $beritas = Berita::orderBy('tanggal', 'desc')->take(3)->get();

        $beritas->each(function ($berita) {
            $berita->konten = $this->extractParagraphs($berita->konten);
        });

        return view('contents.guest.index', compact('data','beritas'));
    }

    function detail() : View {
        return view('contents.guest.detailTK');
    }

    function prestasi() : View {
        $data = Prestasi::all();
        return view('contents.guest.prestasi', compact('data'));
    }

    function fasilitas() : View {
        return view('contents.guest.fasilitas');
    }

    function mapel() : View {
        $data = Mapel::all();
        return view('contents.guest.mapel', compact('data'));
    }

    function struktur() : View {
        return view('contents.guest.struktur');
    }

    function visi_misi() : View {
        return view('contents.guest.visi_misi');
    }

    function sejarah() : View {
        return view('contents.guest.sejarah');
    }

    function daftar_guru() : View {
        $data = Guru::all();
        return view('contents.guest.daftar_guru', compact('data'));
    }

    function daftar_kelas() : View {
        $data = Kelas::all();
        return view('contents.guest.daftar_kelas', compact('data'));
    }

    function galeri() : View {
        $galeri = Galeri::all();
        return view('contents.guest.galeri', compact('galeri'));
    }

    function alamat() : View {
        return view('contents.guest.alamat');
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