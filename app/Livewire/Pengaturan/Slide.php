<?php

namespace App\Livewire\Pengaturan;

use Livewire\Component;
use App\Models\Slide as Sld;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Slide extends Component
{
    use WithPagination, WithFileUploads;
    public $isEditing = false;
    public $slideId, $caption, $image, $oldImage;

    protected $listeners = [
        'deleteConfirmed' => 'delete'
    ];
    public function render()
    {
        $slides = Sld::orderBy('id', 'desc')->paginate(5);
        return view('livewire.pengaturan.slide', compact('slides'));
    }

    public function store()
    {
        $this->validate([
            'caption' => 'required|max:255|unique:slides,caption',
            'image' => 'required|image|max:1024',
        ]);

        $imgName = '';
        if ($this->image) {
            $imgName = 'slide-' . uniqid() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('slides', $imgName, 'public');
        }

        Sld::create([
            'caption' => $this->caption,
            'image' => $imgName,
        ]);
        File::deleteDirectory(storage_path('app/public/livewire-tmp'));
        return redirect()->route('pengaturan')->with('success', 'Slide baru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $slide = Sld::findOrFail($id);
        $this->slideId = $slide->id;
        $this->caption = $slide->caption;
        $this->oldImage = $slide->image;
        $this->isEditing = true;
    }


    public function update()
    {
        $this->validate([
            'caption' => 'required|max:100|unique:slides,caption',
            'image' => 'required|image|max:1024',
        ]);

        $slide = Sld::findOrFail($this->slideId);
        $imgName = '';
        if ($this->image) {
            if ($slide->image) {
                Storage::disk('public')->delete('slides/' . $slide->image);
            }
            $imgName = 'brosur-' . $this->name . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('slides', $imgName, 'public');
        } else {
            $imgName = $slide->image;
        }
        $slide->update([
            'caption' => $this->caption,
            'image' => $imgName
        ]);

        File::deleteDirectory(storage_path('app/public/livewire-tmp'));
        return redirect()->route('pengaturan')->with('success', 'Slide baru berhasil ditambahkan!');
    }

    public function cancel()
    {
        $this->slideId = '';
        $this->caption = '';
        $this->oldImage = '';
        $this->isEditing = false;
    }

    public function deleting($id)
    {
        $this->slideId = $id;
        $this->dispatch('show-delete-confirmation');
    }

    public function delete()
    {
        $slide = Sld::where('id', $this->slideId)->first();
        if ($slide) {
            if ($slide->image) {
                Storage::disk('public')->delete('slides/' . $slide->image);
            }
            $slide->delete();
        }
        return redirect()->route('pengaturan')->with('success', 'Slide Berhasil dihapus!');
    }
}
