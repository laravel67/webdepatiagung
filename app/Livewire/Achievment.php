<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Achievment as Ach;
use Illuminate\Support\Facades\Storage;

class Achievment extends Component
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
        $achievments = Ach::where('title', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(5);
        return view('livewire.achievment', compact('achievments'));
    }

    public function deleting($slug)
    {
        $this->deletId = $slug;
        $this->dispatch('show-delete-confirmation');
    }

    public function delete()
    {
        $achiev = Ach::where('slug', $this->deletId)->first();
        if ($achiev) {
            if ($achiev->image) {
                Storage::delete($achiev->image);
            }
            $achiev->delete();
        }
        return redirect()->route('prestasi.index')->with('success', 'Achievment has been deleted!');
    }
}
