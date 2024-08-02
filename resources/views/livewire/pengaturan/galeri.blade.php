<div class="my-5">
    <form class="my-3" wire:submit.prevent="submit">
        <div class="form-inline mb-3">
            <input type="file" name="image" id="image" wire:model="image" multiple>
            <button type="submit" class="btn btn-sm btn-success ml-2">
                <i class="fa-solid fa-upload"></i> Upload
            </button>
        </div>
        @if ($image)
        <div class="d-flex flex-wrap">
            @foreach($image as $img)
            <img src="{{ $img->temporaryUrl() }}" width="150" class="img-fluid mt-2 mr-2">
            @endforeach
        </div>
        @endif
    </form>
    <hr>
    <div class="row">
        @forelse ($images as $image)
        <div class="col-md-3">
            <div class="card mb-4">
                <img class="card-img-top" src="{{ asset('storage/'.$image->image) }}" alt="Uploaded Image"
                    style="height: 225px; object-fit: cover;">
                <div class="card-body text-right">
                    <div class="btn-group">
                        <button wire:click="deleting({{ $image->id }})" type="button"
                            class="btn btn-sm btn-outline-danger">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p>No images found.</p>
        </div>
        @endforelse
    </div>
    {{ $images->links() }}
</div>