<?php

namespace App\Livewire;

use App\Models\Taj;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Daftar as Daf;
use App\Exports\StudentExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class Daftar extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $deletId;
    public $ta = '';
    public $ta_name;

    protected $listeners = [
        'deleteConfirmed' => 'delete'
    ];

    protected $updateQueryString = [
        'search' => ['except' => '']
    ];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
        $this->ta = request()->query('ta', $this->ta);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Student::query();

        if ($this->search) {
            $query->where('nama', 'like', '%' . $this->search . '%');
        }

        if ($this->ta) {
            $query->where('ta_id', $this->ta);
        }

        $daftars = $query->orderBy('id', 'desc')->paginate($this->perPage);

        $tajs = Taj::orderBy('id', 'desc')->get();

        return view('livewire.daftar', [
            'daftars' => $daftars,
            'tajs' => $tajs,
        ]);
    }

    public function show()
    {
        $this->perPage;
        $this->render();
    }

    public function detail($id)
    {
        $daftar = Student::findOrFail($id);
        return redirect()->route('daftar.show', ['daftar' => $daftar]);
    }

    public function deleting($id)
    {
        $this->deletId = $id;
        $this->dispatch('show-delete-confirmation');
    }

    public function delete()
    {
        $student = Student::where('id', $this->deletId)->first();
        if ($student) {
            if ($student->image) {
                Storage::delete($student->image);
            }
            $student->delete();
        }
        return redirect()->route('daftar.index')->with('success', 'Student has been deleted!');
    }

    public function export()
    {
        $ta_name = $this->ta ? Taj::find($this->ta)->name : 'data_ppdb';
        return Excel::download(new StudentExport($this->ta), "ppdb_{$ta_name}.xlsx");
    }
}
