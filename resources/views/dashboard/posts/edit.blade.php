<x-main>
    <div class="row">
        <div class="col-md-7">
            <h6 class="border-bottom"><i class="fa-solid fa-pen"></i> Ubah Postingan/Artikel</h6>
            <form action="{{ route('apost.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <x-input type="text" name="title" :value="old('title', $post->title)">{{ __('Judul') }}</x-input>
                <x-input type="text" name="slug" :value="old('slug', $post->slug)" readonly>{{ __('Slug Judul') }}</x-input>
                <x-input-select name="category_id" :options="$categories"
                    :selected="old('category_id', $post->category_id)">
                    {{ __('Kategori') }}
                </x-input-select>
                <x-input-text-area name="body" :value="old('body', $post->body)"></x-input-text-area>
                <x-input type="file" name="image" accept="image/*" onchange="previewImage()">{{ __('Image/Gambar') }}
                </x-input>
                <x-btn-form></x-btn-form>
                <input type="hidden" name="oldImage" value="{{ $post->image }}">
                @if ($post->image)
                <img id="previewContainer" src="{{ asset('storage/'.$post->image) }}" class="mt-3 img-fluid"
                    width="300">
                @else
                <img id="previewContainer" class="mt-3 img-fluid" width="300">
                @endif
            </form>
        </div>
        <x-image-draw></x-image-draw>
    </div>
    @include('dashboard.posts.post-js')
</x-main>