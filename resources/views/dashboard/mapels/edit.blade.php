<x-main>
    <div class="row">
        <div class="col-md-7">
            <h6 class="border-bottom"><i class="fa-solid fa-pen"></i> Ubah Mapel</h6>
            <form action="{{ route('mapel.update',$mapel->slug) }}" method="POST">
                @method('PUT')
                @csrf
                <x-input type="text" name="name" :value="old('name', $mapel->name)">{{ __('Nama Mapel') }}</x-input>
                <x-input type="text" name="slug" :value="old('slug', $mapel->slug)">{{ __('Slug Mapel') }}</x-input>
                <x-btn-form></x-btn-form>
            </form>
        </div>
        <x-image-draw></x-image-draw>
    </div>
    @include('dashboard.mapels.script')
</x-main>