<?php

namespace App\Livewire\Kesiswaan;

use Livewire\Component;
use App\Models\Lifeskill;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Ekstrakulikuler extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $name, $category, $image, $imageOld;
    public $isEditing = false;

    public $search = '';
    public $idLs;
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
        $lifesklills = Lifeskill::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(10);
        return view('livewire.kesiswaan.ekstrakulikuler', compact('lifesklills'));
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|unique:lifeskills,name',
            'category' => 'required',
            'image' => 'max:1024|image|file|nullable|mimes:png,jpg,jpeg,svg'
        ]);

        $lifeskill = new Lifeskill();
        $lifeskill->name = $this->name;
        $lifeskill->category = $this->category;
        if ($this->image) {
            $name = Str::random(10) . '.' . $this->image->getClientOriginalExtension();
            $imagePath = $this->image->storeAs('lifeskills', $name);
            $lifeskill->image = $imagePath;
        }
        $lifeskill->save();
        $this->resetForm();
        Storage::deleteDirectory('livewire-tmp');
        return redirect()->route('admin.lifeskill')->with('success', 'Ekstra Kulikuler berhasil disimpan!');
    }

    public function edit($id)
    {
        $lifeskill = Lifeskill::findOrFail($id);
        $this->idLs = $lifeskill->id;
        $this->name = $lifeskill->name;
        $this->category = $lifeskill->category;
        $this->imageOld = asset('storage/' . $lifeskill->image);
        $this->isEditing = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|unique:lifeskills,name,' . $this->idLs,
            'category' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:1024',
        ]);

        $lifeskill = Lifeskill::findOrFail($this->idLs);
        $lifeskill->name = $this->name;
        $lifeskill->category = $this->category;
        if ($this->image) {
            if ($lifeskill->image) {
                Storage::delete($lifeskill->image);
            }
            $name = Str::random(10) . '.' . $this->image->getClientOriginalExtension();
            $imagePath = $this->image->storeAs('lifeskills', $name);
            $lifeskill->image = $imagePath;
        }
        $lifeskill->save();
        $this->cancel();
        Storage::deleteDirectory('livewire-tmp');
        return redirect()->route('admin.lifeskill')->with('success', 'Ekstra Kulikuler berhasil di ubah!');
    }

    public function resetForm()
    {
        $this->reset(['name', 'category', 'image']);
    }

    public function deleting($id)
    {
        $this->idLs = $id;
        $this->dispatch('show-delete-confirmation');
    }

    public function delete()
    {
        $ls = Lifeskill::where('id', $this->idLs)->first();
        if ($ls) {
            if($ls->image){
                Storage::delete($ls->image);
            }
            $ls->delete();
        }
        return redirect()->route('admin.lifeskill')->with('success', 'Ekstra Kulikuler berhasil dihapus!');
    }
    public function cancel()
    {
        $this->resetForm();
        $this->isEditing = false;
        $this->imageOld = '';
    }
}
