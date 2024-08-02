<?php

namespace App\Livewire\Jabatan;

use App\Models\Jabatan as Jab;
use Livewire\Component;
use Livewire\WithPagination;

class Jabatan extends Component
{
    use WithPagination;

    public $search = '';
    public $idJabatan, $name;
    public $isEditing = false;

    protected $listeners = [
        'deleteConfirmed' => 'destroy'
    ];

    protected $rules = [
        'name' => 'required|max:50|unique:jabatans,name'
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
        $jabatan = Jab::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(5);
        return view('livewire.jabatan.jabatan', compact('jabatan'));
    }

    public function store()
    {
        $this->validate();
        Jab::create([
            'name' => strtoupper($this->name)
        ]);
        return redirect()->route('admin.jabatan')->with('success', 'Jabatan berhasil ditambah!');
    }

    public function edit($id)
    {
        $jabatan = Jab::findOrFail($id);
        $this->idJabatan = $jabatan->id;
        $this->name = $jabatan->name;
        $this->isEditing = true;
    }

    public function update()
    {
        $this->validate();
        $jabatan = Jab::findOrFail($this->idJabatan);
        $jabatan->update([
            'name' => strtoupper($this->name)
        ]);
        return redirect()->route('admin.jabatan')->with('success', 'Jabatan berhasil diperbarui!');
    }

    public function cancel()
    {
        $this->isEditing = false;
        $this->idJabatan = '';
        $this->name = '';
    }

    public function deleting($id)
    {
        $this->idJabatan = $id;
        $this->dispatch('show-delete-confirmation');
    }

    public function destroy()
    {
        $jabatan = Jab::findOrFail($this->idJabatan);
        if ($jabatan) {
            $jabatan->delete();
        }
        return redirect()->route('admin.jabatan')->with('success', 'Jabatan berhasil dihapus!');
    }
}
