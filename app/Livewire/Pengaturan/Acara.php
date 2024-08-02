<?php

namespace App\Livewire\Pengaturan;

use App\Models\Acara as Ac;
use Livewire\Component;
use Livewire\WithPagination;

class Acara extends Component
{
    public $name, $waktu, $tempat;
    public $acaraId;
    public $isEditing = false;
    use WithPagination;
    protected $listeners = [
        'deleteConfirmed' => 'delete'
    ];
    public function render()
    {
        $acara = Ac::orderBy('id', 'desc')->paginate(5);
        return view('livewire.pengaturan.acara', compact('acara'));
    }
    public function submit()
    {
        $this->validate([
            'name' => 'required|string',
            'waktu' => 'required|date',
            'tempat' => 'required|string',
        ]);

        // Simpan data acara
        Ac::create([
            'name' => $this->name,
            'waktu' => $this->waktu,
            'tempat' => $this->tempat,
        ]);
        return redirect()->route('pengaturan')->with('success', 'The event has been saved!');
    }

    public function edit($id)
    {
        $acara = Ac::findOrFail($id);
        $this->acaraId = $acara->id;
        $this->name = $acara->name;
        $this->waktu = $acara->waktu;
        $this->tempat = $acara->tempat;
        $this->isEditing = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string',
            'waktu' => 'required|date',
            'tempat' => 'required|string',
        ]);

        $acara = Ac::findOrFail($this->acaraId);
        $acara->update([
            'name' => $this->name,
            'waktu' => $this->waktu,
            'tempat' => $this->tempat,
        ]);
        return redirect()->route('pengaturan')->with('success', 'The event has been updated!');
    }

    public function cancel()
    {
        $this->acaraId = '';
        $this->name = '';
        $this->waktu = '';
        $this->tempat = '';
        $this->isEditing = false;
    }

    public function deleting($id)
    {
        $this->acaraId = $id;
        $this->dispatch('show-delete-confirmation');
    }

    public function delete()
    {
        $acara = Ac::where('id', $this->acaraId)->first();
        if ($acara) {
            $acara->delete();
        }
        return redirect()->route('pengaturan')->with('success', 'The event has been deleted!');
    }

    public function end($id)
    {
        $acara = Ac::findOrFail($id);
        $acara->status = true;
        $acara->save();
        return redirect()->route('pengaturan')->with('success', 'The event has been held!');
    }
}
