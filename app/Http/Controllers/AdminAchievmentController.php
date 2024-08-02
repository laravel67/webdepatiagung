<?php

namespace App\Http\Controllers;

use App\Models\Achievment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminAchievmentController extends Controller
{
    public function __construct()
    {
        return view()->share('title', 'Kelola Pencapaian/Prestasi/Penghargaan');
    }
    
    public function index()
    {
        return view('dashboard.achievments.index');
    }

    public function create()
    {
        return view('dashboard.achievments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:achievments,slug',
            'category' => 'required',
            'body' => 'required|string',
            'image' => 'file|image|max:1024',
        ]);
        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('achievment-images');
        }
        Achievment::create($validated);
        return redirect(route('prestasi.index'))->with('success', 'Achievment has been saved!');
    }

    public function show(Achievment $achievment)
    {
        return view('dashboard.achievments.show', compact('achievment'));
    }

    public function edit(Achievment $achievment)
    {
        return view('dashboard.achievments.edit', compact('achievment'));
    }

    public function update(Request $request, Achievment $achievment)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'category' => 'required',
            'body' => 'required|string',
            'image' => 'file|image|max:1024',
        ];
        if ($request->slug != $achievment->slug) {
            $rules['slug'] = 'required|string|unique:achievments,slug';
        }
        $validated = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validated['image'] = $request->file('image')->store('achievment-images');
        }
        Achievment::where('id', $achievment->id)->update($validated);
        return redirect(route('prestasi.index'))->with('success', 'Achievment has been updated');
    }
    
    public function slug(Request $request)
    {
        $slug = SlugService::createSlug(Achievment::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
