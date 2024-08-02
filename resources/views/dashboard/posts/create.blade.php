<x-main>
   <div class="row">
    <div class="col-md-7">
        <h6 class="border-bottom"><i class="fa-solid fa-pen"></i> Buat Postingan/Artikel</h6>
        <form action="{{ route('apost.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-input type="text" name="title">{{ __('Judul') }}</x-input>
            <x-input type="text" name="slug">{{ __('Slug Judul') }}</x-input>
            <x-input-select name="category_id" :options="$categories">Kategori</x-input-select>
            <x-input-text-area name="body">{{ __('Isi Postingan') }}</x-input-text-area>
            <x-input name="image" type="file" onchange="previewImage()" accept="image/*">{{ __('Image/Gambar') }}</x-input>
            <x-btn-form></x-btn-form>
            <img id="previewContainer" class="mt-3 img-fluid" width="300">
        </form>
    </div>
    <x-image-draw></x-image-draw>
  </div>
  @include('dashboard.posts.post-js')
</x-main>