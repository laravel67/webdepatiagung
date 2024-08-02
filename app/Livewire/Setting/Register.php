<?php

namespace App\Livewire\Setting;

use App\Models\Taj;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Register extends Component
{
    use WithPagination;
    public $name, $chief;
    public $editId;
    public $isEditing = false;
    protected $listeners = [
        'deleteConfirmed' => 'delete'
    ];
    public function render()
    {
        $tajs = Taj::orderBy('id', 'desc')->paginate(5);
        return view('livewire.setting.register', compact('tajs'));
    }


    public function active($id)
    {
        $taj = Taj::findOrFail($id);
        $taj->status = 1;
        $taj->save();
        $this->dispatch('activedRegister');
    }
    public function unactive($id)
    {
        $taj = Taj::findOrFail($id);
        $taj->status = 0;
        $taj->save();
    }

    public function edit($id)
    {
        $taj = Taj::findOrFail($id);
        $this->dispatch('editTahunAjaran', $taj);
    }

    public function deleting($id)
    {
        $this->editId = $id;
        $this->dispatch('show-delete-confirmation');
    }

    public function delete()
    {
        $taj = Taj::where('id', $this->editId)->first();
        if ($taj) {
            if ($taj->image) {
                Storage::disk('public')->delete('brosurs/' . $taj->image);
            }
            $taj->delete();
        }
        return redirect()->route('set.reg')->with('success', 'Tahun Ajaran has been deleted!');
    }
}
