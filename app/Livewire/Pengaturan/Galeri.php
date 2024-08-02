<?php

namespace App\Livewire\Pengaturan;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Galeri as ModelsGaleri;
use Illuminate\Support\Facades\Storage;

class Galeri extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $image = [];
    public $galeriId;
    protected $listeners = [
        'deleteConfirmed' => 'delete'
    ];
    public function render()
    {
        $images = ModelsGaleri::orderBy('id', 'desc')->paginate(8);
        return view('livewire.pengaturan.galeri', compact('images'));
    }

    public function submit()
    {
        $this->validate([
            'image' => 'required|array',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        foreach ($this->image as $img) {
            $name = Str::random(10) . '.' . $img->getClientOriginalExtension();
            $imagePath = $img->storeAs('album', $name);
            ModelsGaleri::create([
                'image' => $imagePath
            ]);
        }

        $imageCount = count($this->image);
        Storage::deleteDirectory('livewire-tmp');
        return redirect()->route('pengaturan')->with('success', $imageCount . ' Images has been updated!');
    }

    public function deleting($id)
    {
        $this->galeriId = $id;
        $this->dispatch('show-delete-confirmation');
    }

    public function delete()
    {
        $galeri = ModelsGaleri::where('id', $this->galeriId)->first();
        if ($galeri) {
            if ($galeri->image) {
                Storage::delete($galeri->image);
            }
            $galeri->delete();
            return redirect()->route('pengaturan')->with('success', 'The image has been deleted!');
        }
    }   
}
