<?php

namespace App\Livewire\Ppdb;

use App\Models\Student;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UploadImage extends Component
{
    use WithFileUploads;
    public $image, $imageOld, $nama;

    protected $rules = [
        'image' => [
            'required',
            'image',
            'max:1024', // 1 MB = 1024 KB
        ],
    ];

    protected $messages = [
        'image.required' => 'Kolom gambar wajib diisi.',
        'image.image' => 'Kolom yang diunggah harus berupa gambar.',
        'image.max' => 'Ukuran file gambar tidak boleh lebih dari 1MB.',
    ];

    public function mount()
    {
        $this->loadStudentData();
        // dd($this->imageOld);
    }

    public function loadStudentData()
    {
        $user = Auth::user();
        if ($user && $user->role == 'siswa') {
            $student = Student::where('email', $user->email)->first();
            if ($student) {
                $this->nama = $student->nama;
                $this->imageOld = $student->image;
            }
        }
    }

    public function render()
    {
        return view('livewire.ppdb.upload-image');
    }

    public function uploadImage()
    {
        $this->validate();

        if ($this->image) {
            if ($this->imageOld) {
                Storage::delete($this->imageOld);
            }
            $imageName = $this->image->store('siswa');
            $this->updateImageColumn($imageName);
        }

        Storage::deleteDirectory('livewire-tmp');
        $this->reset();
        $this->loadStudentData();
        $this->dispatch('uploadedImage');
    }

    protected function updateImageColumn($imageName)
    {
        $user = Auth::user();
        if ($user && $user->role == 'siswa') {
            $student = Student::where('email', $user->email)->first();
            if ($student) {
                $student->update([
                    'image' => $imageName,
                ]);
            }
        }
    }
    public function cancel()
    {
        $this->reset(['image']);
        $this->loadStudentData();
    }
}
