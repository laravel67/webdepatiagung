<?php

namespace App\Http\Controllers\Home;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Jorenvh\Share\Share;
use App\Http\Controllers\Controller;
use App\Models\Acara;

class PostController extends Controller
{
    public function __construct()
    {
        return view()->share('title', 'Berita');
    }
    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = 'kategori : ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' Oleh : ' . $author->name;
        }
        $posts = Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString();
        $categories = Category::latest()->get();
        $shareComponent = new Share();
        $shareComponent->page(
            'https://depatiagung.my.id/berita',
        )->facebook()->twitter()->linkedin()->telegram()->whatsapp()->instagram();
        $jadwal = Acara::where('status', false)->orderBy('id', 'desc')->get();
        return view('home.posts.posts', [
            'posts' => $posts,
            'subtitle' => $title,
            'categories' => $categories,
            'shareComponent' => $shareComponent,
            'jadwals' => $jadwal
        ]);
    }

    public function show($slug)
    {
        $shareComponent = new Share();
        $url = str_replace('{slug}', $slug, 'https://depatiagung.my.id/berita/{slug}');
        $shareComponent->page($url);
        $shareComponent->facebook()->twitter()->linkedin()->telegram()->whatsapp()->instagram();
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('home.posts.post', compact('post', 'shareComponent'));
    }
}
