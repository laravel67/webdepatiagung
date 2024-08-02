<?php

namespace App\Livewire;

use App\Models\Guru;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Teacher extends Component
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
        $teachers = Guru::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(5);
        return view('livewire.teacher', compact('teachers'));
    }
    public function deleting($slug)
    {
        $this->deletId = $slug;
        $this->dispatch('show-delete-confirmation');
    }

    public function delete()
    {
        $guru = Guru::where('slug', $this->deletId)->first();
        if ($guru) {
            if ($guru->image) {
                Storage::delete($guru->image);
            }
            $guru->delete();
        }
        return redirect()->route('guru.index')->with('success', 'Guru has been deleted!');
    }
}
