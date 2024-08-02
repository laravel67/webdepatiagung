<form wire:submit='{{ $isEditing ? 'update':'store' }}'>
    <div class="form-group">
        <label for="name">Tahun Ajaran</label>
        <input type="text" class="form-control @error('name')
                        is-invalid
                    @enderror" id="name" wire:model.live='name'>
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="chief">Ketua Penitia</label>
        <input type="text" class="form-control @error('chief')
                            is-invalid
                        @enderror" id="chief" wire:model='chief'>
        @error('chief')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="image">Gambar/Brosur</label>
        <input type="file" class="form-control @error('image')
                        is-invalid
                    @enderror" id="image" wire:model='image'>
        @error('image')
        <small class="invalid-feedback">{{ $message }}</small>
        @enderror
    </div>

    @if ($image)
    <img style="width: 200px; height: 200px" src="{{ $image->temporaryUrl() }}">
    @elseif ($isEditing && $oldImage)
    <img style="width: 200px; height: 200px" src="{{ asset('storage/brosurs/'.$oldImage) }}">
    @endif
    <div class="btn-group float-right">
        <button wire:click='cancel' type="button" class="btn btn-danger">Batal</button>
        <button type="submit" class="btn btn-success">Simpan</button>
    </div>
</form>