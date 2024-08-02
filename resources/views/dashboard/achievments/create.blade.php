<x-main>
    <div class="row">
        <div class="col-md-7">
            <h6 class="border-bottom"><i class="fa-solid fa-pen"></i> Tambah Penghargaan</h6>
            <form action="{{ route('prestasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-input type="text" name="title">{{ __('Nama') }}</x-input>
                <x-input type="text" name="slug">{{ __('Slug Nama') }}</x-input>
                <x-input-select name="category" :defaultOptions="[
                            ['value' => 'akademik', 'label' => 'Akademik'],
                            ['value' => 'nonakademik', 'label' => 'Non Akademik'],
                            ['value' => 'siswa', 'label' => 'Santri/Siswa']
                        ]">{{ __('Kategori') }}
                </x-input-select>
                <x-input-text-area name="body">{{ __('Deskripsi') }}</x-input-text-area>
                <x-input name="image" type="file" onchange="previewImage()" accept="image/*">{{ __('Image/Gambar') }}</x-input>
                <x-btn-form></x-btn-form>
                <img id="previewContainer" class="mt-3 img-fluid" width="300">
            </form>
        </div>
       <x-image-draw />
       @include('dashboard.achievments.script')
    </div>
</x-main>