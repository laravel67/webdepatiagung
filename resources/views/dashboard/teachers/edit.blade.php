<x-main>
    <div class="row">
        <div class="col-md-7">
            <h6 class="border-bottom"><i class="fa-solid fa-pen"></i> {{ __('Ubah Data Guru') }}</h6>
            <form action="{{ route('guru.update', $guru->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-input type="text" name="name" :value="old('name', $guru->name)" label="{{ __('Nama Guru') }}" />
                <x-input type="text" name="slug" :value="old('slug', $guru->slug)" label="{{ __('Slug Nama') }}" />
                <x-input type="text" name="pendidikan" :value="old('pendidikan', $guru->pendidikan)"
                    label="{{ __('Pendidikan Terahir') }}" />
                <x-input type="date" name="mulai_mengajar" :value="old('mulai_mengajar', $guru->mulai_mengajar)"
                    label="{{ __('Mulai Mengajar') }}" />

                <div class="form-group">
                    <label for="mapel_id">{{ __('Guru Mapel') }}</label>
                    <select class="form-control mapels @error('mapel_id') is-invalid @enderror" name="mapel_id[]"
                        id="mapel_id" multiple="multiple">
                        @foreach ($mapels as $mapel)
                        <option value="{{ $mapel->id }}" {{ in_array($mapel->id, old('mapel_id',
                            $guru->mapels->pluck('id')->toArray())) ? 'selected' : '' }}>
                            {{ $mapel->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('mapel_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jabatan_id">{{ __('Jabatan') }}</label>
                    <select class="form-control mapels @error('jabatan_id') is-invalid @enderror" name="jabatan_id[]" id="jabatan_id"
                        multiple="multiple">
                        @foreach ($jabatans as $jabatan)
                        <option value="{{ $jabatan->id }}" {{ in_array($jabatan->id, old('jabatan_id',
                            $guru->jabatans->pluck('id')->toArray())) ? 'selected' : '' }}>
                            {{ $jabatan->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('jabatan_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <x-input-text-area name="deskripsi" :value="old('deskripsi', $guru->deskripsi)"
                    label="{{ __('Biografi Singkat') }}" />
                <x-input type="file" name="image" label="{{ __('Image/Gambar') }}" onchange="previewImage()" accept="image/*" />
                <x-btn-form />

                @if ($guru->image)
                <img id="previewContainer" src="{{ asset('storage/'.$guru->image) }}" class="mt-3 img-fluid" width="300"
                    alt="{{ $guru->name }}">
                @else
                <img id="previewContainer" class="mt-3 img-fluid" width="300" alt="{{ __('No image available') }}">
                @endif
            </form>
        </div>
        @include('dashboard.teachers.script')
        <x-image-draw />
    </div>
</x-main>