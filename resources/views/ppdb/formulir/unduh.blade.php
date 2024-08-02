<x-template>
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h5 class="border-bottom border-gray pb-2 mb-0">Download</h5>
        <div class="media text-muted pt-3">
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                @if($brosur && $brosur->status=1)
                <div class="d-flex justify-content-between align-items-center w-100">
                    <strong class="text-primary">Brosur DEPATI AGUNG</strong>
                    <a href="{{ route('downloadBrosur', $brosur->id) }}"
                        class="btn btn-sm btn-outline-success rounded-circle"><i
                            class="fa-solid fa-download text-lg"></i></a>
                </div>
                <span class="text-dark">{{ \Carbon\Carbon::parse($brosur->updated_at)->translatedFormat('j F Y') }}</span>
                @else
                <span class="text-danger">Brosur tidak tersedia</span>
                @endif
            </div>
        </div>
        {{-- <div class="media text-muted pt-3">
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <strong class="text-primary">Formulir Pendaftaran Peserta Didik Baru TA
    
                        @if ($form)
                        {{ $form->name }}
                        @else
                        -
                        @endif
                    </strong>
                    <a href="{{ route('download.formulir') }}" class="btn btn-sm btn-outline-success rounded-circle"><i
                            class="fa-solid fa-download text-lg"></i></a>
                </div>
                @if($form)
                <span class="text-dark">{{ \Carbon\Carbon::parse($form->created_at)->translatedFormat('j F Y') }}</span>
                @else
                <span class="text-danger">Pendafatran belum buka</span>
                @endif
            </div>
        </div> --}}
    </div>
</x-template>