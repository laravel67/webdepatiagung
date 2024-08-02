<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jabatan;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminGuruController extends Controller
{
    public function __construct()
    {
        return view()->share('title', 'Data Guru');
    }

    public function index()
    {
        return view('dashboard.teachers.index');
    }

    public function create()
    {
        $mapels = Mapel::all();
        $jabatans = Jabatan::all();
        return view('dashboard.teachers.create', compact('mapels', 'jabatans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:gurus,slug|max:255',
            'pendidikan' => 'required|string|max:255',
            'mulai_mengajar' => 'required|date',
            'mapel_id' => 'required|array',
            'mapel_id.*' => 'integer',
            'jabatan_id' => 'required|array',
            'jabatan_id.*' => 'integer',
            'deskripsi' => 'required',
            'image' => 'nullable|image|max:1024|file',
        ]);
        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('guru-images');
        }
        $guru = Guru::create([
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'pendidikan' => $validated['pendidikan'],
            'mulai_mengajar' => $validated['mulai_mengajar'],
            'deskripsi' => $validated['deskripsi'],
            'image' => $validated['image'] ?? null,
        ]);
        $guru->mapels()->attach($validated['mapel_id']);
        $guru->jabatans()->attach($validated['jabatan_id']);
        return redirect(route('guru.index'))->with('success', 'Data guru berhasil ditambah!');
    }

    public function show(Guru $guru)
    {
        return view('dashboard.teachers.show', compact('guru'));
    }

    public function edit(Guru $guru)
    {
        $mapels = Mapel::all();
        $jabatans = Jabatan::all();
        return view('dashboard.teachers.edit', compact('mapels', 'guru', 'jabatans'));
    }

    public function update(Request $request, Guru $guru)
    {
        // Atur aturan validasi berdasarkan kondisi
        $rules = [
            'name' => 'required|string|max:255',
            'pendidikan' => 'required|string|max:255',
            'mulai_mengajar' => 'required|date',
            'mapel_id' => 'required|array',
            'mapel_id.*' => 'integer',
            'jabatan_id' => 'required|array',
            'jabatan_id.*' => 'integer',
            'deskripsi' => 'required',
            'image' => 'nullable|image|max:1024|file',
        ];

        // Jika ada perubahan pada slug, tambahkan aturan validasi unik
        if ($request->slug != $guru->slug) {
            $rules['slug'] = 'required|string|unique:gurus,slug|max:255';
        }
        $validated = $request->validate($rules);
        if ($request->file('image')) {
            if ($guru->image) {
                Storage::delete($guru->image);
            }
            $validated['image'] = $request->file('image')->store('guru-images');
        }
        $guru->update([
            'name' => $validated['name'],
            'slug' => $validated['slug'] ?? $guru->slug, // Pastikan slug tetap sama jika tidak berubah
            'pendidikan' => $validated['pendidikan'],
            'mulai_mengajar' => $validated['mulai_mengajar'],
            'deskripsi' => $validated['deskripsi'],
            'image' => $validated['image'] ?? $guru->image, // Pastikan gambar tetap sama jika tidak ada perubahan
        ]);
        $guru->mapels()->sync($validated['mapel_id']);
        $guru->jabatans()->sync($validated['jabatan_id']);
        return redirect(route('guru.index'))->with('success', 'Data guru berhasil diubah!');
    }

    // public function destroy(Guru $guru)
    // {
    //     if ($guru->image) {
    //         Storage::delete($guru->image);
    //     }
    //     Guru::destroy($guru->id);
    //     return back()->with('success', 'Sarana Prasarna has been deleted');
    // }

    public function slug(Request $request)
    {
        $slug = SlugService::createSlug(Mapel::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
