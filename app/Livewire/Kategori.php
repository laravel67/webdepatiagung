<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Kategori extends Component
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
        $categories = Category::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(10);
        return view('livewire.kategori', compact('categories'));
    }

    public function deleting($slug)
    {
        $this->deletId = $slug;
        $this->dispatch('show-delete-confirmation');
    }

    public function delete()
    {
        $category = Category::where('slug', $this->deletId)->first();
        if ($category) {
            $category->delete();
        }
        return redirect()->route('category.index')->with('success', 'Category has been deleted!');
    }
}
