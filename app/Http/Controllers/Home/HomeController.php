<?php

namespace App\Http\Controllers\Home;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\Sambutan;
use App\Models\Slide;

class HomeController extends Controller
{
    public function home()
    {
        view()->share('title', 'Beranda');
        $title = 'Beranda';
        $posts = Post::orderBy('id', 'desc')->take(6)->get();
        $sambutan = Sambutan::latest()->first();
        $galeri = Galeri::orderBy('id', 'desc')->take(5)->get();
        $slides = Slide::orderBy('id', 'desc')->take(5)->get();
        return view('home.index', compact('posts', 'sambutan', 'galeri', 'slides'));
    }
}
