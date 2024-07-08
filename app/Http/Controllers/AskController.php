<?php

namespace App\Http\Controllers;

use App\Models\Berlangganan;
use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AskController extends Controller
{
    public function kontak(Request $request)
    {
        $data = $request->all();
        $kontak = Kontak::create($data);
        if ($kontak) {
            // Jika penyimpanan berhasil
            Session::flash('status', 'success');
            Session::flash('message', 'Email Berhasil Di Kirim.');
        } else {
            // Jika penyimpanan gagal
            Session::flash('status', 'error');
            Session::flash('message', 'Gagal mengirim Email.');
        }

        return redirect('/kontak');
    }
    public function subs(Request $request)
    {
        $data = $request->all();
        $subs = Berlangganan::create($data);
        if ($subs) {
            // Jika penyimpanan berhasil
            Session::flash('status', 'success');
            Session::flash('message', 'Permintaan Berhasil Dikirim, CS Kami Akan Menghubungimu Dalam 24 Jam.');
        } else {
            // Jika penyimpanan gagal
            Session::flash('status', 'error');
            Session::flash('message', 'Gagal mengirim Email.');
        }

        return redirect('/#footer');
    }
}
