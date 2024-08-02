<?php

namespace App\Livewire;


use Livewire\Component;
use App\Models\Mapel as Mapels;
use Livewire\WithPagination;

class Mapel extends Component
{
    use WithPagination;
    public $search = '';

    public $mapelId, $name;
    public $isEditing = false;
    protected $listeners = [
        'deleteConfirmed' => 'destroy'
    ];

    protected $rules = [
        'name' => 'required|max:50|unique:mapels,name'
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
        $mapel = MapelS::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(10);
        return view('livewire.mapel', compact('mapel'));
    }

    public function store()
    {
        $this->validate();
        Mapels::create([
            'name' => ucwords(strtolower($this->name))
        ]);
        return redirect()->route('admin.mapel')->with('success', 'Mata Pelajaran berhasil ditambah!');
    }

    public function edit($id)
    {
        $mapel = Mapels::findOrFail($id);
        $this->mapelId = $mapel->id;
        $this->name = $mapel->name;
        $this->isEditing = true;
    }

    public function update()
    {
        $this->validate();
        $mapel = Mapels::findOrFail($this->mapelId);
        $mapel->update([
            'name' => ucwords(strtolower($this->name))
        ]);
        return redirect()->route('admin.mapel')->with('success', 'Mata Pelajaran berhasil diubah!');
    }

    public function cancel()
    {
        $this->isEditing = false;
        $this->mapelId = '';
        $this->name = '';
    }

    public function deleting($id)
    {
        $this->mapelId = $id;
        $this->dispatch('show-delete-confirmation');
    }

    public function destroy()
    {
        $mapel = Mapels::findOrFail($this->mapelId);
        if ($mapel) {
            $mapel->delete();
        }
        return redirect()->route('admin.mapel')->with('success', 'Mapel berhasil dihapus!');
    }
}
