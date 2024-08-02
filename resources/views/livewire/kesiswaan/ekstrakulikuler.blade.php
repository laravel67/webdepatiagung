<div class="row my-5 px-2">
    <div class="col-md-7">
        <div class="d-flex mb-2 justify-content-between">
            <div>
                <x-btn-modal id="importLifeskill" />
                <x-modal-import subTitle="Import Ekstra Kulikuler" id="importLifeskill">
                    <form action="{{ route('import.lifeskill') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <x-input-import name="import">Pilih file Excel</x-input-import>
                        <x-btn-import />
                    </form>
                </x-modal-import>
            </div>
            <x-search></x-search>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($lifesklills as $i => $lifeskill)
                <tr>
                    <th>
                        {{ $lifesklills->firstItem()+$i }}
                    </th>
                    <td>{{ $lifeskill->name }}</td>
                    <td>{{ $lifeskill->category }}</td>
                    <td>
                        <div class="btn-group">
                            <button wire:click='edit({{ $lifeskill->id }})' class="btn btn-sm btn-warning text-light"><i
                                    class="fa-solid fa-edit"></i></button>
                            <button wire:click='deleting({{ $lifeskill->id }})' class="btn btn-sm btn-danger"><i
                                    class="fa-solid fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
                @empty

                @endforelse
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <h4>{{ !$isEditing ? 'Tambah Ekstra Kulikuler':'Ubah Ekstra Kulikuler' }}</h4>
        <form wire:submit='{{ $isEditing ? ' update':'submit' }}'>
            <x-input type="text" name="name" >{{ __('Nama Ekstra Kulikuler') }}</x-input>
            <x-input-select type="text" :defaultOptions="
                [
                   ['value' => 'fisik', 'label' => 'Fisik'], 
                   ['value' => 'nonfisik', 'label' => 'Non fisik']
                ]" name="category">{{ __('Kategori Ekstra Kulikuler') }}
            </x-input-select>
            <x-input type="file" name="image">{{ __('Gambar') }}</x-input>
            @if ($image)
            <img src="{{ $image->temporaryUrl() }}" width="300">
            @else
            <img src="{{ $imageOld }}" width="300">
            @endif
            <x-form-btn></x-form-btn>
        </form>
    </div>
</div>

