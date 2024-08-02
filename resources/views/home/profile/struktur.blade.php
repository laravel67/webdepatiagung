<x-content>
    <x-profile-header/>
    <div class="container-fluid bg-white">
        {{-- Satu --}}
        <div class="card-header mb-2 bg-green"></div>
        <div class="row justify-content-around mb-4" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom"
            data-aos-duration="1000">
            <div class="col-md-6">
                <div class="row justify-content-center">
                    <div class="text-center">
                        @if ($yayasan)
                        @if ($yayasan->strukturs->first()?->image ?? '')
                        <img src="{{ asset('storage/strukturs/'.$yayasan->strukturs->first()?->image ?? '') }}"
                            class="bd-placeholder-img rounded-circle" width="150" height="150">
                        @else
                        <img src="{{ asset('frontend/img/user.svg') }}" class="bd-placeholder-img rounded-circle" width="150" height="150">
                        @endif
                        <div class="list-group">
                            <div class="p-0 px-1 list-group-item list-group-item-action active">
                                {{ $yayasan->name ?? '' }}
                            </div>
                            <div class="p-0 px-1 list-group-item list-group-item-action">
                                {{$yayasan->strukturs->first()?->name ?? 'Not Found.' }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- Dua --}}
        <div class="row justify-content-around" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom"
            data-aos-duration="1000">
            <div class="col-md-6">
                <div class="row justify-content-center">
                    <div class="text-center">
                        @if ($pimpinan)
                        @if ($pimpinan->strukturs->first()?->image ?? '')
                        <img src="{{ asset('storage/strukturs/'.$pimpinan->strukturs->first()?->image ?? '') }}"
                            class="bd-placeholder-img rounded-circle" width="150" height="150">
                        @else
                        <img src="{{ asset('frontend/img/user.svg') }}" class="bd-placeholder-img rounded-circle" width="150" height="150">
                        @endif
                        <div class="list-group">
                            <div class="p-0 px-1 list-group-item list-group-item-action active">
                                {{ $pimpinan->name ?? '' }}
                            </div>
                            <div class="p-0 px-1 list-group-item list-group-item-action">
                                {{$pimpinan->strukturs->first()?->name ?? 'Not Found.' }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- Tiga --}}
        <div class="card-header border-none p-0 bg-white text-center mt-5">
            <strong class="bg-dark text-light p-2">KABAG</strong>
        </div>
        <div class="row justify-content-around mb-2" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom"
            data-aos-duration="1000">
            <div class="col-6">
                <div class="row justify-content-center">
                    <div class="text-center">
                        @if ($kabagTu)
                        @if ($kabagTu->strukturs->first()?->image ?? '')
                        <img src="{{ asset('storage/strukturs/'.$kabagTu->strukturs->first()?->image ?? '') }}"
                            class="bd-placeholder-img rounded-circle" width="150" height="150">
                        @else
                        <img src="{{ asset('frontend/img/user.svg') }}" class="bd-placeholder-img rounded-circle" width="150" height="150">
                        @endif
                        <div class="list-group">
                            <div class="p-0 px-1 list-group-item list-group-item-action bg-warning text-white">
                                {{ $kabagTu->name ?? '' }}
                            </div>
                            <div class="p-0 px-1 list-group-item list-group-item-action">
                                {{ $kabagTu->strukturs->first()?->name ?? 'Not Found.' }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row justify-content-center">
                    <div class="text-center">
                        @if ($bendahara)
                        @if ($bendahara->strukturs->first()?->image ?? '')
                        <img src="{{ asset('storage/strukturs/'.$bendahara->strukturs->first()?->image ?? '') }}"
                            class="bd-placeholder-img rounded-circle" width="150" height="150">
                        @else
                        <img src="{{ asset('frontend/img/user.svg') }}" class="bd-placeholder-img rounded-circle" width="150" height="150">
                        @endif
                        <div class="list-group">
                            <div class="p-0 px-1 list-group-item list-group-item-action bg-warning text-white">
                                {{ $bendahara->name ?? '' }}
                            </div>
                            <div class="p-0 px-1 list-group-item list-group-item-action">
                                {{ $bendahara->strukturs->first()?->name ?? 'Not Found.' }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- Empat --}}
        <div class="card-header border-none p-0 bg-white text-center mt-5">
            <strong class="bg-dark text-light p-2">UNIT</strong>
        </div>
        <div class="row justify-content-center mb-2" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom"
            data-aos-duration="1000">
            <div class="col-md-3 col-6 mb-3">
                <div class="row justify-content-center">
                    <div class="text-center">
                        @if ($pengasuhPutra)
                        @if ($pengasuhPutra->strukturs->first()?->image ?? '')
                        <img src="{{ asset('storage/strukturs/'.$pengasuhPutra->strukturs->first()?->image ?? '') }}"
                            class="bd-placeholder-img rounded-circle" width="150" height="150">
                        @else
                        <img src="{{ asset('frontend/img/user.svg') }}" class="bd-placeholder-img rounded-circle" width="150" height="150">
                        @endif
                        <div class="list-group">
                            <div class="p-0 px-1 list-group-item list-group-item-action bg-warning text-white">
                                {{ $pengasuhPutra->name ?? '' }}
                            </div>
                            <div class="p-0 px-1 list-group-item list-group-item-action">
                                {{ $pengasuhPutra->strukturs->first()?->name ?? 'Not Found.' }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="row justify-content-center">
                    <div class="text-center">
                        @if ($pengasuhPutri)
                        @if ($pengasuhPutri->strukturs->first()?->image ?? '')
                        <img src="{{ asset('storage/strukturs/'.$pengasuhPutri->strukturs->first()?->image ?? '') }}"
                            class="bd-placeholder-img rounded-circle" width="150" height="150">
                        @else
                        <img src="{{ asset('frontend/img/user.svg') }}" class="bd-placeholder-img rounded-circle" width="150" height="150">
                        @endif
                        <div class="list-group">
                            <div class="p-0 px-1 list-group-item list-group-item-action bg-warning text-white">
                                {{ $pengasuhPutri->name ?? '' }}
                            </div>
                            <div class="p-0 px-1 list-group-item list-group-item-action">
                                {{ $pengasuhPutri->strukturs->first()?->name ?? 'Not Found.' }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="row justify-content-center">
                    <div class="text-center">
                        @if ($kamadMas)
                        @if ($kamadMas->strukturs->first()?->image ?? '')
                        <img src="{{ asset('storage/strukturs/'.$kamadMas->strukturs->first()?->image ?? '') }}"
                            class="bd-placeholder-img rounded-circle" width="150" height="150">
                        @else
                        <img src="{{ asset('frontend/img/user.svg') }}" class="bd-placeholder-img rounded-circle" width="150" height="150">
                        @endif
                        <div class="list-group">
                            <div class="p-0 px-1 list-group-item list-group-item-action bg-warning text-white">
                                {{ $kamadMas->name ?? '' }}
                            </div>
                            <div class="p-0 px-1 list-group-item list-group-item-action">
                                {{ $kamadMas->strukturs->first()?->name ?? 'Not Found.' }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="row justify-content-center">
                    <div class="text-center">
                        @if ($kamadMts)
                        @if ($kamadMts->strukturs->first()?->image ?? '')
                        <img src="{{ asset('storage/strukturs/'.$kamadMts->strukturs->first()?->image ?? '') }}"
                            class="bd-placeholder-img rounded-circle" width="150" height="150">
                        @else
                        <img src="{{ asset('frontend/img/user.svg') }}" class="bd-placeholder-img rounded-circle" width="150" height="150">
                        @endif
                        <div class="list-group">
                            <div class="p-0 px-1 list-group-item list-group-item-action bg-warning text-white">
                                {{ $kamadMts->name ?? '' }}
                            </div>
                            <div class="p-0 px-1 list-group-item list-group-item-action">
                                {{ $kamadMts->strukturs->first()?->name ?? 'Not Found.' }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- BIDANG --}}

        <div class="card-header border-none p-0 bg-white text-center mt-5">
            <strong class="bg-dark text-light p-2">BIDANG</strong>
        </div>
        <div class="row justify-content-center mb-2" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom"
            data-aos-duration="1000">
            <div class="col-md-3 col-6 mb-3">
                <div class="row justify-content-center">
                    <div class="text-center">
                        @if ($bidPendidikan)
                        @if ($bidPendidikan->strukturs->first()?->image ?? '')
                        <img src="{{ asset('storage/strukturs/'.$bidPendidikan->strukturs->first()?->image ?? '') }}"
                            class="bd-placeholder-img rounded-circle" width="150" height="150">
                        @else
                        <img src="{{ asset('frontend/img/user.svg') }}" class="bd-placeholder-img rounded-circle" width="150" height="150">
                        @endif
                        <div class="list-group">
                            <div class="p-0 px-1 list-group-item list-group-item-action bg-warning text-white">
                                {{ $bidPendidikan->name ?? '' }}
                            </div>
                            <div class="p-0 px-1 list-group-item list-group-item-action">
                                {{ $bidPendidikan->strukturs->first()?->name ?? 'Not Found.' }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="row justify-content-center">
                    <div class="text-center">
                        @if ($bidPrasarana)
                        @if ($bidPrasarana->strukturs->first()?->image ?? '')
                        <img src="{{ asset('storage/strukturs/'.$bidPrasarana->strukturs->first()?->image ?? '') }}"
                            class="bd-placeholder-img rounded-circle" width="150" height="150">
                        @else
                        <img src="{{ asset('frontend/img/user.svg') }}" class="bd-placeholder-img rounded-circle" width="150" height="150">
                        @endif
                        <div class="list-group">
                            <div class="p-0 px-1 list-group-item list-group-item-action bg-warning text-white">
                                {{ $bidPrasarana->name ?? '' }}
                            </div>
                            <div class="p-0 px-1 list-group-item list-group-item-action">
                                {{ $bidPrasarana->strukturs->first()?->name ?? 'Not Found.' }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="row justify-content-center">
                    <div class="text-center">
                        @if ($bidKesiswaan)
                        @if ($bidKesiswaan->strukturs->first()?->image ?? '')
                        <img src="{{ asset('storage/strukturs/'.$bidKesiswaan->strukturs->first()?->image ?? '') }}"
                            class="bd-placeholder-img rounded-circle" width="150" height="150">
                        @else
                        <img src="{{ asset('frontend/img/user.svg') }}" class="bd-placeholder-img rounded-circle" width="150" height="150">
                        @endif
                        <div class="list-group">
                            <div class="p-0 px-1 list-group-item list-group-item-action bg-warning text-white">
                                {{ $bidKesiswaan->name ?? '' }}
                            </div>
                            <div class="p-0 px-1 list-group-item list-group-item-action">
                                {{ $bidKesiswaan->strukturs->first()?->name ?? 'Not Found.' }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="row justify-content-center">
                    <div class="text-center">
                        @if ($bidKesehatan)
                        @if ($bidKesehatan->strukturs->first()?->image ?? '')
                        <img src="{{ asset('storage/strukturs/'.$bidKesehatan->strukturs->first()?->image ?? '') }}"
                            class="bd-placeholder-img rounded-circle" width="150" height="150">
                        @else
                        <img src="{{ asset('frontend/img/user.svg') }}" class="bd-placeholder-img rounded-circle" width="150" height="150">
                        @endif
                        <div class="list-group">
                            <div class="p-0 px-1 list-group-item list-group-item-action bg-warning text-white">
                                {{ $bidKesehatan->name ?? '' }}
                            </div>
                            <div class="p-0 px-1 list-group-item list-group-item-action">
                                {{ $bidKesehatan->strukturs->first()?->name ?? 'Not Found.' }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header border-none p-0 bg-white text-center mt-5">
            <strong class="bg-dark text-light p-2">MAJELIS GURU</strong>
        </div>
        <div class="row justify-content-center mx-4 my-3">
            @if($teachers->isEmpty())
            <p>{{ __('Data Kosong') }}</p>
            @else
            @foreach($teachers as $index => $row)
            @if($index % 10 === 0)
            @if($index !== 0)
            </ol>
            @endif
            <ol start="{{ $index + 1 }}">
                @endif
                <li>{{ $row->name ?? '' }}</li>
                @endforeach
            </ol>
            @endif
        </div>
        <div class="card-header border-none p-0 bg-white text-center mt-5">
            <div class="d-flex justify-content-around">
                <strong class="bg-dark text-light p-2">SECURITY</strong>
                <strong class="bg-dark text-light p-2">PERSADA</strong>
            </div>
        </div>
        <div class="card-header border-none p-0 bg-white text-center mt-5">
            <strong class="bg-dark text-light p-2">SANTRI</strong>
        </div>
    </div>
</x-content>