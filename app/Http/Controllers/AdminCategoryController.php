<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminCategoryController extends Controller
{
    public function __construct()
    {
        return view()->share('title', 'Kelola Kategori');
    }

    public function index()
    {
        return view('dashboard.categories.index');
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories,name',
            'slug' => 'required|unique:categories,slug'
        ]);
        Category::create($validated);
        return redirect(route('category.index'))->with('success', 'Category has been saved!');
    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $rules = [];
        if ($request->name != $category->name) {
            $rules['name'] = 'required|unique:categories,name';
        }
        if ($request->slug != $category->slug) {
            $rules['slug'] = 'required|unique:categories,slug';
        }
        $validated = $request->validate($rules);
        Category::where('id', $category->id)->update($validated);
        return redirect(route('category.index'))->with('success', 'Category has been updated');
    }
    
    public function slug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
