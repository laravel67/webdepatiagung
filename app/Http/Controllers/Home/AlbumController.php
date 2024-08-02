<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function album()
    {
        $posts = Galeri::orderBy('id', 'desc')->paginate(20);
        return view('home.arsip.galery', compact('title', 'posts'));
    }
    public function sambutan()
    {
        return view('home.arsip.sambutan', compact('title'));
    }
}
