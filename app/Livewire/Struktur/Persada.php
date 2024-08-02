<?php

namespace App\Livewire\Struktur;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Persada as Per;
use Illuminate\Support\Facades\Storage;

class Persada extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search = '';
    public $idPersada, $priode, $category, $image, $oldImage;
    public $isEditing = false;

    protected $listeners = [
        'deleteConfirmed' => 'destroy'
    ];

    protected $rules = [
        'priode' => 'required|string|max:4',
        'category' => 'required|in:PA,PI',
        'image' => 'nullable|image|max:2048'
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
        $persada = Per::where('priode', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(2);
        return view('livewire.struktur.persada', compact('persada'));
    }

    public function store()
    {
        $this->validate();
        $imageName = '';
        if ($this->image) {
            $imageName = 'persada-' . $this->priode . '-' . $this->category . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('persada', $imageName, 'public');
        }

        $persada = [
            'priode' => $this->priode,
            'category' => $this->category,
            'image' => $imageName,
        ];
        Per::create($persada);
        Storage::deleteDirectory('livewire-tmp');
        return redirect()->route('admin.persada')->with('success', "Struktur Persada {$this->category} priode {$this->priode} berhasil ditambah");
    }

    public function edit($id)
    {
        $persada = Per::findOrFail($id);
        $this->idPersada = $persada->id;
        $this->priode = $persada->priode;
        $this->category = $persada->category;
        $this->oldImage = $persada->image;
        $this->isEditing = true;
    }

    public function update()
    {
        $persada = Per::findOrFail($this->idPersada);
        $this->validate();
        if ($this->image) {
            if ($this->oldImage) {
                Storage::delete('persada/' . $this->oldImage);
            }
            $imageName = 'persada-' . $this->priode . '-' . $this->category . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('persada', $imageName, 'public');
        } else {
            $imageName = $this->oldImage;
        }
        $persada->update([
            'priode' => $this->priode,
            'category' => $this->category,
            'image' => $imageName,
        ]);
        Storage::deleteDirectory('livewire-tmp');
        return redirect()->route('admin.persada')->with('success', "Struktur Persada berhasil diubah");
    }

    public function deleting($id)
    {
        $this->idPersada = $id;
        $this->dispatch('show-delete-confirmation');
    }

    public function cancel()
    {
        $this->idPersada = '';
        $this->priode = '';
        $this->category = '';
        $this->oldImage = '';
        $this->isEditing = false;
    }

    public function destroy()
    {
        $persada = Per::findOrFail($this->idPersada);
        if ($persada) {
            if ($persada->image) {
                Storage::delete('persada/' . $persada->image);
                $persada->delete();
            }
            return redirect()->route('admin.persada')->with('success', "Struktur Persada berhasil dihapus");
        }
    }
}
