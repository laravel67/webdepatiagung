<?php

namespace App\Livewire\Setting;

use App\Models\Taj;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Create extends Component
{
    use WithFileUploads;
    public $name, $chief, $image, $oldImage, $status;
    public $tajId;
    public $isEditing = false;

    protected $listeners = [
        'editTahunAjaran' => 'edit'
    ];
    public function render()
    {
        return view('livewire.setting.create');
    }

    public function updatedName($value)
    {
        if (strlen($value) == 4 && is_numeric($value)) {
            $nextYear = str_pad((int)$value + 1, 4, '0', STR_PAD_LEFT);
            $this->name = $value . '-' . $nextYear;
        }
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:9|unique:tajs,name',
            'chief' => 'required|string|max:255',
            'image' => 'image|max:1024'
        ]);
        $imgName = '';
        if ($this->image) {
            $imgName = 'brosur-' . $this->name . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('brosurs', $imgName, 'public');
        }
        Taj::where('status', "1")->update(['status' => "0"]);
        Taj::create([
            'name' => $this->name,
            'chief' => $this->chief,
            'image' => $imgName
        ]);
        File::deleteDirectory(storage_path('app/public/livewire-tmp'));
        return redirect()->route('set.reg')->with('success', 'Tahun Ajaran baru berhasil ditambahkan!');
    }

    public function edit($taj)
    {
        $this->tajId = $taj['id'];
        $this->name = $taj['name'];
        $this->chief = $taj['chief'];
        $this->status = $taj['status'];
        $this->oldImage = $taj['image'];
        $this->isEditing = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:9|unique:tajs,name,' . $this->tajId,
            'chief' => 'required|string|max:255',
            'image' => 'nullable|image|max:1024'
        ]);
        $taj = Taj::findOrFail($this->tajId);
        if ($this->image) {
            if ($taj->image) {
                Storage::disk('public')->delete('brosurs/' . $taj->image);
            }
            $imgName = 'brosur-' . $this->name . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('brosurs', $imgName, 'public');
        } else {
            $imgName = $taj->image;
        }
        $taj->update([
            'name' => $this->name,
            'chief' => $this->chief,
            'image' => $imgName,
            'status' => $this->status
        ]);
        $this->cancel();
        File::deleteDirectory(storage_path('app/public/livewire-tmp'));
        return redirect()->route('set.reg')->with('success', 'Tahun Ajaran berhasil diubah!');
    }

    public function cancel()
    {
        $this->tajId = '';
        $this->name = '';
        $this->chief = '';
        $this->oldImage = null;
        $this->isEditing = false;
    }
}
