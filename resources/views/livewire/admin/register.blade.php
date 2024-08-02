<div class="row">
    <div class="col">
        <div class="row mb-3">
            <div class="col-md col-md-6">
                <div class="d-flex align-items-center">
                    <div class="px-1">Show</div>
                    <select wire:model="perPage" wire:change="show($event.target.value)"
                        class="form-control col-md-1 col-2 px- text-center form-control-sm">
                        @for ($i = 5; $i <= 100; $i +=5) <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                    <div class="px-1">Rows</div>
                </div>
            </div>
            <div class="col-7 col-md-6">
                <input type="search" wire:model.live="search" class="form-control form-control-sm"
                    placeholder="Cari...">
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>No Identitas</th>
                        <th>Nama Lengkap</th>
                        <th>Tempat Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Kewarganegaraan</th>
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
                        <td>{{ $daftar->no_identitas }}</td>
                        <td>{{ $daftar->nama }}</td>
                        <td>
                            {{ $daftar->tempat_lahir }}, {{
                            \Carbon\Carbon::parse($daftar->tanggal_lahir)->locale('id')->translatedFormat('d F
                            Y')}}
                        </td>
                        <td>{{ $daftar->jenis_kelamin }}</td>
                        <td>{{ $daftar->agama }}</td>
                        <td>{{ $daftar->kewarganegaraan }}</td>
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
                                <a href="{{ route('daftar.show', $daftar->id) }}"
                                    class="btn btn-sm btn-success text-white"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{ route('daftar.edit', $daftar->id) }}"
                                    class="btn btn-sm btn-warning text-white"><i class="fa-solid fa-edit"></i></a>
                                <form id="delete-form" action="{{ route('daftar.destroy', $daftar->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-delete"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>
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
    {{-- <div class="col-md-3 d-none d-md-flex">
        <img src="{{ asset('backend/img/undraw_designer_girl_re_h54c.svg') }}" class="img-fluid">
    </div> --}}
</div>