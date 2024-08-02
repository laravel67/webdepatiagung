<div class="row my-5 px-3">
    <div class="col-md-6">
        <div class="d-flex mb-2 justify-content-end">
            <input type="search" wire:model.live='search' class="form-control form-control-sm col-5"
                placeholder="Search...">
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Gambar Struktur</th>
                    <th scope="col">Tahun Priode</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($persada as $index=> $row)
                <tr>
                    <td>
                        @if ($row->image)
                            <img src="{{ asset('storage/persada/'.$row->image) }}" alt="{{ $row->image }}" width="200" class="img-fluid">
                        @endif
                    </td>
                    <td>{{ $row->priode }}</td>
                    <td>{{ $row->category }}</td>
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
        {{ $persada->links() }}
    </div>
    <div class="col-md-4">
        <h3 class="card-title">{{ !$isEditing ? 'Tambah Struktur':'Ubah Struktur' }}</h3>
        <form wire:submit='{{ !$isEditing ? ' store':'update' }}'>
            <x-input name="priode" type="text">Tahun Priode</x-input>
            <x-input-select name="category" :defaultOptions="
                [
                   ['value' => 'PA', 'label' => 'PUTRA'], 
                   ['value' => 'PI', 'label' => 'PUTRI']
                ]
            ">
                Kategori
            </x-input-select>
            <x-input name="image" type="file" accept="image/*">Gambar Struktur</x-input>
            <div class="btn-group float-right">
                <button wire:click='cancel' type="button" class="btn btn-danger">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            @if ($image)
                <img src="{{ $image->temporaryUrl() }}" width="250" class="img-fluid mt-2 mr-2">
            @elseif ($oldImage && $isEditing)
                <img src="{{ asset('storage/persada/'.$oldImage) }}" width="250" class="img-fluid mt-2 mr-2">
            @endif
        </form>
    </div>
</div>