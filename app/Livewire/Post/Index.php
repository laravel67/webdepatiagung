<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination;
    public $search = '';
    public $deletId;
    protected $listeners = [
        'deleteConfirmed' => 'delete'
    ];

    protected $updateQueryString = [
        'search' => ['except' => '']
    ];
    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Post::query();
        if (Auth::check() && Auth::user()->role === 'admin') {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhereHas('category', function ($cq) {
                        $cq->where('name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('author', function ($uq) {
                        $uq->where('name', 'like', '%' . $this->search . '%');
                    });
            });
        } else {
            // Jika pengguna bukan admin, tampilkan posting berdasarkan user_id
            $query->where('user_id', Auth::id());
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhereHas('category', function ($cq) {
                        $cq->where('name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('author', function ($uq) {
                        $uq->where('name', 'like', '%' . $this->search . '%');
                    });
            });
        }
        $query->orderBy('id', 'desc');
        $posts = $query->paginate(10);
        return view('livewire.post.index', compact('posts'));
    }

    public function deleting($slug)
    {
        $this->deletId = $slug;
        $this->dispatch('show-delete-confirmation');
    }

    public function delete()
    {
        $post = Post::where('slug', $this->deletId)->first();
        if ($post) {
            if ($post->image) {
                Storage::delete($post->image);
            }
            $post->delete();
        }
        return redirect()->route('apost.index')->with('success', 'Post has been deleted!');
    }
}
