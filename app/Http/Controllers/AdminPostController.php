<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminPostController extends Controller
{
    public function __construct()
    {
        return view()->share('title', 'Kelola Postingan');
    }
    public function index()
    {

        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('dashboard.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::latest()->get();
        $subTitle = 'Buat Postingan/Artikel';
        return view('dashboard.posts.create', compact('categories', 'subTitle'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug',
            'category_id' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|max:1024|file',
        ]);
        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('post-images');
        }
        $validated['user_id'] = Auth::id();
        $validated['excerpt'] = Str::limit(strip_tags($request->body), 200);
        Post::create($validated);
        return redirect(route('apost.index'))->with('success', 'Your post has been saved!');
    }
    
    public function show(Post $post)
    {
        $subTitle = 'Detail Artikel';
        return view('dashboard.posts.show', compact('subTitle', 'post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::latest()->get();
        $subTitle = 'Update Postingan/Artikel';
        return view('dashboard.posts.edit', compact('post', 'subTitle', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required',
            'category_id' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|max:1024|file',
        ];
        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts,slug';
        }
        $validated = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validated['image'] = $request->file('image')->store('post-images');
        }
        $validated['user_id'] = Auth::id();
        $validated['excerpt'] = Str::limit(strip_tags($request->body), 200);
        Post::where('id', $post->id)->update($validated);
        return redirect(route('apost.index'))->with('success', 'Your post has been updated');
    }

    public function slug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    // public function paginate(Request $request)
    // {
    //     $posts = Post::orderBy('id', 'desc')->paginate(10);
    //     return view('dashboard.posts.pagination', compact('posts'))->render();
    // }

    // public function search(Request $request)
    // {
    //     $posts = Post::join('categories', 'posts.category_id', '=', 'categories.id')->where(function ($query) use ($request) {
    //         $query->where('posts.title', 'like', '%' . $request->search_string . '%')
    //             ->orWhere('categories.name', 'like', '%' . $request->search_string . '%');
    //     })
    //         ->orderBy('posts.id', 'desc')
    //         ->paginate(10);

    //     if ($posts->count() >= 1) {
    //         return view('dashboard.posts.pagination', compact('posts'))->render();
    //     } else {
    //         return response()->json([
    //             'status' => 'not_found'
    //         ]);
    //     }
    // }
}
