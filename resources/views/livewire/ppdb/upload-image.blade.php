<div class="row justify-content-center mt-2">
    <div>
        @if ($image && is_object($image))
        <img class="img-thumbnail" src="{{ $image->temporaryUrl() }}"
            style="width: 250px; height: 300px; object-fit: cover; overflow: hidden;">
        @elseif ($imageOld)
        <img class="img-thumbnail" src="{{ asset('storage/'.$imageOld) }}"
            style="width: 250px; height: 300px; object-fit: cover; overflow: hidden;">
        @else
        <img class="img-thumbnail" src="{{ asset('frontend/img/man-user.svg') }}"
            style="width: 250px; height: 300px; object-fit: cover; overflow: hidden;">
        @endif
        <form wire:submit.prevent='uploadImage' enctype="multipart/form-data">
            <input type="file" id="fileInput" style="display: none;" wire:model='image' class=" @error('image')
                            is-invalid
                        @enderror">
            <div class="mt-2 d-flex justify-content-around">
                @if (!$image)
                <button class="btn btn-sm btn-outline-secondary rounded-0 col"
                    onclick="document.getElementById('fileInput').click()">
                    <i class="fa-solid fa-paperclip"></i> Pilih Foto
                </button>
                @else
                <button class="btn btn-success btn-sm rounded-0 col-10" @if (!$image) disabled @endif>
                    <i class="fa-solid fa-upload"></i> Unggah Foto
                </button>
                <button wire:click='cancel' class="btn btn-light btn-sm rounded-0 col-2">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                @endif

            </div>
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </form>
    </div>
</div>