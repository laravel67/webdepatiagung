<x-main>
    <div class="row">
        <div class="col-md-7">
            <h6 class="border-bottom"><i class="fa-solid fa-pen"></i> Ubah Sarana Prasarana</h6>
            <form action="{{ route('asarana.update', $sarana->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-input type="text" name="name" :value="old('name', $sarana->name)">{{ __('Nama SP') }}</x-input>
                <x-input type="text" name="slug" :value="old('slug', $sarana->slug)">{{ __('Slug SP') }}</x-input>
                <x-input-text-area name="body" :value="old('body', $sarana->body)">{{ __('Deskripsi') }}</x-input-text-area>
                <x-input type="file" name="image" accept="image/*" onchange="previewImage()">{{ __('Image/Gambar') }}
                </x-input>
                <x-btn-form></x-btn-form>
                <input type="hidden" name="oldImage" value="{{ $sarana->image }}">
                @if ($sarana->image)
                <img id="previewContainer" src="{{ asset('storage/'.$sarana->image) }}" class="mt-3 img-fluid" width="300">
                @else
                <img id="previewContainer" class="mt-3 img-fluid" width="300">
                @endif
            </form>
        </div>
        <x-image-draw></x-image-draw>
        @include('dashboard.saranas.script')
    </div>
</x-main>