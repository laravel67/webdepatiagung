<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Sarana as Sar;
use Illuminate\Support\Facades\Storage;

class Sarana extends Component
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
        $saranas = Sar::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(5);
        return view('livewire.sarana', compact('saranas'));
    }

    public function deleting($slug)
    {
        $this->deletId = $slug;
        $this->dispatch('show-delete-confirmation');
    }

    public function delete()
    {
        $sarana = Sar::where('slug', $this->deletId)->first();
        if ($sarana) {
            if ($sarana->image) {
                Storage::delete($sarana->image);
            }
            $sarana->delete();
        }
        return redirect()->route('asarana.index')->with('success', 'Sarana Prasarana has been deleted!');
    }
}
