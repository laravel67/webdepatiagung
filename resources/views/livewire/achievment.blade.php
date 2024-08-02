<div class="row">
    <div class="col-md-7">
        <div class="d-flex justify-content-between mb-3">
            <div class="d-flex">
                <x-btn-add href="{{ route('prestasi.create') }}">{{ __('Achievment') }}</x-btn-add>
                <div>
                    <x-btn-modal id="importPrestasi" />
                    <x-modal-import subTitle="Prestasi/Penghargaan" id="importPrestasi">
                        <form action="{{ route('import.prestasi') }}" method="post" enctype="multipart/form-data">
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
                        <th>No.</th>
                        <th>Nama Achievment</th>
                        <th>Kategori</th>
                        <th>
                            Opsi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($achievments as $i=> $achievment)
                    <tr>
                        <td>
                            {{ $achievments->firstItem()+$i }}
                        </td>
                        <td>{{ $achievment->title }}</td>
                        <td>{{ $achievment->category }}</td>
                        <td>
                            <div class="btn btn-group">
                                <x-btn-action href="{{ route('prestasi.show', $achievment->slug) }}" color="success">
                                    {{ __('eye') }}
                                </x-btn-action>
                                <x-btn-action href="{{ route('prestasi.edit', $achievment->slug) }}" color="warning">
                                    {{ __('edit') }}
                                </x-btn-action>
                                <x-btn-action model="deleting('{{ $achievment->slug }}')" color="danger">
                                    {{ __('trash') }}
                                </x-btn-action>
                            </div>
                        </td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            {!! $achievments->links() !!}
        </div>
    </div>
    <x-image-draw/>
</div>