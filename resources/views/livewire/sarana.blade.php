<div class="row">
    <div class="col-md-7">
        <div class="d-flex justify-content-between mb-3">
            <div class="d-flex">
                <x-btn-add href="{{ route('asarana.create') }}">{{ __('Sarana Prasarana') }}</x-btn-add>
                <div>
                    <x-btn-modal id="importSarana" />
                    <x-modal-import subTitle="Sarana Prasarana" id="importSarana">
                        <form action="{{ route('import.sarana') }}" method="post" enctype="multipart/form-data">
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
                        <th>Nama SP</th>
                        <th>Slug SP</th>
                        <th>
                            Opsi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($saranas as $i=> $sarana)
                    <tr class=" ">
                        <td>
                            @if ($sarana->image)
                            <img src="{{ asset('storage/'.$sarana->image) }}" class=" rounded-circle" width="50"
                                height="50">
                            @else
                            <img class="rounded-circle"
                                src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                                alt="Generic placeholder image" width="50" height="50">
                            @endif
                        </td>
                        <td>{{ $sarana->name }}</td>
                        <td>{{ $sarana->slug }}</td>
                        <td>
                            <div class="btn btn-group">
                                <x-btn-action href="{{ route('asarana.show', $sarana->slug) }}" color="success">
                                    {{ __('eye') }}
                                </x-btn-action>
                                <x-btn-action href="{{ route('asarana.edit', $sarana->slug) }}" color="warning">
                                    {{ __('edit') }}
                                </x-btn-action>
                                <x-btn-action model="deleting('{{ $sarana->slug }}')" color="danger">
                                    {{ __('trash') }}
                                </x-btn-action>
                            </div>
                        </td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            {!! $saranas->links() !!}
        </div>
    </div>
    <div class="col-md-3 d-none d-md-flex">
        <img src="{{ asset('backend/img/undraw_designer_girl_re_h54c.svg') }}" class="img-fluid">
    </div>
</div>