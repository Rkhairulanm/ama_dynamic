<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Mitra;
use App\Models\Artikel;
use App\Models\Content;
use App\Models\Gallery;
use App\Models\Aktifitas;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewController extends Controller
{
    public function beranda()
    {
        $contentTypes = [
            'heroTitle' => 'Hero Title',
            'heroDescription' => 'Hero Description',
            'houseCardTitle' => 'House Card Title',
            'houseCardDescription' => 'House Card Description',
            'lightBlubCardTitle' => 'LightBlub Card Title',
            'lightBlubCardDescription' => 'LightBlub Card Description',
            'gearsCardTitle' => 'Gears Card Title',
            'gearsCardDescription' => 'Gears Card Description'
        ];

        $acara = Acara::take(4)->get();
        $testimoni = Testimoni::take(5)->get();
        $mitra = Mitra::take(12)->get();

        $contents = [];
        foreach ($contentTypes as $key => $type) {
            $contents[$key] = Content::where('type', $type)->first();
        }

        $title = 'Beranda';
        return view('pages.beranda', compact('title', 'contents', 'acara', 'testimoni', 'mitra'));
    }


    public function tentang()
    {
        $contentTypes = [
            'tentang' => 'Tentang',
            'visi' => 'Visi',
            'misi' => 'Misi'
        ];

        $contents = [];
        foreach ($contentTypes as $key => $type) {
            $contents[$key] = Content::where('type', $type)->first();
        }

        $title = 'Tentang';
        return view('pages.tentang', compact('title', 'contents'));
    }

    public function aktifitas()
    {
        $aktifitas = Aktifitas::orderByDesc('created_at')->take(5)->get();
        $title = 'Aktifitas';
        return view('pages.aktifitas', compact('title', 'aktifitas'));
    }
    public function artikel()
    {
        $artikel = Artikel::where('published', true)->orderByDesc('created_at')->paginate(12);
        $title = 'Artikel';
        return view('pages.artikel', compact('title', 'artikel'));
    }
    public function artikeldetail($id)
    {
        try {
            $artikel = Artikel::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            abort(404, 'Artikel tidak ditemukan.');
        }

        $title = 'Artikel Detail';
        return view('pages.artikel-detail', compact('title', 'artikel'));
    }

    public function acara()
    {
        $acara = Acara::where('ongoing', true)->get();
        $title = 'Acara';
        return view('pages.acara', compact('title', 'acara'));
    }
    public function oldacara()
    {
        $acara = Acara::where('ongoing', false)->paginate(6);
        $title = 'Acara Sebelumnya';
        return view('pages.acara-sebelumnya', compact('title', 'acara'));
    }
    public function acaradetail($id)
    {
        $acara = Acara::find($id);

        if (!$acara) {
            abort(404); // This will throw a 404 error if event is not found
        }

        $title = 'Acara Detail';
        return view('pages.acara-detail', compact('title', 'acara'));
    }

    public function gallery()
    {
        $gallery = Gallery::orderByDesc('created_at')->get();


        $title = 'Gallery';
        return view('pages.gallery', compact('title', 'gallery'));
    }
    public function testimoni()
    {
        $testimoni = Testimoni::take(12)->get();
        $title = 'Testimoni';
        return view('pages.testimoni', compact('title', 'testimoni'));
    }
    public function kontak()
    {
        $contentTypes = [
            'location' => 'Location',
            'email' => 'Email',
            'phone' => 'Phone'
        ];

        $contents = [];
        foreach ($contentTypes as $key => $type) {
            $contents[$key] = Content::where('type', $type)->first();
        }

        $title = 'Kontak';
        return view('pages.kontak', compact('title', 'contents'));
    }
}
