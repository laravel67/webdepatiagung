<x-main>
    <div class="row">
        <div class="col-md-7">
            <h6 class="border-bottom"><i class="fa-solid fa-pen"></i> Buat Sarana Prasarana</h6>
            <form action="{{ route('asarana.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-input type="text" name="name">{{ __('Nama SP') }}</x-input>
                <x-input type="text" name="slug">{{ __('Slug SP') }}</x-input>
                <x-input-text-area name="body">{{ __('Deskripsi') }}</x-input-text-area>
                <x-input name="image" type="file" onchange="previewImage()" accept="image/*">{{ __('Image/Gambar') }}</x-input>
                <x-btn-form></x-btn-form>
                <img id="previewContainer" class="mt-3 img-fluid" width="300">
            </form>
        </div>
        <x-image-draw></x-image-draw>
        @include('dashboard.saranas.script')
    </div>
</x-main>