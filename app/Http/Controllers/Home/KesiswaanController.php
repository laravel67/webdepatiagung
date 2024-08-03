<?php

namespace App\Http\Controllers\Home;

use App\Models\Galeri;
use App\Http\Controllers\Controller;
use App\Models\Lifeskill;
use App\Models\Persada;

class KesiswaanController extends Controller
{
    public function lifeskill()
    {
        view()->share('title', 'Ekstra Kulikuler');
        $fisik = Lifeskill::where('category', 'fisik')->orderBy('id', 'desc')->get();
        $nonfisik = Lifeskill::where('category', 'nonfisik')->orderBy('id', 'desc')->get();
        return view('home.kesiswaan.lifeskill', compact('fisik', 'nonfisik'));
    }

    public function persada()
    {
        $pa = Persada::where('category', 'PA')->latest()->first();
        $pi = Persada::where('category', 'PI')->latest()->first();
        if (!$pa && !$pi) {
            $priode = 'N/A'; // Or any default value you want
        } else {
            $priode = $pa->priode ?? $pi->priode;
        }
        view()->share('title', 'Struktur Organisasi Santri Depati Agung ' . $priode);
        return view('home.kesiswaan.persada', compact('pa', 'pi'));
    }

    public function album()
    {
        view()->share('title', 'Album Foto');
        $posts = Galeri::orderBy('id', 'desc')->paginate(12);
        return view('home.kesiswaan.galery', compact('posts'));
    }
}
