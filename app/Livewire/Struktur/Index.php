<?php

namespace App\Livewire\Struktur;

use App\Models\Jabatan;
use App\Models\Struktur;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithFileUploads;

    public $name = [];
    public $nameOrang = [];
    public $idjabatan = [];
    public $image = [];
    public $oldImage = [];


    public $rules = [
        'nameOrang.*' => 'required|string|max:255',
        'image.*' => 'nullable|image|max:1024',
    ];

    public function rules()
    {
        return $this->rules;
    }

    public function messages()
    {
        return [
            'nameOrang.*.required' => 'Nama Lengkap wajib diisi.',
            'nameOrang.*.string' => 'Nama Lengkap harus berupa teks.',
            'nameOrang.*.max' => 'Nama Lengkap tidak boleh lebih dari 255 karakter.',
            'image.*.image' => 'File harus berupa gambar.',
            'image.*.max' => 'Gambar tidak boleh lebih dari 1 Mb.',
        ];
    }


    public function mount()
    {
        $desiredJabatanNames = [
            'PIMPINAN', 'YAYASAN', 'PENGASUH SANTRI PUTRA', 'PENGASUH SANTRI PUTRI',
            'KABAG TU', 'BENDAHARA', 'KAMAD MTS', 'KAMAD MAS', 'BID PRASARANA',
            'BID KESEHATAN', 'BID KESISWAAN', 'BID PENDIDIKAN'
        ];

        $jabatan = Jabatan::whereIn('name', $desiredJabatanNames)
            ->with('strukturs')
            ->get();

        foreach ($jabatan as $index => $row) {
            $this->name[$index] = $row->name;
            $this->idjabatan[$index] = $row->id;

            $firstStruktur = $row->strukturs->first();
            $this->nameOrang[$index] = $firstStruktur->name ?? '';
            $this->oldImage[$index] = $firstStruktur->image ?? '';
        }
    }

    public function render()
    {
        return view('livewire.struktur.index', [
            'jabatan' => Jabatan::whereIn('name', $this->getDesiredJabatanNames())->get(),
        ]);
    }

    public function store()
    {
        $this->validate();

        foreach ($this->nameOrang as $index => $name) {
            if (!isset($this->idjabatan[$index])) {
                session()->flash('error', "Jabatan ID not set for index $index");
                continue;
            }

            $struktur = Struktur::where('jabatan_id', $this->idjabatan[$index])->first();
            $imgName = $struktur->image ?? null;

            if (isset($this->image[$index])) {
                if ($imgName) {
                    Storage::disk('public')->delete('strukturs/' . $imgName);
                }

                $imgName = 'struktur-' . uniqid() . '.' . $this->image[$index]->getClientOriginalExtension();
                $this->image[$index]->storeAs('strukturs', $imgName, 'public');
            }

            if ($struktur) {
                $struktur->update([
                    'name' => $name,
                    'image' => $imgName,
                ]);
            } else {
                Struktur::create([
                    'name' => $name,
                    'jabatan_id' => $this->idjabatan[$index],
                    'image' => $imgName,
                ]);
            }
        }
        Storage::deleteDirectory('livewire-tmp');
        return redirect()->route('admin.struktur')->with('success', 'Struktur berhasil diperbarui!');
    }


    private function getDesiredJabatanNames()
    {
        return [
            'PIMPINAN', 'YAYASAN', 'PENGASUH SANTRI PUTRA', 'PENGASUH SANTRI PUTRI',
            'KABAG TU', 'BENDAHARA', 'KAMAD MTS', 'KAMAD MAS', 'BID PRASARANA',
            'BID KESEHATAN', 'BID KESISWAAN', 'BID PENDIDIKAN'
        ];
    }
}
