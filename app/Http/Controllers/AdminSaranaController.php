<?php

namespace App\Http\Controllers;

use App\Models\Sarana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminSaranaController extends Controller
{

    public function __construct()
    {
        return view()->share('title', 'Kelola Sarana Prasarana');
    }
    public function index()
    {
        return view('dashboard.saranas.index');
    }

    public function create()
    {
        return view('dashboard.saranas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:saranas,slug',
            'body' => 'required',
            'image' => 'nullable|image|max:1024|file',
        ]);
        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('sp-images');
        }
        Sarana::create($validated);
        return redirect(route('asarana.index'))->with('success', 'Sarana Prasarana has been saved!');
    }

    public function show(Sarana $sarana)
    {
        return view('dashboard.saranas.show', compact('sarana'));
    }

    public function edit(Sarana $sarana)
    {
        return view('dashboard.saranas.edit', compact('sarana'));
    }

    public function update(Request $request, Sarana $sarana)
    {
        $rules = [
            'name' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|max:1024|file',
        ];
        if ($request->slug != $sarana->slug) {
            $rules['slug'] = 'required|unique:saranas,slug';
        }
        $validated = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validated['image'] = $request->file('image')->store('sp-images');
        }
        Sarana::where('id', $sarana->id)->update($validated);
        return redirect(route('asarana.index'))->with('success', 'Sarana Prasarana has been updated');
    }

    public function slug(Request $request)
    {
        $slug = SlugService::createSlug(Sarana::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
