<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Sarana;
use Illuminate\Http\Request;

class AkademikController extends Controller
{
    public function kurikulum()
    {
        view()->share('title', 'Kurikulum');
        return view('home.akademik.kurikulum');
    }

    public function sarana()
    {
        view()->share('title', 'Sarana Prasarana Pembelaran');
        $saranas = Sarana::orderBy('id', 'desc')->get();
        return view('home.akademik.sarana-prasarana', [
            'saranas' => $saranas
        ]);
    }

    public function biografi()
    {
        view()->share('title', 'Biografi Tenaga Pengajar');
        $gurus = Guru::orderBy('id', 'desc')->get();
        return view('home.akademik.biografi', [
            'gurus' => $gurus
        ]);
    }
}
