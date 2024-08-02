<div>
    <div class="row mb-3 px-2 justify-content-around">
        <div class="col-6 col-md-2">
            <div class="d-flex align-items-center">
                <select wire:model="perPage" wire:change="show($event.target.value)"
                    class="form-control col-md-4 col-4 text-center form-control-sm">
                    @for ($i = 5; $i <= 100; $i +=5) <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                </select>
                <div class="px-1">Enteries</div>
            </div>
        </div>
        <div class="col-6 col-md-2">
            <div class="d-flex align-items-center">
                <div class="px-1">Tahun Ajaran</div>
                <select wire:model="ta" wire:change="show($event.target.value)"
                    class="form-control col-md-5 col-4 text-center form-control-sm">
                    <option value="">--</option>
                    @forelse ($tajs as $taj)
                    <option value="{{ $taj->id }}">{{ $taj->name }}</option>    
                    @empty
                        
                    @endforelse
                </select>
            </div>
        </div>
        <div class="col-4 col-md-3 d-none d-md-block">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button wire:click="export" type="button" class="btn btn-sm btn-danger">Export</button>
                <button type="button" class="btn btn-sm btn-success">Import</button>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <x-search/>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm" >
            <thead>
                <tr>
                    <th>No.</th>
                    <th>No Identitas</th>
                    <th>Nama Lengkap</th>
                    <th>Tempat Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Tahun Ajaran</th>
                    <th>Tanggal Pendaftaran</th>
                    <th>Kontak</th>
                    <th>
                        Opsi
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($daftars as $i=> $daftar)
                <tr>
                    <td>{{ $daftars->firstItem() + $i }}</td>
                    <td>{{ $daftar->nik }}</td>
                    <td>{{ $daftar->nama }}</td>
                    <td>
                        {{ $daftar->tempat_lahir }}, {{
                        \Carbon\Carbon::parse($daftar->tanggal_lahir)->locale('id')->translatedFormat('d F
                        Y')}}
                    </td>
                    <td>{{ $daftar->jenis_kelamin }}</td>
                    <td>{{ $daftar->umur }} Tahun</td>
                    <td>
                        @if ($daftar->ta_id)
                        {{ $daftar->ta->name }}
                        @else
                        <strong>-</strong>
                        @endif
                    </td>
                    <td>
                        {{
                        \Carbon\Carbon::parse($daftar->created_at)->locale('id')->translatedFormat('d F
                        Y')}}
                    </td>
                    <td>
                        @if ($daftar->kontak)
                        {{ $daftar->kontak }}
                        @else
                        <strong>-</strong>
                        @endif
                    </td>
                    <td>
                        <div class="btn btn-group">
                                <x-btn-action href="{{ route('daftar.show', $daftar->id) }}" color="success">
                                    {{ __('eye') }}
                                </x-btn-action>
                                <x-btn-action href="{{ route('daftar.edit', $daftar->id) }}" color="warning">
                                    {{ __('edit') }}
                                </x-btn-action>
                                <x-btn-action model="deleting('{{ $daftar->id }}')" color="danger">
                                    {{ __('trash') }}
                                </x-btn-action>
                        </div>
                    </td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
        {!! $daftars->links() !!}
    </div>
</div>