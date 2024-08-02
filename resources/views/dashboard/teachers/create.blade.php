<x-main>
   <div class="row">
        <div class="col-md-7">
            <h6 class="border-bottom"><i class="fa-solid fa-pen"></i> Tambah Guru</h6>
            <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-input type="text" name="name">{{ __('Nama Guru') }}</x-input>
                <x-input type="text" name="slug">{{ __('Slug Nama') }}</x-input>
                <x-input type="text" name="pendidikan">{{ __('Pendidikan Terahir') }}</x-input>
                <x-input type="date" name="mulai_mengajar">{{ __('Mulai Mengajar') }}</x-input>
                <div class="form-group">
                    <label for="mapel_id">Guru Mapel</label>
                    <select type="text" class="form-control mapels @error('mapel_id') is-invalid @enderror"
                        name="mapel_id[]" id="mapel_id" multiple="multiple">
                        @foreach ($mapels as $mapel)
                        <option value="{{ $mapel->id }}" {{ in_array($mapel->id, old('mapel_id', [])) ? 'selected' : '' }}>
                            {{ $mapel->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('mapel_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jabatan_id">Jabatan</label>
                    <select type="text" class="form-control mapels @error('jabatan_id') is-invalid @enderror" name="jabatan_id[]"
                        id="jabatan_id" multiple="multiple">
                        @foreach ($jabatans as $jabatan)
                        <option value="{{ $jabatan->id }}" {{ in_array($jabatan->id, old('jabatan_id', [])) ? 'selected' : '' }}>
                            {{ $jabatan->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('jabatan_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <x-input-text-area name="deskripsi">{{ __('Biografi Singkat') }}</x-input-text-area>
                <x-input type="file" name="image" onchange="previewImage()" accept="image/*">{{ __('Image/Gambar') }}</x-input>
                <x-btn-form></x-btn-form>
                <img id="previewContainer" class="mt-3 img-fluid" width="300">
            </form>
        </div>
        <x-image-draw></x-image-draw>
        @include('dashboard.teachers.script')
    </div> 
</x-main>