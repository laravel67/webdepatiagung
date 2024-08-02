<x-main>
    <div class="row">
        <div class="col-md-7">
            <h6 class="border-bottom"><i class="fa-solid fa-pen"></i> Buat Kategori</h6>
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <x-input type="text" name="name">{{ __('Nama Kategori') }}</x-input>
                <x-input type="text" name="slug">{{ __('Slug Kategori') }}</x-input>
                <x-btn-form></x-btn-form>
            </form>
        </div>
        <x-image-draw></x-image-draw>
    </div>
    @include('dashboard.categories.category-js')
</x-main>