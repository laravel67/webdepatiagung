<div>
    <div class="table-responsive">

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Brosur</th>
                    <th scope="col">Tahun Ajaran</th>
                    <th scope="col">Ketua Penitia</th>
                    <th scope="col">Status</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tajs as $i=>$taj )
                <tr>
                    <th>
                        <img src="{{ asset('storage/brosurs/'.$taj->image) }}" class="img-fluid" width="200px">
                    </th>
                    <td>{{ $taj->name }}</td>
                    <td>{{ $taj->chief }}</td>
                    <td>
                        @if ($taj->status==1)
                        <span class="badge badge-success">Dibuka</span>
                        @else
                        <span class="badge badge-secondary">Ditutup</span>
                        @endif
                    </td>
                    <td>
                        <div class="btn btn-group">
                            @if ($taj->status=='0')
                            <x-btn-action model="active('{{ $taj->id }}')" color="secondary">
                                {{ __('toggle-off') }}
                            </x-btn-action>
                            @else
                            <x-btn-action model="unactive('{{ $taj->id }}')" color="success">
                                {{ __('toggle-on') }}
                            </x-btn-action>
                            @endif
                            <x-btn-action model="edit('{{ $taj->id }}')" color="warning">
                                {{ __('edit') }}
                            </x-btn-action>
                            <x-btn-action model="deleting('{{ $taj->id }}')" color="danger">
                                {{ __('trash') }}
                            </x-btn-action>
                        </div>
                    </td>
                </tr>
                @empty

                @endforelse
            </tbody>
        </table>
        {!! $tajs->links() !!}
    </div>
</div>