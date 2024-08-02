<x-main>
    <div class="row">
        <div class="col-md-7">
            <h6 class="border-bottom"><i class="fa-solid fa-pen"></i> Ubah Data Penghargaan</h6>
            <form action="{{ route('prestasi.update', $achievment->slug) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-input type="text" name="title" :value="old('title', $achievment->title)">{{ __('Nama') }}</x-input>
                <x-input type="text" name="slug" :value="old('slug', $achievment->slug)" readonly>{{ __('Slug Nama') }}
                </x-input>
                <x-input-select name="category" :selected="old('category', $achievment->category)" :defaultOptions="[
                            ['value' => 'akademik', 'label' => 'Akademik'],
                            ['value' => 'nonakademik', 'label' => 'Non Akademik'],
                            ['value' => 'student', 'label' => 'Santri/Siswa']
                        ]">{{ __('Kategori') }}
                </x-input-select>
                <x-input-text-area name="body" :value="old('body', $achievment->body)">{{ __('Deskripsi') }}
                </x-input-text-area>
                <x-input name="image" type="file" onchange="previewImage()" accept="image/*">{{ __('Image/Gambar') }}
                </x-input>
                <x-btn-form></x-btn-form>

                @if ($achievment->image)
                <img id="previewContainer" src="{{ asset('storage/'.$achievment->image) }}" class="mt-3 img-fluid"
                    width="300" alt="{{ $achievment->title }}">
                @else
                <img id="previewContainer" class="mt-3 img-fluid" width="300" alt="No Image Available">
                @endif
            </form>
        </div>
        <x-image-draw />
        @include('dashboard.achievments.script')
    </div>
</x-main>