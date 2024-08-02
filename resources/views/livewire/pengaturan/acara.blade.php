<div class="row mt-4">
    <div class="col-md-8">
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Nama Acara</th>
                        <th>Waktu</th>
                        <th>Tempat</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($acara as $i => $row)
                    <tr>
                        <td>{{ $row->name }}</td>
                       <td>
                        {{ \Carbon\Carbon::parse($row->waktu)->locale('id')->translatedFormat('d F
                        Y H:i') }}
                       </td>
                        <td>{{ $row->tempat }}</td>
                        <td>
                           @if ($row->status==false)
                               <button wire:click='end("{{ $row->id }}")' class="btn btn-sm btn-success"><i class="fa-solid fa-check"></i></button>
                           @else
                               <button wire:click='end("{{ $row->id }}")' class="btn btn-sm"><i class="fa-solid fa-check"></i></button>
                           @endif
                            <button wire:click='edit("{{ $row->id }}")' class="btn btn-sm btn-warning text-light"><i class="fa-solid fa-edit"></i></button>
                            <button wire:click='deleting("{{ $row->id }}")' class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">Tidak ada data acara.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $acara->links() }}
        </div>
    </div>
    <div class="col-md-4">
        <h6 class="border-bottom mb-3"><i class="fa-solid fa-pen"></i> 
            @if ($isEditing)
                Ubah Acara
            @else
                Buat Acara
            @endif
        </h6>
        <form wire:submit.prevent='{{ $isEditing ? 'update':'submit' }}'>
            <div class="form-group">
                <label for="name">Nama Acara</label>
                <input type="text" class="form-control @error('name')
                    is-invalid
                @enderror" wire:model='name' id="name">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="waktu">Waktu Acara</label>
                <input type="datetime-local" class="form-control @error('waktu')
                    is-invalid
                @enderror" wire:model="waktu" id="waktu">
                @error('waktu')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
             <div class="form-group">
                <label for="tempat">Tempat Acara</label>
                <input type="text" class="form-control @error('tempat')
                    is-invalid
                @enderror" wire:model="tempat" id="tempat">
                @error('tempat')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="btn btn-group float-right">
                <button wire:click='cancel' class="btn btn-danger" type="reset">Batal</button>
                <button class="btn btn-success" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>



