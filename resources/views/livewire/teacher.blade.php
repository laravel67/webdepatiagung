<div class="row">
    <div class="col-md-7">
        <div class="d-flex justify-content-between mb-3">
            <div class="d-flex">
                <x-btn-add href="{{ route('guru.create') }}">{{ __('Tambah Guru') }}</x-btn-add>
                    <div>
                        <x-btn-modal id="importGuru" />
                        <x-modal-import subTitle="Import Guru" id="importGuru">
                            <form action="{{ route('import.guru') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <x-input-import name="import">Pilih file Excel</x-input-import>
                                <x-btn-import />
                            </form>
                        </x-modal-import>
                    </div>
            </div>
            <x-search></x-search>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Guru</th>
                        <th>
                            Opsi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($teachers as $i=> $guru)
                    <tr>
                        <td>
                            @if ($guru->image)
                            <img src="{{ asset('storage/'.$guru->image) }}" class=" rounded-circle" width="50"
                                height="50">
                            @else
                            <img src="{{ asset('frontend/img/man-user.svg') }}" class=" rounded-circle" width="50" height="50">
                            @endif
                        </td>
                        <td>{{ $guru->name }}</td>
                        <td>
                            <div class="btn btn-group">
                                <x-btn-action href="{{ route('guru.show', $guru->slug) }}" color="success">
                                    {{ __('eye') }}
                                </x-btn-action>
                                <x-btn-action href="{{ route('guru.edit', $guru->slug) }}" color="warning">
                                    {{ __('edit') }}
                                </x-btn-action>
                                <x-btn-action model="deleting('{{ $guru->slug }}')" color="danger">
                                    {{ __('trash') }}
                                </x-btn-action>
                            </div>
                        </td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            {!! $teachers->links() !!}
        </div>
    </div>
    <x-image-draw></x-image-draw>
</div>