<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User as Users;
use Illuminate\Support\Facades\Storage;

class User extends Component
{
    use WithPagination;
    public $search = '';

    public $deletId;
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
        $users = Users::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(5);
        return view('livewire.user', compact('users'));
    }

    public function deleting($id)
    {
        $this->deletId = $id;
        $this->dispatch('show-delete-confirmation');
    }

    public function delete()
    {
        $user = Users::where('id', $this->deletId)->first();
        if ($user) {
            if ($user->image) {
                Storage::delete($user->image);
            }
            $user->delete();
        }
        return redirect()->route('user.index')->with('success', 'User has been deleted!');
    }
}
