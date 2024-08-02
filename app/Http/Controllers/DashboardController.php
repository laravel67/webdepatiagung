<?php

namespace App\Http\Controllers;

use App\Models\Taj;
use App\Models\Guru;
use App\Models\Post;
use App\Models\User;
use App\Models\Mapel;
use App\Models\Sarana;
use App\Models\Student;
use App\Models\Category;
use App\Models\Sambutan;
use App\Models\Achievment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'admin')
            ->orWhere('role', 'user')
            ->count();
        $userId = auth()->id();
        $postByUser = Post::where('user_id', $userId)->count();
        $posts = Post::count();
        $categoris = Category::count();
        $mapel = Mapel::count();
        $guru = Guru::count();
        $sarana = Sarana::count();
        $achievment = Achievment::count();
        $newestTa = Taj::latest('id')->first();
        $newestTaId = $newestTa ? $newestTa->id : null;

        if ($newestTaId) {
            $students = Student::where('ta_id', $newestTaId)->count();
        } else {
            $students = 0; // atau nilai default lain yang sesuai
        }
        $students = Student::where('ta_id', $newestTaId)->count();

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'users' => $users,
            'postByUser' => $postByUser,
            'posts' => $posts,
            'category' => $categoris,
            'mapel' => $mapel,
            'sarana' => $sarana,
            'guru' => $guru,
            'achievment' => $achievment,
            'student' => $students
        ]);
    }

    public function mapel()
    {
        view()->share('title', 'Kelola Mata Pelajaran');
        return view('dashboard.mapel');
    }

    public function struktur()
    {
        view()->share('title', 'Kelola Struktur Depati Agung');
        return view('dashboard.struktur');
    }

    public function bidang()
    {
        view()->share('title', 'Data Bidang');
        return view('dashboard.bidang');
    }

    public function jabatan()
    {
        view()->share('title', 'Data Jabatan');
        return view('dashboard.jabatan');
    }

    public function Persada()
    {
        view()->share('title', 'Data Persada Depati Agung');
        return view('dashboard.kesiswaan.persada');
    }

    public function lifeskill()
    {
        view()->share('title', 'Data Ekstra Kulikuler');
        return view('dashboard.kesiswaan.lifeskill');
    }

    public function setDaftar()
    {
        view()->share('title', 'Pengaturan Pendaftaran');
        return view('dashboard.settings.setting-register');
    }

    public function generalSetting()
    {
        view()->share('title', 'Pengaturan');
        $sambutan = Sambutan::first();
        return view('dashboard.settings.setting-general', compact('sambutan'));
    }

    public function sambutan(Request $request)
    {
        $dataValidated = $request->validate([
            'body' => 'required|string',
            'image' => 'nullable|image|max:1024',
        ]);
        $sambutan = Sambutan::first();

        if ($request->file('image')) {
            if ($sambutan && $sambutan->image) {
                Storage::delete($sambutan->image);
            }
            $dataValidated['image'] = $request->file('image')->store('sambutan');
        }
        $dataValidated['excerpt'] = Str::limit(strip_tags($dataValidated['body']), 200);

        if ($sambutan) {
            $sambutan->update($dataValidated);
        } else {
            Sambutan::create($dataValidated);
        }
        return redirect()->route('pengaturan')->with('success', 'Kata sambutan berhasil diperbarui!');
    }
}
