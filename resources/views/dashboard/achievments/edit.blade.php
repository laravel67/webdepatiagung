<x-main>
    <div class="row">
        <div class="col-md-7">
            <h6 class="border-bottom"><i class="fa-solid fa-pen"></i> Ubah Data Penghargaan</h6>
            <form action="{{ route('prestasi.update', $prestasi->slug) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-input type="text" name="title" :value="old('title', $prestasi->title)">{{ __('Nama') }}</x-input>
                <x-input type="text" name="slug" :value="old('slug', $prestasi->slug)" readonly>{{ __('Slug Nama') }}
                </x-input>
                <x-input-select name="category" :selected="old('category', $prestasi->category)" :defaultOptions="[
                            ['value' => 'akademik', 'label' => 'Akademik'],
                            ['value' => 'nonakademik', 'label' => 'Non Akademik'],
                            ['value' => 'student', 'label' => 'Santri/Siswa']
                        ]">{{ __('Kategori') }}
                </x-input-select>
                <x-input-text-area name="body" :value="old('body', $prestasi->body)">{{ __('Deskripsi') }}
                </x-input-text-area>
                <x-input name="image" type="file" onchange="previewImage()" accept="image/*">{{ __('Image/Gambar') }}
                </x-input>
                <x-btn-form></x-btn-form>

                @if ($prestasi->image)
                <img id="previewContainer" src="{{ asset('storage/'.$prestasi->image) }}" class="mt-3 img-fluid"
                    width="300" alt="{{ $prestasi->title }}">
                @else
                <img id="previewContainer" class="mt-3 img-fluid" width="300" alt="No Image Available">
                @endif
            </form>
        </div>
        <x-image-draw />
        @include('dashboard.achievments.script')
    </div>
</x-main>