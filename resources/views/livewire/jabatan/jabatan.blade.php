<div class="row my-5 px-3">
    <div class="col-md-6">
        <div class="d-flex mb-2 justify-content-between">
            <div>
                <x-btn-modal id="importJabatan" />
                <x-modal-import subTitle="Import Jabatan" id="importJabatan">
                    <form action="{{ route('import.jabatan') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <x-input-import name="import">Pilih file Excel</x-input-import>
                        <x-btn-import />
                    </form>
                </x-modal-import>
            </div>
            <x-search></x-search>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Jabatan</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jabatan as $index=> $row)
                <tr>
                    <td>{{ $jabatan->firstItem()+$index }}</td>
                    <td>{{ $row->name }}</td>
                    <td>
                        <div class="btn-group">
                            <button wire:click='edit({{ $row->id }})' class="btn btn-sm btn-warning text-light"><i
                                    class="fa-solid fa-edit"></i></button>
                            <button wire:click='deleting({{ $row->id }})' class="btn btn-sm btn-danger"><i
                                    class="fa-solid fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
        {{ $jabatan->links() }}
    </div>
    <div class="col-md-4">
        <h3 class="card-title">{{ !$isEditing ? 'Tambah Jabatan':'Ubah Jabatan' }}</h3>
        <form wire:submit='{{ $isEditing ? ' update':'store' }}'>
            <div class="form-group">
                <label for="name">Nama Jabatan</label>
                <input type="text" class="form-control @error('name')
                                is-invalid
                            @enderror" id="name" wire:model='name'>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="btn-group float-right">
                <button wire:click='cancel' type="button" class="btn btn-danger">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>
